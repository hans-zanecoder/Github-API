<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>GitHub Clone</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            github: {
              dark: '#0d1117',
              btn: '#238636',
              border: '#30363d',
              hover: '#2ea043',
              secondary: '#21262d',
              text: '#7d8590',
              link: '#2f81f7'
            }
          }
        }
      },
    }
  </script>
</head>
<body class="bg-github-dark text-white min-h-screen">
  <!-- Mobile Menu Overlay -->
  <div id="mobile-menu" class="fixed inset-0 bg-github-dark bg-opacity-95 z-50 hidden lg:hidden">
    <div class="p-4">
      <button id="close-menu" class="text-white hover:text-github-text mb-4">
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
      <nav class="flex flex-col space-y-4">
        <a href="#" class="text-white hover:text-github-text py-2">Code</a>
        <a href="#" class="text-white hover:text-github-text py-2">Issues</a>
        <a href="#" class="text-white hover:text-github-text py-2">Pull requests</a>
        <a href="#" class="text-white hover:text-github-text py-2">Actions</a>
        <a href="#" class="text-white hover:text-github-text py-2">Projects</a>
        <a href="#" class="text-white hover:text-github-text py-2">Security</a>
        <a href="#" class="text-white hover:text-github-text py-2">Insights</a>
        <a href="#" class="text-white hover:text-github-text py-2">Settings</a>
      </nav>
    </div>
  </div>

  <nav class="bg-github-secondary border-b border-github-border">
    <div class="px-4 py-2">
      <div class="flex items-center justify-between mb-2">
        <div class="flex items-center space-x-4">
          <a href="#" class="text-white">
            <svg height="32" viewBox="0 0 16 16" class="fill-white" width="32">
              <path d="M8 0c4.42 0 8 3.58 8 8a8.013 8.013 0 0 1-5.45 7.59c-.4.08-.55-.17-.55-.38 0-.27.01-1.13.01-2.2 0-.75-.25-1.23-.54-1.48 1.78-.2 3.65-.88 3.65-3.95 0-.88-.31-1.59-.82-2.15.08-.2.36-1.02-.08-2.12 0 0-.67-.22-2.2.82-.64-.18-1.32-.27-2-.27-.68 0-1.36.09-2 .27-1.53-1.03-2.2-.82-2.2-.82-.44 1.1-.16 1.92-.08 2.12-.51.56-.82 1.28-.82 2.15 0 3.06 1.86 3.75 3.64 3.95-.23.2-.44.55-.51 1.07-.46.21-1.61.55-2.33-.66-.15-.24-.6-.83-1.23-.82-.67.01-.27.38.01.53.34.19.73.9.82 1.13.16.45.68 1.31 2.69.94 0 .67.01 1.3.01 1.49 0 .21-.15.45-.55.38A7.995 7.995 0 0 1 0 8c0-4.42 3.58-8 8-8Z"></path>
            </svg>
          </a>
          <button id="menu-toggle" class="text-white hover:text-github-text lg:hidden">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
              <path d="M1 2.75A.75.75 0 0 1 1.75 2h12.5a.75.75 0 0 1 0 1.5H1.75A.75.75 0 0 1 1 2.75Zm0 5A.75.75 0 0 1 1.75 7h12.5a.75.75 0 0 1 0 1.5H1.75A.75.75 0 0 1 1 7.75ZM1.75 12h12.5a.75.75 0 0 1 0 1.5H1.75a.75.75 0 0 1 0-1.5Z"></path>
            </svg>
          </button>
          <div class="flex items-center space-x-2">
            <a href="#" class="text-white hover:text-github-text flex items-center space-x-2">
              <span class="font-semibold truncate max-w-[120px] sm:max-w-none">zaneCoder</span>
              <span class="text-github-text">/</span>
              <span class="font-semibold truncate max-w-[100px] sm:max-w-none">mortdash</span>
            </a>
            <span class="hidden sm:inline-block px-2 py-0.5 text-xs font-medium bg-github-secondary rounded-full border border-github-border">Private</span>
          </div>
        </div>
        <div class="flex items-center space-x-4">
          <div class="relative hidden sm:block w-full md:w-auto">
            <input type="text" 
                   placeholder="Type / to search" 
                   class="w-48 md:w-72 px-3 py-1.5 bg-github-dark border border-github-border rounded-md text-sm placeholder-github-text focus:outline-none focus:border-github-link">
          </div>
          <button class="hover:text-github-text">
            <svg height="16" viewBox="0 0 16 16" class="fill-current" width="16">
              <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path>
            </svg>
          </button>
        </div>
      </div>
      <!-- Navigation links below repo name -->
      <div class="hidden lg:flex items-center space-x-4 border-b border-github-border -mb-2">
        <a href="#" class="text-github-text hover:text-white px-3 py-3 border-b-2 border-transparent hover:border-github-text">Code</a>
        <a href="#" class="text-github-text hover:text-white px-3 py-3 border-b-2 border-transparent hover:border-github-text">Issues</a>
        <a href="#" class="text-white px-3 py-3 border-b-2 border-github-btn">Pull requests</a>
        <a href="#" class="text-github-text hover:text-white px-3 py-3 border-b-2 border-transparent hover:border-github-text">Actions</a>
        <a href="#" class="text-github-text hover:text-white px-3 py-3 border-b-2 border-transparent hover:border-github-text">Projects</a>
        <a href="#" class="text-github-text hover:text-white px-3 py-3 border-b-2 border-transparent hover:border-github-text">Security</a>
        <a href="#" class="text-github-text hover:text-white px-3 py-3 border-b-2 border-transparent hover:border-github-text">Insights</a>
        <a href="#" class="text-github-text hover:text-white px-3 py-3 border-b-2 border-transparent hover:border-github-text">Settings</a>
      </div>
    </div>
  </nav>
  <div class="container mx-auto px-4 py-4">
    <!-- Filters section -->
    <div class="flex flex-col border-b border-github-border">
      <div class="flex justify-between items-center py-4">
        <div class="flex items-center space-x-4 flex-1">
          <div class="relative">
            <button id="filters-btn" class="px-3 py-1 text-sm font-medium rounded-md bg-github-secondary hover:bg-github-border flex items-center">
              Filters
              <svg class="ml-2 w-4 h-4" viewBox="0 0 16 16" fill="currentColor">
                <path d="M4.427 7.427l3.396 3.396a.25.25 0 00.354 0l3.396-3.396A.25.25 0 0011.396 7H4.604a.25.25 0 00-.177.427z" />
              </svg>
            </button>
            <div id="filters-dropdown" class="hidden absolute left-0 mt-2 w-60 rounded-md shadow-lg bg-github-secondary border border-github-border">
              <div class="py-1">
                <button class="filter-option w-full text-left px-4 py-2 text-sm text-white hover:bg-github-border" data-filter="all">All</button>
                <button class="filter-option w-full text-left px-4 py-2 text-sm text-white hover:bg-github-border" data-filter="open">Open</button>
                <button class="filter-option w-full text-left px-4 py-2 text-sm text-white hover:bg-github-border" data-filter="closed">Closed</button>
                <button class="filter-option w-full text-left px-4 py-2 text-sm text-white hover:bg-github-border" data-filter="draft">Draft</button>
              </div>
            </div>
          </div>
          <div class="relative flex-1 max-w-2xl">
            <input type="text" 
                   id="search-input"
                   placeholder="is:pr is:open" 
                   class="w-full px-3 py-1.5 bg-github-secondary border border-github-border rounded-md text-sm text-white placeholder-github-text focus:outline-none focus:border-github-link">
            <div class="absolute right-3 top-1/2 transform -translate-y-1/2">
              <svg class="w-4 h-4 text-github-text" viewBox="0 0 16 16" fill="currentColor">
                <path d="M11.5 7a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm-.82 4.74a6 6 0 1 1 1.06-1.06l3.04 3.04a.75.75 0 1 1-1.06 1.06l-3.04-3.04Z"></path>
              </svg>
            </div>
          </div>
        </div>
        <div class="flex items-center space-x-4">
          <button class="px-3 py-1 text-sm font-medium rounded-md bg-github-btn hover:bg-github-hover">
            New pull request
          </button>
        </div>
      </div>
      <div class="flex items-center space-x-4 pb-3">
        <button id="open-filter" class="flex items-center space-x-1 px-3 py-1 text-sm font-medium rounded-md bg-github-secondary hover:bg-github-border">
          <svg class="w-4 h-4 mr-1" viewBox="0 0 16 16" fill="currentColor">
            <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z"></path>
            <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0ZM1.5 8a6.5 6.5 0 1 0 13 0 6.5 6.5 0 0 0-13 0Z"></path>
          </svg>
          <span id="open-count">0</span>
          <span>Open</span>
        </button>
        <button id="closed-filter" class="flex items-center space-x-1 px-3 py-1 text-sm font-medium text-github-text hover:text-white">
          <svg class="w-4 h-4 mr-1" viewBox="0 0 16 16" fill="currentColor">
            <path d="M13.78 4.22a.75.75 0 0 1 0 1.06l-7.25 7.25a.75.75 0 0 1-1.06 0L2.22 9.28a.75.75 0 0 1 1.06-1.06L6 10.94l6.72-6.72a.75.75 0 0 1 1.06 0Z"></path>
          </svg>
          <span id="closed-count">0</span>
          <span>Closed</span>
        </button>
      </div>
    </div>
    <div id="pr-list" class="divide-y divide-github-border">
      <!-- PRs will be inserted here -->
    </div>
  </div>
  <template id="pr-template">
    <div class="pr-item flex items-center py-4 hover:bg-github-secondary">
      <div class="flex items-center space-x-3">
        <svg class="w-5 h-5 text-github-btn" viewBox="0 0 16 16" fill="currentColor">
          <path d="M7.177 3.073L9.573.677A.25.25 0 0110 .854v4.792a.25.25 0 01-.427.177L7.177 3.427a.25.25 0 010-.354zM3.75 2.5a.75.75 0 100 1.5.75.75 0 000-1.5zm-2.25.75a2.25 2.25 0 113 2.122v5.256a2.251 2.251 0 11-1.5 0V5.372A2.25 2.25 0 011.5 3.25zM11 2.5h-1V4h1a1 1 0 011 1v5.628a2.251 2.251 0 101.5 0V5A2.5 2.5 0 0011 2.5zm1 10.25a.75.75 0 111.5 0 .75.75 0 01-1.5 0zM3.75 12a.75.75 0 100 1.5.75.75 0 000-1.5z"/>
        </svg>
        <div>
          <h3 class="font-medium text-github-link hover:underline pr-title"></h3>
          <p class="text-sm text-github-text pr-meta"></p>
        </div>
      </div>
    </div>
  </template>
  <script>
    // Mobile menu functionality
    document.addEventListener('DOMContentLoaded', () => {
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const closeMenu = document.getElementById('close-menu');

        menuToggle?.addEventListener('click', () => {
            mobileMenu?.classList.remove('hidden');
        });

        closeMenu?.addEventListener('click', () => {
            mobileMenu?.classList.add('hidden');
        });

        // Close menu when clicking outside
        document.addEventListener('click', (event) => {
            if (!menuToggle?.contains(event.target) && 
                !mobileMenu?.contains(event.target) && 
                !mobileMenu?.classList.contains('hidden')) {
                mobileMenu?.classList.add('hidden');
            }
        });
    });
  </script>
  <script src="{{ asset('github-clone/script.js') }}"></script>
</body>
</html>