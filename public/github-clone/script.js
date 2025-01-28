const apiUrl = "http://localhost:8000/api/pull-requests";

async function fetchPullRequests() {
    try {
        const response = await fetch(apiUrl);
        if (!response.ok) throw new Error('Network response was not ok');
        const pullRequests = await response.json();
        updateCounts(pullRequests);
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

document.addEventListener('DOMContentLoaded', () => {
    fetchPullRequests().then(renderPullRequests);
    
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const state = e.target.dataset.state;
            filterPRs(state);
        });
    });
});

function filterPRs(state) {
    fetchPullRequests().then(prs => {
        const filteredPRs = state === 'all' ? prs : prs.filter(pr => pr.state === state);
        renderPullRequests(filteredPRs);
    });
}
