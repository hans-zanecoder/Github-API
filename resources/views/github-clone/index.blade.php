<div class="min-h-screen bg-gray-900 text-gray-300">
    <div class="border-b border-gray-700 p-4">
        <div class="flex items-center space-x-4">
            <button class="px-3 py-2 text-sm font-medium rounded-md bg-gray-800 hover:bg-gray-700">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M7.36,2.64A9,9,0,0,0,2.5,4.87" />
                    </svg>
                    Pull requests
                </span>
            </button>
        </div>
    </div>

    <div class="p-4 flex items-center justify-between border-b border-gray-700">
        <div class="flex items-center space-x-4">
            <button id="filters-btn" class="px-3 py-1 text-sm font-medium rounded-md bg-gray-800 hover:bg-gray-700">
                Filters
            </button>
            <div class="relative">
                <input type="text" placeholder="is:pr is:open" 
                    class="w-96 px-3 py-1 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
            </div>
        </div>
        <div class="flex items-center space-x-4">
            <button class="flex items-center px-3 py-1 text-sm font-medium rounded-md bg-gray-800 hover:bg-gray-700">
                Labels
                <span class="ml-2 px-2 py-0.5 text-xs rounded-full bg-gray-700">9</span>
            </button>
            <button class="flex items-center px-3 py-1 text-sm font-medium rounded-md bg-gray-800 hover:bg-gray-700">
                Milestones
                <span class="ml-2 px-2 py-0.5 text-xs rounded-full bg-gray-700">0</span>
            </button>
            <button class="px-3 py-1 text-sm font-medium rounded-md bg-green-600 hover:bg-green-700">
                New pull request
            </button>
        </div>
    </div>

    <div class="divide-y divide-gray-700" id="pr-list">
    </div>
</div>

<script>
    function createPRItem(pr) {
        return `
            <div class="hover:bg-gray-800 p-4 flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M7.177 3.073L9.573.677A.25.25 0 0110 .854v4.792a.25.25 0 01-.427.177L7.177 3.427a.25.25 0 010-.354zM3.75 2.5a.75.75 0 100 1.5.75.75 0 000-1.5zm-2.25.75a2.25 2.25 0 113 2.122v5.256a2.251 2.251 0 11-1.5 0V5.372A2.25 2.25 0 011.5 3.25zM11 2.5h-1V4h1a1 1 0 011 1v5.628a2.251 2.251 0 101.5 0V5A2.5 2.5 0 0011 2.5zm1 10.25a.75.75 0 111.5 0 .75.75 0 01-1.5 0zM3.75 12a.75.75 0 100 1.5.75.75 0 000-1.5z"/>
                    </svg>
                    <div>
                        <h3 class="font-medium">${pr.title}</h3>
                        <p class="text-sm text-gray-500">
                            #${pr.number} opened ${new Date(pr.created_at).toLocaleDateString()} by ${pr.user.login}
                        </p>
                    </div>
                </div>
                <button onclick="cloneRepository('${pr.head.repo.clone_url}')" 
                    class="px-3 py-1 text-sm font-medium rounded-md bg-green-600 hover:bg-green-700">
                    Clone
                </button>
            </div>
        `;
    }

    // Update the renderPullRequests function
    function renderPullRequests(prs) {
        const prList = document.getElementById("pr-list");
        prList.innerHTML = prs.map(pr => createPRItem(pr)).join('');
    }
</script>