<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<body class="bg-github-dark text-white">
  <nav class="bg-github-secondary border-b border-github-border">
    <div class="px-2 sm:px-4 py-2">
      <!-- Top navbar with logo, repo name, and search -->
      <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-2 space-y-2 sm:space-y-0">
        <div class="flex items-center space-x-4 w-full sm:w-auto">
          <div class="flex items-center justify-between w-full sm:w-auto">
            <div class="flex items-center space-x-4">
              <a href="#" class="text-white">
                <svg height="32" viewBox="0 0 16 16" class="fill-white" width="32">
                  <path d="M8 0c4.42 0 8 3.58 8 8a8.013 8.013 0 0 1-5.45 7.59c-.4.08-.55-.17-.55-.38 0-.27.01-1.13.01-2.2 0-.75-.25-1.23-.54-1.48 1.78-.2 3.65-.88 3.65-3.95 0-.88-.31-1.59-.82-2.15.08-.2.36-1.02-.08-2.12 0 0-.67-.22-2-.27-.68 0-1.36.09-2 .27-1.53-1.03-2.2-.82-2.2-.82-.44 1.1-.16 1.92-.08 2.12-.51.56-.82 1.28-.82 2.15 0 3.06 1.86 3.75 3.64 3.95-.23.2-.44.55-.51 1.07-.46.21-1.61.55-2.33-.66-.15-.24-.6-.83-1.23-.82-.67.01-.27.38.01.53.34.19.73.9.82 1.13.16.45.68 1.31 2.69.94 0 .67.01 1.3.01 1.49 0 .21-.15.45-.55.38A7.995 7.995 0 0 1 0 8c0-4.42 3.58-8 8-8Z"></path>
                </svg>
              </a>
              <div class="flex items-center space-x-2">
                <a href="#" class="text-white hover:text-github-text flex items-center space-x-2">
                  <span class="font-semibold text-sm sm:text-base">zaneCoder</span>
                  <span class="text-github-text">/</span>
                  <span class="font-semibold text-sm sm:text-base">mortdash</span>
                </a>
                <span class="inline-block px-2 py-0.5 text-xs font-medium bg-github-secondary rounded-full border border-github-border">Private</span>
              </div>
            </div>
            <button class="text-white hover:text-github-text lg:hidden">
              <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                <path d="M1 2.75A.75.75 0 0 1 1.75 2h12.5a.75.75 0 0 1 0 1.5H1.75A.75.75 0 0 1 1 2.75Zm0 5A.75.75 0 0 1 1.75 7h12.5a.75.75 0 0 1 0 1.5H1.75A.75.75 0 0 1 1 7.75ZM1.75 12h12.5a.75.75 0 0 1 0 1.5H1.75a.75.75 0 0 1 0-1.5Z"></path>
              </svg>
            </button>
          </div>
        </div>
        
        <!-- Search bar - Make it full width on mobile -->
        <div class="w-full sm:w-auto sm:flex-1 sm:max-w-2xl px-2 sm:px-4">
          <div class="relative">
            <input type="text" 
                   placeholder="Type / to search" 
                   class="w-full px-3 py-1.5 bg-github-dark border border-github-border rounded-md text-sm placeholder-github-text focus:outline-none focus:border-github-link">
            <div class="absolute right-3 top-1/2 transform -translate-y-1/2">
              <svg class="w-4 h-4 text-github-text" viewBox="0 0 16 16" fill="currentColor">
                <path d="M11.5 7a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm-.82 4.74a6 6 0 1 1 1.06-1.06l3.04 3.04a.75.75 0 1 1-1.06 1.06l-3.04-3.04Z"></path>
              </svg>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Navigation links below repo name -->
      <div class="hidden lg:flex items-center space-x-4 border-b border-github-border -mb-2">
        <a href="#" class="text-github-text hover:text-white px-3 py-3 border-b-2 border-transparent hover:border-github-text flex items-center">
          <svg class="mr-2" height="16" viewBox="0 0 16 16" fill="currentColor" width="16">
            <path d="M2 2.5A2.5 2.5 0 0 1 4.5 0h8.75a.75.75 0 0 1 .75.75v12.5a.75.75 0 0 1-.75.75h-2.5a.75.75 0 0 1 0-1.5h1.75v-2h-8a1 1 0 0 0-.714 1.7.75.75 0 1 1-1.072 1.05A2.495 2.495 0 0 1 2 11.5Zm10.5-1h-8a1 1 0 0 0-1 1v6.708A2.486 2.486 0 0 1 4.5 9h8ZM5 12.25a.25.25 0 0 1 .25-.25h3.5a.25.25 0 0 1 .25.25v3.25a.25.25 0 0 1-.4.2l-1.45-1.087a.249.249 0 0 0-.3 0L5.4 15.7a.25.25 0 0 1-.4-.2Z"></path>
          </svg>
          Code
        </a>
        <a href="#" class="text-github-text hover:text-white px-3 py-3 border-b-2 border-transparent hover:border-github-text flex items-center">
          <svg class="mr-2" height="16" viewBox="0 0 16 16" fill="currentColor" width="16">
            <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z"></path>
            <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0ZM1.5 8a6.5 6.5 0 1 0 13 0 6.5 6.5 0 0 0-13 0Z"></path>
          </svg>
          Issues
        </a>
        <a href="#" class="text-white px-3 py-3 border-b-2 border-github-btn flex items-center">
          <svg class="mr-2" height="16" viewBox="0 0 16 16" fill="currentColor" width="16">
            <path d="M1.5 3.25a2.25 2.25 0 1 1 3 2.122v5.256a2.251 2.251 0 1 1-1.5 0V5.372A2.25 2.25 0 0 1 1.5 3.25Zm5.677-.177L9.573.677A.25.25 0 0 1 10 .854V2.5h1A2.5 2.5 0 0 1 13.5 5v5.628a2.251 2.251 0 1 1-1.5 0V5a1 1 0 0 0-1-1h-1v1.646a.25.25 0 0 1-.427.177L7.177 3.427a.25.25 0 0 1 0-.354ZM3.75 2.5a.75.75 0 1 0 0 1.5.75.75 0 0 0 0-1.5Zm0 9.5a.75.75 0 1 0 0 1.5.75.75 0 0 0 0-1.5Zm8.25.75a.75.75 0 1 0 1.5 0 .75.75 0 0 0-1.5 0Z"></path>
          </svg>
          Pull requests
        </a>
        <a href="#" class="text-github-text hover:text-white px-3 py-3 border-b-2 border-transparent hover:border-github-text flex items-center">
          <svg class="mr-2" height="16" viewBox="0 0 16 16" fill="currentColor" width="16">
            <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0ZM1.5 8a6.5 6.5 0 1 0 13 0 6.5 6.5 0 0 0-13 0Zm4.879-2.773 4.264 2.559a.25.25 0 0 1 0 .428l-4.264 2.559A.25.25 0 0 1 6 10.559V5.442a.25.25 0 0 1 .379-.215Z"></path>
          </svg>
          Actions
        </a>
        <a href="#" class="text-github-text hover:text-white px-3 py-3 border-b-2 border-transparent hover:border-github-text flex items-center">
          <svg class="mr-2" height="16" viewBox="0 0 16 16" fill="currentColor" width="16">
            <path d="M0 1.75C0 .784.784 0 1.75 0h12.5C15.216 0 16 .784 16 1.75v12.5A1.75 1.75 0 0 1 14.25 16H1.75A1.75 1.75 0 0 1 0 14.25ZM1.5 1.75v12.5c0 .138.112.25.25.25h12.5a.25.25 0 0 0 .25-.25V1.75a.25.25 0 0 0-.25-.25H1.75a.25.25 0 0 0-.25.25ZM11.75 3a.75.75 0 0 1 .75.75v7.5a.75.75 0 0 1-1.5 0v-7.5a.75.75 0 0 1 .75-.75Zm-8.25.75a.75.75 0 0 1 1.5 0v5.5a.75.75 0 0 1-1.5 0ZM8 3a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5A.75.75 0 0 1 8 3Z"></path>
          </svg>
          Projects
        </a>
        <a href="#" class="text-github-text hover:text-white px-3 py-3 border-b-2 border-transparent hover:border-github-text flex items-center">
          <svg class="mr-2" height="16" viewBox="0 0 16 16" fill="currentColor" width="16">
            <path d="M7.467.133a1.748 1.748 0 0 1 1.066 0l5.25 1.68A1.75 1.75 0 0 1 15 3.48V7c0 1.566-.32 3.182-1.303 4.682-.983 1.498-2.585 2.813-5.032 3.855a1.697 1.697 0 0 1-1.33 0c-2.447-1.042-4.049-2.357-5.032-3.855C1.32 10.182 1 8.566 1 7V3.48a1.75 1.75 0 0 1 1.217-1.667Zm.61 1.429a.25.25 0 0 0-.153 0l-5.25 1.68a.25.25 0 0 0-.174.238V7c0 1.358.275 2.666 1.057 3.86.784 1.194 2.121 2.34 4.366 3.297a.196.196 0 0 0 .154 0c2.245-.956 3.582-2.104 4.366-3.298C13.225 9.666 13.5 8.36 13.5 7V3.48a.251.251 0 0 0-.174-.237l-5.25-1.68ZM8.75 4.75v3a.75.75 0 0 1-1.5 0v-3a.75.75 0 0 1 1.5 0ZM9 10.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"></path>
          </svg>
          Security
        </a>
        <a href="#" class="text-github-text hover:text-white px-3 py-3 border-b-2 border-transparent hover:border-github-text flex items-center">
          <svg class="mr-2" height="16" viewBox="0 0 16 16" fill="currentColor" width="16">
            <path d="M1.5 1.75V13.5h13.75a.75.75 0 0 1 0 1.5H.75a.75.75 0 0 1-.75-.75V1.75a.75.75 0 0 1 1.5 0Zm14.28 2.53-5.25 5.25a.75.75 0 0 1-1.06 0L7 7.06 4.28 9.78a.751.751 0 0 1-1.042-.018.751.751 0 0 1-.018-1.042l3.25-3.25a.75.75 0 0 1 1.06 0L10 7.94l4.72-4.72a.751.751 0 0 1 1.042.018.751.751 0 0 1 .018 1.042Z"></path>
          </svg>
          Insights
        </a>
        <a href="#" class="text-github-text hover:text-white px-3 py-3 border-b-2 border-transparent hover:border-github-text flex items-center">
          <svg class="mr-2" height="16" viewBox="0 0 16 16" fill="currentColor" width="16">
            <path d="M8 0a8.2 8.2 0 0 1 .701.031C9.444.095 9.99.645 10.16 1.29l.288 1.107c.018.066.079.158.212.231.114.454.243.243.668.386.123.082.233.09.299.071l1.103-.303c.644-.176 1.392.021 1.82.63.27.385.506.792.704 1.218.315.675.111 1.422-.364 1.891l-.814.806c.05-.048.098-.147.088-.294.016.257.016.515 0 .772-.01.147.038.246.088.294l.814.806c.475.469.679 1.216.364 1.891a7.977 7.977 0 0 1-.704 1.217c-.428.61-1.176.807-1.82.63l-1.102-.302c-.067-.019-.177-.011-.3.071a5.909 5.909 0 0 1-.668.386c-.133.066-.194.158-.211.224l-.29 1.106c-.168.646-.715 1.196-1.458 1.26a8.006 8.006 0 0 1-1.402 0c-.743-.064-1.289-.614-1.458-1.26l-.289-1.106c-.018-.066-.079-.158-.212-.224a5.738 5.738 0 0 1-.668-.386c-.123-.082-.233-.09-.299-.071l-1.103.303c-.644.176-1.392-.021-1.82-.63a8.12 8.12 0 0 1-.704-1.218c-.315-.675-.111-1.422.363-1.891l.815-.806c.05-.048.098-.147.088-.294a6.214 6.214 0 0 1 0-.772c.01-.147-.038-.246-.088-.294l-.815-.806C.635 6.045.431 5.298.746 4.623a7.92 7.92 0 0 1 .704-1.217c.428-.61 1.176-.807 1.82-.63l1.102.302c.067.019.177.011.3-.071.214-.143.437-.272.668-.386.133-.066.194-.158.211-.224l.29-1.106C6.009.645 6.556.095 7.299.03 7.53.01 7.764 0 8 0Zm-.571 1.525c-.036.003-.108.036-.137.146l-.289 1.105c-.147.561-.549.967-.998 1.189-.173.086-.34.183-.5.29-.417.278-.97.423-1.529.27l-1.103-.303c-.109-.03-.175.016-.195.045-.22.312-.412.644-.573.99-.014.031-.021.11.059.19l.815.806c.411.406.562.957.53 1.456a4.709 4.709 0 0 0 0 .582c.032.499-.119 1.05-.53 1.456l-.815.806c-.081.08-.073.159-.059.19.162.346.353.677.573.989.02.03.085.076.195.046l1.102-.303c.56-.153 1.113-.008 1.53.27.161.107.328.204.501.29.447.222.85.629.997 1.189l.289 1.105c.029.109.101.143.137.146a6.6 6.6 0 0 0 1.142 0c.036-.003.108-.036.137-.146l.289-1.105c.147-.561.549-.967.998-1.189.173-.086-.34-.183-.5-.29-.417-.278.97-.423 1.529.27l1.103.303c.109.029.175-.016.195-.045.22-.313.411-.644.573-.99.014-.031.021-.11-.059-.19l-.815-.806c-.411-.406-.562-.957-.53-1.456a4.709 4.709 0 0 0 0-.582c-.032-.499.119-1.05.53-1.456l.815-.806c.081-.08.073-.159.059-.19a6.464 6.464 0 0 0-.573-.989c-.02-.03-.085-.076-.195-.046l-1.102.303c-.56.153-1.113.008-1.53-.27a4.44 4.44 0 0 0-.501-.29c-.447-.222-.85-.629-.997-1.189l-.289-1.105c-.029-.11-.101-.143-.137-.146a6.6 6.6 0 0 0-1.142 0ZM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM9.5 8a1.5 1.5 0 1 0-3.001.001A1.5 1.5 0 0 0 9.5 8Z"></path>
          </svg>
          Settings
        </a>
      </div>
    </div>
  </nav>

  <div id="mobile-menu" class="lg:hidden fixed inset-0 z-50 bg-github-dark bg-opacity-95 hidden">
    <div class="flex flex-col h-full">
      <div class="flex justify-between items-center p-4 border-b border-github-border">
        <span class="text-white font-semibold">Menu</span>
        <button id="close-menu" class="text-white">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
            <path d="M3.72 3.72a.75.75 0 0 1 1.06 0L8 6.94l3.22-3.22a.75.75 0 1 1 1.06 1.06L9.06 8l3.22 3.22a.75.75 0 1 1-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 0 1-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 0 1 0-1.06z"></path>
          </svg>
        </button>
      </div>
      <div class="flex-1 overflow-y-auto p-4">
        <nav class="flex flex-col space-y-4">
          <a href="#" class="text-white flex items-center space-x-2 p-2 hover:bg-github-secondary rounded-md">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 16 16">
              <path d="M2 2.5A2.5 2.5 0 0 1 4.5 0h8.75a.75.75 0 0 1 .75.75v12.5a.75.75 0 0 1-.75.75h-2.5a.75.75 0 0 1 0-1.5h1.75v-2h-8a1 1 0 0 0-.714 1.7.75.75 0 1 1-1.072 1.05A2.495 2.495 0 0 1 2 11.5Zm10.5-1h-8a1 1 0 0 0-1 1v6.708A2.486 2.486 0 0 1 4.5 9h8ZM5 12.25a.25.25 0 0 1 .25-.25h3.5a.25.25 0 0 1 .25.25v3.25a.25.25 0 0 1-.4.2l-1.45-1.087a.249.249 0 0 0-.3 0L5.4 15.7a.25.25 0 0 1-.4-.2Z"></path>
            </svg>
            <span>Code</span>
          </a>
          <!-- Add similar menu items for Issues, Pull requests, etc. -->
        </nav>
      </div>
    </div>
  </div>

  <div class="container mx-auto px-4">
    <!-- Filters section -->
    <div class="flex flex-col border-b border-github-border">
      <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center py-4 space-y-4 lg:space-y-0">
        <div class="flex flex-col lg:flex-row items-start lg:items-center space-y-4 lg:space-y-0 lg:space-x-4 w-full lg:w-auto">
          <div class="relative w-full lg:w-auto">
            <button id="filters-btn" class="w-full lg:w-auto px-3 py-1 text-sm font-medium rounded-md bg-github-secondary hover:bg-github-border flex items-center justify-between lg:justify-start">
              <span>Filters</span>
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
          <div class="relative w-full lg:w-auto lg:flex-1 lg:max-w-2xl">
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
        <div class="flex items-center w-full lg:w-auto">
          <button class="w-full lg:w-auto px-3 py-1 text-sm font-medium rounded-md bg-github-btn hover:bg-github-hover">
            New pull request
          </button>
        </div>
      </div>

      <!-- Open/Closed counts moved here -->
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

    <!-- PR List Container -->
    <div class="mt-4">
      <!-- PR List Header -->
      <div class="flex flex-col lg:flex-row lg:items-center justify-between py-3 space-y-4 lg:space-y-0">
        <div class="flex items-center space-x-2">
          <input type="checkbox" class="rounded border-github-border bg-github-dark">
          <span class="text-sm"><span id="total-count">0</span> All</span>
          <div class="flex items-center space-x-2 text-sm text-github-text">
            <span><span id="open-count">0</span> Open</span>
            <span><span id="closed-count">0</span> Closed</span>
          </div>
        </div>
        
        <div class="flex flex-wrap items-center gap-4 text-sm">
          <button class="text-github-text hover:text-white">Author</button>
          <button class="text-github-text hover:text-white">Label</button>
          <button class="text-github-text hover:text-white">Projects</button>
          <button class="text-github-text hover:text-white hidden lg:block">Milestones</button>
          <button class="text-github-text hover:text-white hidden lg:block">Assignee</button>
          <button class="text-github-text hover:text-white">Sort</button>
        </div>
      </div>

      <!-- PR Items -->
      <div id="pr-list" class="divide-y divide-github-border">
        <!-- PRs will be dynamically inserted here by script.js -->
      </div>
    </div>
  </div>

  <!-- PR Item Template -->
  <template id="pr-template">
    <div class="flex items-start py-3 hover:bg-github-secondary">
      <div class="flex-shrink-0 pt-1 pl-4">
        <input type="checkbox" class="rounded border-github-border bg-github-dark">
      </div>
      <div class="flex-1 min-w-0 px-4">
        <div class="flex items-center space-x-2">
          <svg class="w-4 h-4 text-github-btn pr-state-icon" viewBox="0 0 16 16" fill="currentColor">
            <path d="M1.5 3.25a2.25 2.25 0 1 1 3 2.122v5.256a2.251 2.251 0 1 1-1.5 0V5.372A2.25 2.25 0 0 1 1.5 3.25Zm5.677-.177L9.573.677A.25.25 0 0 1 10 .854V2.5h1A2.5 2.5 0 0 1 13.5 5v5.628a2.251 2.251 0 1 1-1.5 0V5a1 1 0 0 0-1-1h-1v1.646a.25.25 0 0 1-.427.177L7.177 3.427a.25.25 0 0 1 0-.354Z"></path>
          </svg>
          <a href="#" class="pr-title font-semibold hover:text-github-link"></a>
        </div>
        <div class="mt-1 text-xs text-github-text pr-meta">
          <!-- Meta info will be inserted here -->
        </div>
      </div>
      <div class="flex-shrink-0 pr-4">
      </div>
    </div>
  </template>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const menuButton = document.querySelector('.lg\\:hidden button');
      const mobileMenu = document.getElementById('mobile-menu');
      const closeMenu = document.getElementById('close-menu');

      menuButton?.addEventListener('click', () => {
        mobileMenu?.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
      });

      closeMenu?.addEventListener('click', () => {
        mobileMenu?.classList.add('hidden');
        document.body.style.overflow = '';
      });

      // Close menu when clicking outside
      document.addEventListener('click', (event) => {
        if (!menuButton?.contains(event.target) && 
            !mobileMenu?.contains(event.target) && 
            !mobileMenu?.classList.contains('hidden')) {
          mobileMenu?.classList.add('hidden');
          document.body.style.overflow = '';
        }
      });
    });
  </script>
  <script src="{{ secure_asset('github-clone/script.js') }}"></script>
</body>
</html>