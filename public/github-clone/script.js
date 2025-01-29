const apiUrl = "http://localhost:8000/api/pull-requests";

let currentFilter = 'all';
let allPullRequests = [];

async function fetchPullRequests() {
    try {
        const response = await fetch(apiUrl);
        if (!response.ok) throw new Error('Network response was not ok');
        const pullRequests = await response.json();
        allPullRequests = pullRequests; // Store all PRs
        updateCounts(pullRequests);
        applyFilters();
        return pullRequests;
    } catch (error) {
        console.error('Error fetching pull requests:', error);
        return [];
    }
}

function updateCounts(prs) {
    const openCount = prs.filter(pr => pr.state === 'open').length;
    const closedCount = prs.filter(pr => pr.state === 'closed').length;
    
    document.getElementById('open-count').textContent = openCount;
    document.getElementById('closed-count').textContent = closedCount;
}

function renderPullRequests(prs) {
    const prList = document.getElementById('pr-list');
    const template = document.getElementById('pr-template');
    prList.innerHTML = '';

    prs.forEach(pr => {
        const clone = template.content.cloneNode(true);
        
        clone.querySelector('.pr-title').textContent = pr.title;
        clone.querySelector('.pr-meta').textContent = `#${pr.number} opened ${new Date(pr.created_at).toLocaleDateString()} by ${pr.user.login}`;
        
        const cloneBtn = clone.querySelector('.clone-btn');
        cloneBtn.onclick = () => cloneRepository(pr.head.repo.clone_url);
        
        prList.appendChild(clone);
    });
}

async function cloneRepository(cloneUrl) {
    try {
        const response = await fetch('/api/clone-repository', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ cloneUrl })
        });
        
        const result = await response.json();
        if (result.success) {
            showNotification('Repository cloned successfully!', 'success');
        } else {
            showNotification(result.message, 'error');
        }
    } catch (error) {
        showNotification('Failed to clone repository', 'error');
        console.error('Error:', error);
    }
}

function showNotification(message, type) {
    // Implementation for showing notifications
    alert(message); 
}

function applyFilters() {
    const searchInput = document.querySelector('input[placeholder="is:pr is:open"]');
    const searchTerm = searchInput.value.toLowerCase();
    
    let filteredPRs = allPullRequests;

    // Apply state filter
    if (currentFilter !== 'all') {
        filteredPRs = filteredPRs.filter(pr => pr.state === currentFilter);
    }

    // Apply search filter if there's a search term
    if (searchTerm) {
        filteredPRs = filteredPRs.filter(pr => {
            return (
                pr.title.toLowerCase().includes(searchTerm) ||
                pr.user.login.toLowerCase().includes(searchTerm) ||
                `#${pr.number}`.includes(searchTerm)
            );
        });
    }

    renderPullRequests(filteredPRs);
    updateFilterButtons();
}

function updateFilterButtons() {
    const openButton = document.querySelector('button:has(#open-count)');
    const closedButton = document.querySelector('button:has(#closed-count)');
    
    // Reset button styles
    openButton.className = 'flex items-center space-x-1 px-3 py-1 text-sm font-medium';
    closedButton.className = 'flex items-center space-x-1 px-3 py-1 text-sm font-medium';
    
    if (currentFilter === 'open') {
        openButton.className += ' rounded-md bg-github-secondary hover:bg-github-border';
        closedButton.className += ' text-github-text hover:text-white';
    } else if (currentFilter === 'closed') {
        closedButton.className += ' rounded-md bg-github-secondary hover:bg-github-border';
        openButton.className += ' text-github-text hover:text-white';
    } else {
        openButton.className += ' text-github-text hover:text-white';
        closedButton.className += ' text-github-text hover:text-white';
    }
}

document.addEventListener('DOMContentLoaded', () => {
    fetchPullRequests();
    
    // Add event listeners for filter buttons
    const openButton = document.querySelector('button:has(#open-count)');
    const closedButton = document.querySelector('button:has(#closed-count)');
    const searchInput = document.querySelector('input[placeholder="is:pr is:open"]');
    
    openButton.addEventListener('click', () => {
        currentFilter = currentFilter === 'open' ? 'all' : 'open';
        applyFilters();
    });
    
    closedButton.addEventListener('click', () => {
        currentFilter = currentFilter === 'closed' ? 'all' : 'closed';
        applyFilters();
    });
    
    // Add search input listener with debouncing
    let searchTimeout;
    searchInput.addEventListener('input', () => {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            applyFilters();
        }, 300);
    });
});
