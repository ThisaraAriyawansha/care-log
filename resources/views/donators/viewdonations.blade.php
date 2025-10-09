<body class="bg-gray-50">
    @include('layouts.header')

    <!-- Toast Notification Container -->
    <div id="toast-container" class="fixed z-50 transform -translate-x-1/2 top-4 left-1/2 md:left-auto md:right-4 md:transform-none"></div>

    <!-- Main Content -->
    <div class="px-4 py-4 sm:px-6 lg:px-8">
        <div class="flex flex-col space-y-6">
            <!-- Breadcrumbs -->
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex flex-wrap items-center space-x-1 text-sm text-gray-600">
                    <li class="inline-flex items-center">
                        <a href="{{ url('/dashboard') }}" class="inline-flex items-center transition-colors hover:text-blue-600">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 1 1 1-1h2a1 1 0 1 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                            </svg>
                            Main Panel
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <a href="{{ url('/donators/donators') }}" class="transition-colors hover:text-blue-600">Donators</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="font-medium text-gray-700">My Donations</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Page Header -->
            <div class="flex flex-col items-start justify-between space-y-4 sm:flex-row sm:items-center sm:space-y-0">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">My Donations</h1>
                    <p class="mt-1 text-sm text-gray-500">View and manage your donation history</p>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="px-3 py-1 text-sm font-medium text-blue-700 bg-blue-100 rounded-full">
                        {{ $donations->count() }} {{ $donations->count() === 1 ? 'Donation' : 'Donations' }}
                    </span>
                </div>
            </div>

            <!-- Search and Filter Section -->
            <div class="flex flex-col gap-4 p-4 bg-white rounded-lg shadow sm:p-6">
                <div class="flex flex-col gap-4 sm:flex-row">
                    <div class="relative flex-1">
                        <input type="text" id="search-input" class="w-full py-2 pl-10 pr-4 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Search by date (e.g., Oct 2025) or item name...">
                        <svg class="absolute w-5 h-5 text-gray-400 transform -translate-y-1/2 left-3 top-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <button id="clear-search" class="px-4 py-2 text-gray-700 transition bg-gray-200 rounded-lg hover:bg-gray-300 whitespace-nowrap">Clear Search</button>
                </div>
                
                <!-- Filter Options -->
                <div class="flex flex-wrap gap-2">
                    <button class="px-3 py-1 text-sm transition bg-gray-100 rounded-full filter-btn hover:bg-gray-200" data-filter="all">All</button>
                    <button class="px-3 py-1 text-sm transition bg-gray-100 rounded-full filter-btn hover:bg-gray-200" data-filter="recent">Recent</button>
                    <button class="px-3 py-1 text-sm transition bg-gray-100 rounded-full filter-btn hover:bg-gray-200" data-filter="oldest">Oldest</button>
                </div>
            </div>

            <!-- Donations Content -->
            <div class="mt-6">
                <div id="loading" class="hidden py-8 text-center text-gray-500">
                    <div class="inline-block w-8 h-8 border-4 border-blue-200 rounded-full border-t-blue-600 animate-spin"></div>
                    <p class="mt-2">Loading donations...</p>
                </div>
                
                @if($donations->isEmpty())
                    <div class="py-12 text-center bg-white rounded-lg shadow">
                        <svg class="w-16 h-16 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0H4"></path>
                        </svg>
                        <h3 class="mt-4 text-lg font-medium text-gray-900">No donations yet</h3>
                        <p class="mt-1 text-gray-500">You haven't made any donations yet. Start making a difference today!</p>
                        <div class="mt-6">
                            <a href="{{ url('/donate') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Make Your First Donation
                            </a>
                        </div>
                    </div>
                @else
                    <!-- Desktop Table View -->
                    <div class="hidden overflow-x-auto bg-white rounded-lg shadow md:block">
                        <table id="donations-table" class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase sm:px-6">Donation Date</th>
                                    <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase sm:px-6">Total Quantity</th>
                                    <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase sm:px-6">Items</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($donations as $donation)
                                    <tr class="transition hover:bg-gray-50">
                                        <td class="px-4 py-4 text-sm font-medium text-gray-900 whitespace-nowrap sm:px-6">
                                            <div class="flex items-center">
                                                <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                                {{ $donation->donation_date }}
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-sm text-gray-900 whitespace-nowrap sm:px-6">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                {{ $donation->total_quantity }} items
                                            </span>
                                        </td>
                                        <td class="px-4 py-4 text-sm text-gray-900 sm:px-6">
                                            <div class="flex flex-wrap gap-2">
                                                @foreach($donation->items as $donationItem)
                                                    <div class="flex items-center px-3 py-1 bg-gray-100 rounded-full">
                                                        <span>{{ $donationItem->item->item_name }} ({{ $donationItem->quantity }})</span>
                                                        @if($donationItem->item->image_path)
                                                            <img src="{{ $donationItem->item->image_url }}" alt="{{ $donationItem->item->item_name }}" class="object-cover w-6 h-6 ml-2 rounded-full">
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Mobile Card View -->
                    <div id="mobile-donations" class="space-y-4 md:hidden">
                        @foreach($donations as $donation)
                            <div class="p-4 bg-white rounded-lg shadow donation-card">
                                <div class="flex items-start justify-between">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span class="font-medium text-gray-900">{{ $donation->donation_date }}</span>
                                    </div>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $donation->total_quantity }} items
                                    </span>
                                </div>
                                
                                <div class="mt-3">
                                    <h4 class="text-sm font-medium text-gray-700">Donated Items:</h4>
                                    <div class="mt-2 space-y-2">
                                        @foreach($donation->items as $donationItem)
                                            <div class="flex items-center justify-between p-2 rounded bg-gray-50">
                                                <div class="flex items-center">
                                                    @if($donationItem->item->image_path)
                                                        <img src="{{ $donationItem->item->image_url }}" alt="{{ $donationItem->item->item_name }}" class="object-cover w-8 h-8 rounded">
                                                    @endif
                                                    <span class="ml-2 text-sm">{{ $donationItem->item->item_name }}</span>
                                                </div>
                                                <span class="text-sm font-medium text-gray-700">{{ $donationItem->quantity }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                @endif
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <!-- Flowbite JS for Toasts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <!-- Search, Filter and Toast Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('search-input');
            const clearSearch = document.getElementById('clear-search');
            const donationsTable = document.getElementById('donations-table');
            const tableRows = donationsTable ? donationsTable.querySelectorAll('tbody tr') : [];
            const mobileCards = document.querySelectorAll('.donation-card');
            const filterBtns = document.querySelectorAll('.filter-btn');
            const loading = document.getElementById('loading');
            let debounceTimer;

            // Show Toast Notification
            function showToast(message, type = 'info') {
                const toast = document.createElement('div');
                toast.className = `flex items-center p-4 mb-4 text-sm rounded-lg shadow z-50 max-w-xs ${
                    type === 'error' ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700'
                }`;
                toast.innerHTML = `
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="${
                            type === 'error'
                                ? 'M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z'
                                : 'M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z'
                        }" clip-rule="evenodd"/>
                    </svg>
                    <span>${message}</span>
                `;
                document.getElementById('toast-container').appendChild(toast);
                setTimeout(() => toast.remove(), 3000);
            }

            // Search Functionality
            function performSearch(query) {
                let hasResults = false;
                
                // Search in table rows (desktop)
                tableRows.forEach(row => {
                    const date = row.cells[0].textContent.toLowerCase();
                    const items = row.cells[2].textContent.toLowerCase();
                    const matches = date.includes(query) || items.includes(query);
                    row.style.display = matches ? '' : 'none';
                    if (matches) hasResults = true;
                });
                
                // Search in mobile cards
                mobileCards.forEach(card => {
                    const cardText = card.textContent.toLowerCase();
                    const matches = cardText.includes(query);
                    card.style.display = matches ? '' : 'none';
                    if (matches) hasResults = true;
                });
                
                return hasResults;
            }

            // Filter Functionality
            function applyFilter(filterType) {
                // Reset all active filters
                filterBtns.forEach(btn => {
                    btn.classList.remove('bg-blue-100', 'text-blue-800');
                    btn.classList.add('bg-gray-100', 'hover:bg-gray-200');
                });
                
                // Set active filter
                const activeBtn = document.querySelector(`[data-filter="${filterType}"]`);
                activeBtn.classList.remove('bg-gray-100', 'hover:bg-gray-200');
                activeBtn.classList.add('bg-blue-100', 'text-blue-800');
                
                // In a real app, this would make an API call or sort the data
                // For now, we'll just show a toast
                showToast(`Filtered by: ${filterType}`, 'info');
            }

            // Search Event Listener
            searchInput.addEventListener('input', () => {
                clearTimeout(debounceTimer);
                loading.classList.remove('hidden');

                debounceTimer = setTimeout(() => {
                    const query = searchInput.value.trim().toLowerCase();
                    const hasResults = performSearch(query);
                    
                    loading.classList.add('hidden');
                    showToast(hasResults ? 'Search results updated' : 'No matching donations found', hasResults ? 'info' : 'error');
                }, 300);
            });

            // Clear Search
            clearSearch.addEventListener('click', () => {
                searchInput.value = '';
                tableRows.forEach(row => row.style.display = '');
                mobileCards.forEach(card => card.style.display = '');
                showToast('Search cleared', 'info');
                loading.classList.add('hidden');
            });

            // Filter Event Listeners
            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    const filterType = btn.getAttribute('data-filter');
                    applyFilter(filterType);
                });
            });

            // Load More Button (simulated)
            const loadMoreBtn = document.getElementById('load-more');
            if (loadMoreBtn) {
                loadMoreBtn.addEventListener('click', () => {
                    loadMoreBtn.textContent = 'Loading...';
                    loadMoreBtn.disabled = true;
                    
                    // Simulate API call
                    setTimeout(() => {
                        showToast('More donations loaded', 'info');
                        loadMoreBtn.textContent = 'Load More Donations';
                        loadMoreBtn.disabled = false;
                    }, 1500);
                });
            }
        });
    </script>
</body>