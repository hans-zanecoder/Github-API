const GITHUB_API_URL = 'https://api.github.com';
const GITHUB_TOKEN = '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'; 

const headers = {
  'Authorization': `token ${GITHUB_TOKEN}`,
  'Accept': 'application/vnd.github.v3+json'
};

let allPullRequests = []; 

async function fetchPullRequests() {
  try {
    const response = await fetch(`${GITHUB_API_URL}/repos/hans-zanecoder/Github-API/pulls`, {
      headers
    });
    const data = await response.json();
    allPullRequests = data; // Store all PRs
    filterAndDisplayPRs();
    updateCounts(data);
  } catch (error) {
    console.error('Error fetching pull requests:', error);
  }
}

function updatePRList(prs) {
  const prList = document.getElementById('pr-list');
  const template = document.getElementById('pr-template');
  
  prList.innerHTML = '';
  
  prs.forEach(pr => {
    const clone = template.content.cloneNode(true);
    
    clone.querySelector('.pr-title').textContent = pr.title;
    clone.querySelector('.pr-meta').textContent = `#${pr.number} opened by ${pr.user.login}`;
    
    const cloneBtn = clone.querySelector('.clone-btn');
    cloneBtn.addEventListener('click', () => {
      console.log(`Cloning PR #${pr.number}`);
    });
    
    prList.appendChild(clone);
  });
}

function updateCounts(prs) {
  const openCount = document.getElementById('open-count');
  const closedCount = document.getElementById('closed-count');
  
  openCount.textContent = prs.filter(pr => pr.state === 'open').length;
  
  fetch(`${GITHUB_API_URL}/repos/zaneCoder/mortdash/pulls?state=closed`, {
    headers
  })
    .then(response => response.json())
    .then(data => {
      closedCount.textContent = data.length;
    })
    .catch(error => console.error('Error fetching closed PRs:', error));
}

function filterAndDisplayPRs() {
  const searchInput = document.getElementById('search-input');
  const searchTerm = searchInput.value.toLowerCase();
  const filterBtn = document.getElementById('filters-btn');
  const currentFilter = filterBtn.dataset.currentFilter || 'all';

  let filteredPRs = allPullRequests;

  // Filter by state
  if (currentFilter !== 'all') {
    filteredPRs = filteredPRs.filter(pr => pr.state === currentFilter);
  }

  // Filter by search term
  if (searchTerm) {
    filteredPRs = filteredPRs.filter(pr => {
      return (
        pr.title.toLowerCase().includes(searchTerm) ||
        pr.user.login.toLowerCase().includes(searchTerm) ||
        `#${pr.number}`.includes(searchTerm) ||
        parseSearchQuery(searchTerm, pr)
      );
    });
  }

  updatePRList(filteredPRs);
  updateCounts(filteredPRs);
}

function parseSearchQuery(query, pr) {
  const terms = query.split(' ');
  return terms.every(term => {
    const [key, value] = term.split(':');
    switch (key) {
      case 'is':
        return value === pr.state || (value === 'pr' && pr.pull_request);
      case 'author':
        return pr.user.login.toLowerCase() === value.toLowerCase();
      case 'label':
        return pr.labels.some(label => label.name.toLowerCase() === value.toLowerCase());
      default:
        return true;
    }
  });
}

document.addEventListener('DOMContentLoaded', () => {
  const filtersBtn = document.getElementById('filters-btn');
  const filtersDropdown = document.getElementById('filters-dropdown');
  const searchInput = document.getElementById('search-input');
  
  // Toggle filters dropdown
  filtersBtn.addEventListener('click', () => {
    filtersDropdown.classList.toggle('hidden');
  });

  // Close dropdown when clicking outside
  document.addEventListener('click', (e) => {
    if (!filtersBtn.contains(e.target) && !filtersDropdown.contains(e.target)) {
      filtersDropdown.classList.add('hidden');
    }
  });

  // Handle filter options
  document.querySelectorAll('.filter-option').forEach(option => {
    option.addEventListener('click', () => {
      const filter = option.dataset.filter;
      filtersBtn.dataset.currentFilter = filter;
      filtersDropdown.classList.add('hidden');
      filterAndDisplayPRs();
    });
  });

  // Handle search with debounce
  let searchTimeout;
  searchInput.addEventListener('input', () => {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
      filterAndDisplayPRs();
    }, 300);
  });

  fetchPullRequests();
  setInterval(fetchPullRequests, 60000);
});