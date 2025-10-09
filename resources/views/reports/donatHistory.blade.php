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
                            <a href="{{ url('/reports/reports') }}" class="transition-colors hover:text-blue-600">Report</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="font-medium text-gray-700">Donations History</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Search Form -->
            <div class="container px-4 py-6 mx-auto">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <h1 class="text-2xl font-semibold text-gray-900">Donations History</h1>
                    <form method="GET" action="/reports/donations" class="flex flex-col items-center w-full gap-2 sm:flex-row sm:w-auto">
                        <input 
                            type="text" 
                            name="search" 
                            placeholder="Search by donator name" 
                            class="w-full px-4 py-2 transition duration-200 border border-gray-300 rounded-md sm:w-64 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            value="{{ $search ?? '' }}"
                        >
                        <button 
                            type="submit" 
                            class="w-full px-4 py-2 text-white transition duration-200 bg-blue-600 rounded-md sm:w-auto hover:bg-blue-700"
                        >
                            Search
                        </button>
                    </form>
                </div>
            </div>

            <!-- Donations Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-md">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Donator Name</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Total Quantity</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Donation Date</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($donations as $donation)
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">{{ $donation->donator->name ?? 'N/A' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">{{ $donation->total_quantity }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">{{ \Carbon\Carbon::parse($donation->donation_date)->format('d M Y') }}</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap">
                                    <a href="{{ url('/reports/donations/' . $donation->id) }}" class="text-blue-600 hover:text-blue-800">View Details</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-sm text-center text-gray-500">No donations found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            <div class="mt-4">
                {{ $donations->appends(['search' => $search])->links('pagination::tailwind') }}
            </div>
        </div>
    </div>

    @include('layouts.footer')
</body>