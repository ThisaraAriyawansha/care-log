@include('layouts.header')

<!-- Main Content Area -->
<div class="min-h-screen bg-gray-50">
    <!-- Dashboard Header -->
    <div class="px-4 py-4 bg-white shadow-sm sm:px-6 lg:px-8">
        <div class="flex flex-col items-start justify-between gap-2 sm:flex-row sm:items-center">
            <div>
                <h1 class="text-xl font-medium text-gray-800 sm:text-2xl">Dashboard</h1>
                <p class="text-xs text-gray-500 sm:text-sm">Welcome back!</p>
            </div>
            <div class="text-left sm:text-right">
                <p class="text-xs text-gray-500">{{ now()->format('M j, Y') }}</p>
            </div>
        </div>
    </div>

    <!-- Key Metrics Grid -->
    <div class="grid grid-cols-2 gap-3 p-4 sm:gap-4 sm:p-6 lg:grid-cols-4">
        <!-- Total Donations -->
        <div class="p-4 bg-white rounded-lg shadow-sm hover:shadow">
            <div class="flex items-start justify-between">
                <div class="flex-1 min-w-0">
                    <p class="text-xs font-medium text-gray-500 truncate">Total Donations</p>
                    <h3 class="mt-1 text-lg font-semibold text-gray-800 sm:text-xl">{{ number_format($totalDonations) }}</h3>
                </div>
                <div class="p-2 rounded-lg bg-green-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-500 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Issues -->
        <div class="p-4 bg-white rounded-lg shadow-sm hover:shadow">
            <div class="flex items-start justify-between">
                <div class="flex-1 min-w-0">
                    <p class="text-xs font-medium text-gray-500 truncate">Total Issues</p>
                    <h3 class="mt-1 text-lg font-semibold text-gray-800 sm:text-xl">{{ number_format($totalIssues) }}</h3>
                </div>
                <div class="p-2 rounded-lg bg-blue-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-500 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Today's Donations -->
        <div class="p-4 bg-white rounded-lg shadow-sm hover:shadow">
            <div class="flex items-start justify-between">
                <div class="flex-1 min-w-0">
                    <p class="text-xs font-medium text-gray-500 truncate">Today's Donations</p>
                    <h3 class="mt-1 text-lg font-semibold text-gray-800 sm:text-xl">{{ number_format($todayDonations) }}</h3>
                </div>
                <div class="p-2 rounded-lg bg-amber-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-amber-500 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Today's Issues -->
        <div class="p-4 bg-white rounded-lg shadow-sm hover:shadow">
            <div class="flex items-start justify-between">
                <div class="flex-1 min-w-0">
                    <p class="text-xs font-medium text-gray-500 truncate">Today's Issues</p>
                    <h3 class="mt-1 text-lg font-semibold text-gray-800 sm:text-xl">{{ number_format($todayIssues) }}</h3>
                </div>
                <div class="p-2 rounded-lg bg-purple-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-purple-500 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts and Tables Section -->
    <div class="grid grid-cols-1 gap-4 p-4 sm:p-6 lg:grid-cols-2">
        <!-- Top Products Donated Chart -->
        <div class="p-4 bg-white rounded-lg shadow-sm sm:p-5">
            <h3 class="text-sm font-medium text-gray-800 sm:text-base">Top Products Donated</h3>
            <div id="top-products-chart" class="mt-3"></div>
        </div>

        <!-- Top 5 Donators Table -->
        <div class="p-4 bg-white rounded-lg shadow-sm sm:p-5">
            <h3 class="text-sm font-medium text-gray-800 sm:text-base">Top 5 Donators</h3>
            <div class="mt-3 -mx-4 overflow-x-auto sm:mx-0">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-800">
                        <tr>
                            <th scope="col" class="px-3 py-2 text-xs font-medium tracking-wider text-left text-white uppercase sm:px-4">
                                Rank
                            </th>
                            <th scope="col" class="px-3 py-2 text-xs font-medium tracking-wider text-left text-white uppercase sm:px-4">
                                Name
                            </th>
                            <th scope="col" class="px-3 py-2 text-xs font-medium tracking-wider text-left text-white uppercase sm:px-4">
                                Items
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($topDonators as $index => $donator)
                        <tr class="hover:bg-gray-50">
                            <td class="px-3 py-2 text-xs font-medium text-gray-900 sm:px-4 sm:text-sm whitespace-nowrap">
                                #{{ $index + 1 }}
                            </td>
                            <td class="px-3 py-2 text-xs text-gray-900 sm:px-4 sm:text-sm">
                                {{ $donator->donator->name ?? 'Unknown' }}
                            </td>
                            <td class="px-3 py-2 text-xs text-gray-900 sm:px-4 sm:text-sm whitespace-nowrap">
                                {{ number_format($donator->total_donated) }}
                            </td>
                        </tr>
                        @endforeach
                        @if($topDonators->isEmpty())
                        <tr>
                            <td colspan="3" class="px-3 py-3 text-xs text-center text-gray-500 sm:px-4 sm:text-sm">
                                No data available
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- System Overview and Stock Alerts -->
    <div class="grid grid-cols-1 gap-4 p-4 sm:p-6 lg:grid-cols-3">
        <!-- System Overview -->
        <div class="p-4 bg-white rounded-lg shadow-sm sm:p-5">
            <h3 class="text-sm font-medium text-gray-800 sm:text-base">System Overview</h3>
            <div class="grid grid-cols-2 gap-3 mt-4">
                <div class="p-3 text-center border border-gray-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-auto text-blue-500 sm:w-7 sm:h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <h4 class="mt-2 text-base font-semibold text-gray-700 sm:text-lg">{{ $donatorCount }}</h4>
                    <p class="text-xs text-gray-500">Donators</p>
                </div>
                <div class="p-3 text-center border border-gray-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-auto text-green-500 sm:w-7 sm:h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <h4 class="mt-2 text-base font-semibold text-gray-700 sm:text-lg">{{ $issuerCount }}</h4>
                    <p class="text-xs text-gray-500">Issuers</p>
                </div>
                <div class="p-3 text-center border border-gray-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-auto text-amber-500 sm:w-7 sm:h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <h4 class="mt-2 text-base font-semibold text-gray-700 sm:text-lg">{{ $itemCount }}</h4>
                    <p class="text-xs text-gray-500">Items</p>
                </div>
                <div class="p-3 text-center border border-gray-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-auto text-purple-500 sm:w-7 sm:h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h4 class="mt-2 text-base font-semibold text-gray-700 sm:text-lg">{{ $donationCount + $issueCount }}</h4>
                    <p class="text-xs text-gray-500">Records</p>
                </div>
            </div>
        </div>

        <!-- Stock Alerts -->
        <div class="p-4 bg-white rounded-lg shadow-sm lg:col-span-2 sm:p-5">
            <div class="flex items-center justify-between">
                <h3 class="text-sm font-medium text-gray-800 sm:text-base">Stock Alerts</h3>
                <span class="px-2 py-1 text-xs text-gray-600 bg-gray-100 rounded-full">
                    {{ $items->count() }} Items
                </span>
            </div>
            <div class="mt-3 -mx-4 overflow-x-auto sm:mx-0 max-h-72">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="sticky top-0 bg-gray-800">
                        <tr>
                            <th scope="col" class="px-3 py-2 text-xs font-medium tracking-wider text-left text-white uppercase sm:px-4">
                                Item
                            </th>
                            <th scope="col" class="px-3 py-2 text-xs font-medium tracking-wider text-left text-white uppercase sm:px-4">
                                Stock
                            </th>
                            <th scope="col" class="px-3 py-2 text-xs font-medium tracking-wider text-left text-white uppercase sm:px-4">
                                Min
                            </th>
                            <th scope="col" class="px-3 py-2 text-xs font-medium tracking-wider text-left text-white uppercase sm:px-4">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($items->where('quantity', '<', 'minimum_qty') as $item)
                        <tr class="{{ $item->quantity < $item->minimum_qty ? 'bg-red-50 hover:bg-red-100' : 'hover:bg-gray-50' }}">
                            <td class="px-3 py-2 text-xs font-medium text-gray-900 sm:px-4 sm:text-sm">
                                {{ $item->item_name }}
                            </td>
                            <td class="px-3 py-2 text-xs text-gray-900 sm:px-4 sm:text-sm whitespace-nowrap">
                                {{ $item->quantity }}
                            </td>
                            <td class="px-3 py-2 text-xs text-gray-900 sm:px-4 sm:text-sm whitespace-nowrap">
                                {{ $item->minimum_qty }}
                            </td>
                            <td class="px-3 py-2 text-xs text-gray-900 sm:px-4 sm:text-sm whitespace-nowrap">
                                {{ $item->status_id == 1 ? 'In Stock' : 'Out Of Stock' }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

<script>
    // Top Products Donated Chart
    const topDonatedItems = @json($topDonatedItems);
    
    const itemNames = topDonatedItems.map(item => item.item ? item.item.item_name : 'Unknown');
    const itemQuantities = topDonatedItems.map(item => item.total_donated);

    const chartOptions = {
        chart: {
            type: 'bar',
            height: window.innerWidth < 640 ? 250 : 300,
            toolbar: {
                show: false
            },
            fontFamily: 'Inter, sans-serif',
            foreColor: '#6B7280'
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                horizontal: false,
                columnWidth: '60%',
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: itemNames,
            labels: {
                style: {
                    fontSize: window.innerWidth < 640 ? '10px' : '12px'
                }
            },
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false
            }
        },
        yaxis: {
            title: {
                text: 'Quantity',
                style: {
                    fontSize: window.innerWidth < 640 ? '11px' : '12px'
                }
            },
            labels: {
                style: {
                    fontSize: window.innerWidth < 640 ? '10px' : '12px'
                }
            }
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + ' items'
                }
            }
        },
        colors: ['#3B82F6', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6'],
        series: [{
            name: 'Items Donated',
            data: itemQuantities
        }],
        grid: {
            borderColor: '#F3F4F6',
            strokeDashArray: 4,
            padding: {
                top: 0,
                right: 8,
                bottom: 0,
                left: 8
            }
        }
    };

    if (document.getElementById("top-products-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("top-products-chart"), chartOptions);
        chart.render();
    }
</script>