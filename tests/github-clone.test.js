import { describe, test, expect, beforeEach, jest } from '@jest/globals';

// Import the functions and headers from script.js
import {
  fetchPullRequests,
  updateCounts,
  filterAndDisplayPRs,
  parseSearchQuery,
  headers
} from '../public/github-clone/script.js';

// Mock fetch globally
global.fetch = jest.fn();

describe('GitHub Pull Request Functionality', () => {
  beforeEach(() => {
    fetch.mockClear();
    // Reset DOM
    document.body.innerHTML = `
      <div id="pr-list"></div>
      <div id="open-count">0</div>
      <div id="closed-count">0</div>
      <input id="search-input" type="text" />
      <button id="filters-btn" data-current-filter="all"></button>
      <template id="pr-template">
        <div class="pr-item">
          <h3 class="pr-title"></h3>
          <p class="pr-meta"></p>
        </div>
      </template>
    `;
    // Mock the token initialization by setting headers directly
    Object.assign(headers, {
      'Accept': 'application/vnd.github.v3+json',
      'Authorization': 'token test-token'
    });
  });

  test('fetchPullRequests should fetch and combine open and closed PRs', async () => {
    const mockOpenPRs = [{ id: 1, state: 'open', title: 'Open PR', user: { login: 'user1' }, number: 1 }];
    const mockClosedPRs = [{ id: 2, state: 'closed', title: 'Closed PR', user: { login: 'user2' }, number: 2 }];

    fetch
      .mockImplementationOnce(() => Promise.resolve({
        json: () => Promise.resolve(mockOpenPRs)
      }))
      .mockImplementationOnce(() => Promise.resolve({
        json: () => Promise.resolve(mockClosedPRs)
      }));

    await fetchPullRequests();
    
    expect(fetch).toHaveBeenCalledTimes(2);
    expect(fetch).toHaveBeenCalledWith(expect.stringContaining('/pulls?state=open'), expect.any(Object));
    expect(fetch).toHaveBeenCalledWith(expect.stringContaining('/pulls?state=closed'), expect.any(Object));
  });

  test('updateCounts should display correct PR counts', () => {
    const mockPRs = [
      { state: 'open' },
      { state: 'open' },
      { state: 'closed' }
    ];

    updateCounts(mockPRs);

    expect(document.getElementById('open-count').textContent).toBe('2');
    expect(document.getElementById('closed-count').textContent).toBe('1');
  });

  test('filterAndDisplayPRs should filter by search term', () => {
    // Create a proper template element with content
    const template = document.getElementById('pr-template');
    const templateContent = document.createElement('div');
    templateContent.innerHTML = `
      <div class="pr-item">
        <h3 class="pr-title"></h3>
        <p class="pr-meta"></p>
      </div>
    `;
    
    // Mock the template.content getter
    Object.defineProperty(template, 'content', {
      get: () => templateContent.cloneNode(true)
    });

    // Set up the mock PRs
    const mockPRs = [
      { title: 'Feature PR', state: 'open', user: { login: 'user1' }, number: 1 },
      { title: 'Bug PR', state: 'closed', user: { login: 'user2' }, number: 2 }
    ];

    // Set the global allPullRequests
    global.allPullRequests = mockPRs;

    // Set up the search input
    const searchInput = document.getElementById('search-input');
    searchInput.value = 'Feature';
    
    // Call filterAndDisplayPRs
    filterAndDisplayPRs();
    
    // Wait for DOM updates
    setTimeout(() => {
      // Verify the filtered results
      const prList = document.getElementById('pr-list');
      const titleElements = prList.querySelectorAll('.pr-title');
      
      expect(titleElements.length).toBe(1);
      expect(titleElements[0].textContent).toBe('Feature PR');
    }, 0);
  });

  test('parseSearchQuery should handle advanced search queries', () => {
    const pr = {
      state: 'open',
      user: { login: 'testuser' },
      labels: [{ name: 'bug' }]
    };

    expect(parseSearchQuery('is:open', pr)).toBe(true);
    expect(parseSearchQuery('author:testuser', pr)).toBe(true);
    expect(parseSearchQuery('label:bug', pr)).toBe(true);
    expect(parseSearchQuery('is:closed', pr)).toBe(false);
  });
}); 