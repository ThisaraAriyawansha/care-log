
<body class="bg-gray-50">
    @include('layouts.header')

    <!-- Toast Container -->
    <div id="toastContainer" class="fixed z-50 max-w-sm space-y-2 top-4 right-4"></div>

    <!-- Laravel Session Messages -->
    @if(session('success'))
        <div id="successMessage" data-message="{{ session('success') }}" class="hidden"></div>
    @endif
    
    @if($errors->any())
        <div id="errorMessage" data-message="{{ $errors->first() }}" class="hidden"></div>
    @endif

    <!-- Header Section -->
    <div class="px-4 py-4 sm:px-6 lg:px-8">
        <div class="flex flex-col space-y-4">
            <!-- Breadcrumbs -->
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex flex-wrap items-center space-x-1 text-sm text-gray-600">
                    <li class="inline-flex items-center">
                        <a href="{{ asset('/dashboard')}}" class="inline-flex items-center transition-colors hover:text-gray-900">
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
                            <a href="{{ asset('/donators/donators')}}" class="transition-colors hover:text-gray-900">Donators</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="font-medium text-gray-700">Add Donation</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    
    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
            <!-- Left Side: Item Selection -->
            <div class="bg-white rounded-lg shadow-sm">
                <div class="p-4 border-b border-gray-200 sm:p-6">
                    <h3 class="text-lg font-semibold text-gray-900">Available Items</h3>
                    
                    <!-- Search Bar -->
                    <div class="relative mt-4">
                        <input 
                            type="text" 
                            id="searchInput" 
                            placeholder="Search items..." 
                            class="w-full px-4 py-2 pl-10 text-sm transition-colors border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        >
                        <svg class="absolute w-5 h-5 text-gray-400 left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>

                <div class="p-4 overflow-y-auto sm:p-6" style="max-height: 600px;">
                    <div id="itemsGrid" class="grid grid-cols-2 gap-3 sm:grid-cols-3 md:gap-4">
                        @foreach ($items as $item)
                            <div class="transition-all duration-200 transform bg-white border border-gray-200 rounded-lg cursor-pointer item-card hover:shadow-lg hover:scale-105 hover:border-blue-400" 
                                 data-item-id="{{ $item->id }}" 
                                 data-item-name="{{ $item->item_name }}" 
                                 data-item-image="{{ $item->image_url }}">
                                <img src="{{ $item->image_url }}" class="object-cover w-full rounded-t-lg h-28 sm:h-36" alt="{{ $item->item_name }}">
                                <div class="p-3">
                                    <h5 class="mb-1 text-sm font-semibold text-gray-900 truncate sm:text-base">{{ $item->item_name }}</h5>
                                    <p class="text-xs text-gray-500 sm:text-sm">In Stock: {{ $item->quantity }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div id="noResults" class="hidden py-8 text-center text-gray-500">
                        <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-sm">No items found</p>
                    </div>
                </div>
            </div>

            <!-- Right Side: Selected Items -->
            <div class="bg-white rounded-lg shadow-sm">
                <div class="p-4 border-b border-gray-200 sm:p-6">
                    <h3 class="text-lg font-semibold text-gray-900">Selected Items</h3>
                    <p class="mt-1 text-sm text-gray-500">Click items to add them to your donation</p>
                </div>

                <div class="p-4 sm:p-6">
                    <form id="donationForm" action="{{ route('donation.store') }}" method="POST">
                        @csrf
                        <div class="mb-6 overflow-y-auto" style="max-height: 450px;">
                            <div id="emptyState" class="py-12 text-center">
                                <svg class="w-20 h-20 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                                <p class="text-sm font-medium text-gray-900">No items selected</p>
                                <p class="mt-1 text-xs text-gray-500">Click on items from the left to add them</p>
                            </div>
                            
                            <div id="selectedItemsList" class="hidden space-y-3">
                                <!-- Dynamically populated -->
                            </div>
                        </div>

                        <!-- Summary and Submit -->
                        <div class="pt-4 border-t border-gray-200">
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-sm font-medium text-gray-700">Total Items:</span>
                                <span id="totalItems" class="text-lg font-bold text-blue-600">0</span>
                            </div>
                            <button 
                                type="submit" 
                                id="submitDonation" 
                                class="w-full px-6 py-3 text-sm font-medium text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:bg-gray-300 disabled:cursor-not-allowed disabled:hover:bg-gray-300"
                                disabled
                            >
                                Complete Donation
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const itemsGrid = document.getElementById('itemsGrid');
            const selectedItemsList = document.getElementById('selectedItemsList');
            const emptyState = document.getElementById('emptyState');
            const submitButton = document.getElementById('submitDonation');
            const totalItemsDisplay = document.getElementById('totalItems');
            const searchInput = document.getElementById('searchInput');
            const noResults = document.getElementById('noResults');
            
            let selectedItems = {};

            // Toast notification function
            function showToast(message, type = 'success') {
                const toastContainer = document.getElementById('toastContainer');
                const toast = document.createElement('div');
                
                let bgColor, icon;
                if (type === 'success') {
                    bgColor = 'bg-green-500';
                    icon = `<svg class="flex-shrink-0 w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>`;
                } else if (type === 'error') {
                    bgColor = 'bg-red-500';
                    icon = `<svg class="flex-shrink-0 w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>`;
                } else {
                    bgColor = 'bg-blue-500';
                    icon = `<svg class="flex-shrink-0 w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>`;
                }
                
                toast.className = `toast-enter ${bgColor} text-white px-4 py-3 rounded-lg shadow-lg flex items-start space-x-3 w-full`;
                toast.innerHTML = `
                    ${icon}
                    <span class="flex-1 text-sm font-medium">${message}</span>
                    <button onclick="this.parentElement.remove()" class="flex-shrink-0 ml-2 hover:opacity-75">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                `;
                
                toastContainer.appendChild(toast);
                
                setTimeout(() => {
                    toast.className = toast.className.replace('toast-enter', 'toast-exit');
                    setTimeout(() => toast.remove(), 300);
                }, 5000);
            }

            // Check for Laravel session messages
            const successMessage = document.getElementById('successMessage');
            const errorMessage = document.getElementById('errorMessage');
            
            if (successMessage) {
                showToast(successMessage.dataset.message, 'success');
                // Clear selected items after successful donation
                selectedItems = {};
                updateSelectedItemsList();
            }
            
            if (errorMessage) {
                showToast(errorMessage.dataset.message, 'error');
            }

            // Search functionality
            searchInput.addEventListener('input', (e) => {
                const searchTerm = e.target.value.toLowerCase();
                const items = itemsGrid.querySelectorAll('.item-card');
                let visibleCount = 0;

                items.forEach(item => {
                    const itemName = item.dataset.itemName.toLowerCase();
                    if (itemName.includes(searchTerm)) {
                        item.style.display = 'block';
                        visibleCount++;
                    } else {
                        item.style.display = 'none';
                    }
                });

                noResults.classList.toggle('hidden', visibleCount > 0);
                itemsGrid.classList.toggle('hidden', visibleCount === 0);
            });

            // Handle item selection
            itemsGrid.addEventListener('click', (e) => {
                const itemCard = e.target.closest('.item-card');
                if (!itemCard) return;

                const itemId = itemCard.dataset.itemId;
                const itemName = itemCard.dataset.itemName;
                const itemImage = itemCard.dataset.itemImage;

                if (!selectedItems[itemId]) {
                    selectedItems[itemId] = { name: itemName, image: itemImage, quantity: 1 };
                    updateSelectedItemsList();
                    showToast(`${itemName} added to donation`, 'success');
                } else {
                    showToast(`${itemName} is already in your donation`, 'info');
                }
            });

            // Update the selected items list
            function updateSelectedItemsList() {
                selectedItemsList.innerHTML = '';
                let totalItems = 0;

                const hasItems = Object.keys(selectedItems).length > 0;
                emptyState.classList.toggle('hidden', hasItems);
                selectedItemsList.classList.toggle('hidden', !hasItems);

                for (const [itemId, item] of Object.entries(selectedItems)) {
                    const itemDiv = document.createElement('div');
                    itemDiv.className = 'flex items-center p-3 space-x-3 transition-colors bg-gray-50 rounded-lg hover:bg-gray-100';
                    itemDiv.innerHTML = `
                        <img src="${item.image}" alt="${item.name}" class="object-cover w-16 h-16 rounded-md">
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm font-medium text-gray-900 truncate">${item.name}</h4>
                            <div class="flex items-center mt-2 space-x-2">
                                <button type="button" class="flex items-center justify-center w-8 h-8 text-gray-600 transition-colors bg-white border border-gray-300 rounded-md hover:bg-gray-50" onclick="changeQuantity(${itemId}, -1)">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                    </svg>
                                </button>
                                <input type="number" name="items[${itemId}][quantity]" value="${item.quantity}" min="1" class="w-16 px-2 py-1 text-sm text-center border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" onchange="updateQuantityFromInput(${itemId}, this.value)">
                                <input type="hidden" name="items[${itemId}][item_id]" value="${itemId}">
                                <button type="button" class="flex items-center justify-center w-8 h-8 text-gray-600 transition-colors bg-white border border-gray-300 rounded-md hover:bg-gray-50" onclick="changeQuantity(${itemId}, 1)">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <button type="button" class="p-2 text-red-600 transition-colors rounded-md hover:bg-red-50" onclick="removeItem(${itemId}, '${item.name}')">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    `;
                    selectedItemsList.appendChild(itemDiv);
                    totalItems += item.quantity;
                }

                totalItemsDisplay.textContent = totalItems;
                submitButton.disabled = totalItems === 0;
            }

            // Change quantity
            window.changeQuantity = (itemId, change) => {
                const item = selectedItems[itemId];
                const newQty = item.quantity + change;
                if (newQty >= 1) {
                    item.quantity = newQty;
                    updateSelectedItemsList();
                }
            };

            // Update quantity from input
            window.updateQuantityFromInput = (itemId, value) => {
                const qty = parseInt(value);
                if (qty >= 1) {
                    selectedItems[itemId].quantity = qty;
                    updateSelectedItemsList();
                } else {
                    updateSelectedItemsList();
                }
            };

            // Remove item
            window.removeItem = (itemId, itemName) => {
                delete selectedItems[itemId];
                updateSelectedItemsList();
                showToast(`${itemName} removed from donation`, 'info');
            };

            // Form submission
            document.getElementById('donationForm').addEventListener('submit', (e) => {
                if (Object.keys(selectedItems).length === 0) {
                    e.preventDefault();
                    showToast('Please select at least one item', 'error');
                }
            });
        });
    </script>
