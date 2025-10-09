<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Issued Goods</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in { animation: fadeIn 0.3s ease-out; }
    </style>
</head>
<body class="bg-gray-50">
    @include('layouts.header')

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
                            <a href="{{ asset('/issuers/issuers')}}" class="transition-colors hover:text-gray-900">Issuers</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="font-medium text-gray-700">My Issued Goods</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Page Header -->
            <div class="flex flex-col items-start justify-between space-y-4 sm:flex-row sm:items-center sm:space-y-0">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">My Issued Goods</h1>
                    <p class="mt-1 text-sm text-gray-500">View and manage your goods issue history</p>
                </div>
                <a href="{{ route('issue.getgoods') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Get New Goods
                </a>
            </div>
        </div>
    </div>

    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 gap-4 mb-6 sm:grid-cols-2 lg:grid-cols-4">
            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Issues</p>
                        <p class="mt-2 text-3xl font-bold text-gray-900">{{ $totalIssues }}</p>
                    </div>
                    <div class="p-3 bg-blue-100 rounded-full">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Items</p>
                        <p class="mt-2 text-3xl font-bold text-gray-900">{{ $totalQuantity }}</p>
                    </div>
                    <div class="p-3 bg-green-100 rounded-full">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">This Month</p>
                        <p class="mt-2 text-3xl font-bold text-gray-900">{{ $monthlyIssues }}</p>
                    </div>
                    <div class="p-3 bg-purple-100 rounded-full">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Last Issue</p>
                        <p class="mt-2 text-lg font-bold text-gray-900">{{ $lastIssueDate }}</p>
                    </div>
                    <div class="p-3 bg-yellow-100 rounded-full">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters and Search -->
        <div class="p-4 mb-6 bg-white rounded-lg shadow-sm sm:p-6">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                <!-- Search -->
                <div class="relative md:col-span-2">
                    <input 
                        type="text" 
                        id="searchInput" 
                        placeholder="Search by item name or code..." 
                        class="w-full px-4 py-2 pl-10 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    >
                    <svg class="absolute w-5 h-5 text-gray-400 left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>

                <!-- Date Filter -->
                <div>
                    <select id="dateFilter" class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="all">All Time</option>
                        <option value="today">Today</option>
                        <option value="week">This Week</option>
                        <option value="month">This Month</option>
                        <option value="year">This Year</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Issues List -->
        <div class="space-y-4">
            @forelse($issues as $issue)
            <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm fade-in" data-issue-date="{{ $issue->issue_date }}">
                <!-- Issue Header -->
                <div class="p-4 border-b border-gray-200 bg-gray-50 sm:p-6">
                    <div class="flex flex-col items-start justify-between space-y-3 sm:flex-row sm:items-center sm:space-y-0">
                        <div>
                            <div class="flex items-center space-x-3">
                                <h3 class="text-lg font-semibold text-gray-900">Issue #{{ $issue->id }}</h3>
                                <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Completed</span>
                            </div>
                            <p class="mt-1 text-sm text-gray-500">
                                <span class="inline-flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    {{ $issue->issue_date }}
                                </span>
                            </p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="text-right">
                                <p class="text-sm text-gray-600">Total Quantity</p>
                                <p class="text-2xl font-bold text-blue-600">{{ $issue->total_quantity }}</p>
                            </div>
                            <button 
                                onclick="toggleDetails({{ $issue->id }})" 
                                class="p-2 text-gray-600 transition-colors rounded-lg hover:bg-gray-100"
                                id="toggleBtn{{ $issue->id }}"
                            >
                                <svg class="w-6 h-6 transition-transform" id="chevron{{ $issue->id }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Issue Details (Collapsible) -->
                <div id="details{{ $issue->id }}" class="hidden p-4 sm:p-6">
                    <h4 class="mb-4 text-sm font-semibold text-gray-700 uppercase">Issued Items</h4>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach($issue->items as $issueItem)
                        <div class="flex items-center p-4 space-x-4 transition-all border border-gray-200 rounded-lg hover:shadow-md hover:border-blue-300">
                            <img 
                                src="{{ $issueItem->item->image_url }}" 
                                alt="{{ $issueItem->item->item_name }}" 
                                class="object-cover w-20 h-20 rounded-lg"
                            >
                            <div class="flex-1 min-w-0">
                                <h5 class="text-sm font-semibold text-gray-900 truncate">{{ $issueItem->item->item_name }}</h5>
                                <p class="text-xs text-gray-500">Code: {{ $issueItem->item->item_code }}</p>
                                <div class="flex items-center mt-2">
                                    <span class="px-2 py-1 text-xs font-semibold text-blue-800 bg-blue-100 rounded-full">
                                        Qty: {{ $issueItem->quantity }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Issue Summary -->
                    <div class="p-4 mt-6 border-t border-gray-200 rounded-lg bg-gray-50">
                        <div class="grid grid-cols-2 gap-4 sm:grid-cols-3">
                            <div>
                                <p class="text-xs text-gray-600">Item Types</p>
                                <p class="mt-1 text-lg font-semibold text-gray-900">{{ $issue->items->count() }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-600">Total Quantity</p>
                                <p class="mt-1 text-lg font-semibold text-gray-900">{{ $issue->total_quantity }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-600">Issue Date</p>
                                <p class="mt-1 text-lg font-semibold text-gray-900">{{ $issue->issue_date }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="py-16 text-center bg-white border border-gray-200 rounded-lg">
                <svg class="w-24 h-24 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <h3 class="mb-2 text-lg font-semibold text-gray-900">No issued goods found</h3>
                <p class="mb-6 text-sm text-gray-500">You haven't issued any goods yet. Start by getting new goods.</p>
                <a href="{{ route('issue.getgoods') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Get New Goods
                </a>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($issues->hasPages())
        <div class="mt-6">
            {{ $issues->links() }}
        </div>
        @endif
    </div>

    @include('layouts.footer')

    <script>
        // Toggle issue details
        function toggleDetails(issueId) {
            const details = document.getElementById(`details${issueId}`);
            const chevron = document.getElementById(`chevron${issueId}`);
            
            details.classList.toggle('hidden');
            chevron.classList.toggle('rotate-180');
        }

        // Search functionality
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', filterIssues);

        // Date filter
        const dateFilter = document.getElementById('dateFilter');
        dateFilter.addEventListener('change', filterIssues);

        function filterIssues() {
            const searchTerm = searchInput.value.toLowerCase();
            const dateValue = dateFilter.value;
            const issues = document.querySelectorAll('[data-issue-date]');
            
            const today = new Date();
            today.setHours(0, 0, 0, 0);

            issues.forEach(issue => {
                const issueDate = new Date(issue.dataset.issueDate);
                const textContent = issue.textContent.toLowerCase();
                
                // Search filter
                const matchesSearch = textContent.includes(searchTerm);
                
                // Date filter
                let matchesDate = true;
                if (dateValue === 'today') {
                    matchesDate = issueDate.toDateString() === today.toDateString();
                } else if (dateValue === 'week') {
                    const weekAgo = new Date(today);
                    weekAgo.setDate(weekAgo.getDate() - 7);
                    matchesDate = issueDate >= weekAgo;
                } else if (dateValue === 'month') {
                    matchesDate = issueDate.getMonth() === today.getMonth() && 
                                 issueDate.getFullYear() === today.getFullYear();
                } else if (dateValue === 'year') {
                    matchesDate = issueDate.getFullYear() === today.getFullYear();
                }
                
                issue.style.display = (matchesSearch && matchesDate) ? 'block' : 'none';
            });
        }

        // Auto-expand first issue on page load
        document.addEventListener('DOMContentLoaded', () => {
            const firstIssue = document.querySelector('[data-issue-date]');
            if (firstIssue) {
                const firstIssueId = firstIssue.querySelector('[id^="details"]').id.replace('details', '');
                // Uncomment below to auto-expand first issue
                // toggleDetails(firstIssueId);
            }
        });
    </script>
</body>
</html>