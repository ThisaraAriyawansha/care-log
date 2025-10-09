@include('layouts.header')

<!-- Main Content Area -->
<div class="min-h-screen bg-gray-50">
    <!-- Dashboard Header -->
    <div class="px-8 py-6 bg-white shadow-sm">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-light text-gray-800">Dashboard</h1>
                <p class="text-gray-500">Welcome back! Here's what's happening today.</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-right">
                    <p class="text-sm text-gray-500">Current Date</p>
                    <p class="font-medium">{{ now()->format('F j, Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Key Metrics Grid -->
    <div class="grid grid-cols-1 gap-6 p-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        <!-- Total Donations -->
        <div class="p-6 transition-shadow duration-300 bg-white shadow-sm rounded-xl hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Donations</p>
                    <h3 class="mt-1 text-2xl font-semibold text-gray-800">{{ number_format($totalDonations) }}</h3>
                    <p class="mt-1 text-sm text-gray-500">Items donated</p>
                </div>
                <div class="p-3 rounded-lg bg-green-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <div class="h-1 bg-gray-200 rounded-full">
                    <div class="h-1 bg-green-500 rounded-full" style="width: 85%"></div>
                </div>
            </div>
        </div>

        <!-- Total Issues -->
        <div class="p-6 transition-shadow duration-300 bg-white shadow-sm rounded-xl hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Issues</p>
                    <h3 class="mt-1 text-2xl font-semibold text-gray-800">{{ number_format($totalIssues) }}</h3>
                    <p class="mt-1 text-sm text-gray-500">Items issued</p>
                </div>
                <div class="p-3 rounded-lg bg-blue-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <div class="h-1 bg-gray-200 rounded-full">
                    <div class="h-1 bg-blue-500 rounded-full" style="width: 65%"></div>
                </div>
            </div>
        </div>

        <!-- Today's Donations -->
        <div class="p-6 transition-shadow duration-300 bg-white shadow-sm rounded-xl hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Today's Donations</p>
                    <h3 class="mt-1 text-2xl font-semibold text-gray-800">{{ number_format($todayDonations) }}</h3>
                    <p class="mt-1 text-sm text-gray-500">Items donated today</p>
                </div>
                <div class="p-3 rounded-lg bg-amber-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <div class="h-1 bg-gray-200 rounded-full">
                    <div class="h-1 rounded-full bg-amber-500" style="width: 75%"></div>
                </div>
            </div>
        </div>

        <!-- Today's Issues -->
        <div class="p-6 transition-shadow duration-300 bg-white shadow-sm rounded-xl hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Today's Issues</p>
                    <h3 class="mt-1 text-2xl font-semibold text-gray-800">{{ number_format($todayIssues) }}</h3>
                    <p class="mt-1 text-sm text-gray-500">Items issued today</p>
                </div>
                <div class="p-3 rounded-lg bg-purple-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <div class="h-1 bg-gray-200 rounded-full">
                    <div class="h-1 bg-purple-500 rounded-full" style="width: 45%"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts and Tables Section -->
    <div class="grid grid-cols-1 gap-6 p-8 lg:grid-cols-2">
        <!-- Top Products Donated Chart -->
        <div class="p-6 bg-white shadow-sm rounded-xl">
            <h3 class="text-lg font-medium text-gray-800">Top Products Donated</h3>
            <div id="top-products-chart" class="mt-4"></div>
        </div>

        <!-- Top 5 Donators Table -->
        <div class="p-6 bg-white shadow-sm rounded-xl">
            <h3 class="text-lg font-medium text-gray-800">Top 5 Donators</h3>
            <div class="mt-4 overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-white uppercase">
                                Rank
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-white uppercase">
                                Donator Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-white uppercase">
                                Total Items Donated
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($topDonators as $index => $donator)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                #{{ $index + 1 }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                                {{ $donator->donator->name ?? 'Unknown Donator' }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                                {{ number_format($donator->total_donated) }}
                            </td>
                        </tr>
                        @endforeach
                        @if($topDonators->isEmpty())
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-sm text-center text-gray-500">
                                No donation data available
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- System Overview and Stock Alerts -->
    <div class="grid grid-cols-1 gap-6 p-8 lg:grid-cols-3">
        <!-- System Overview -->
        <div class="p-6 bg-white shadow-sm rounded-xl">
            <h3 class="text-lg font-medium text-gray-800">System Overview</h3>
            <div class="grid grid-cols-2 gap-4 mt-6">
                <div class="p-4 text-center border border-gray-100 rounded-lg">
                    <div class="flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h4 class="mt-2 text-xl font-semibold text-gray-700">{{ $donatorCount }}</h4>
                    <p class="text-sm text-gray-500">Donators</p>
                </div>
                <div class="p-4 text-center border border-gray-100 rounded-lg">
                    <div class="flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h4 class="mt-2 text-xl font-semibold text-gray-700">{{ $issuerCount }}</h4>
                    <p class="text-sm text-gray-500">Issuers</p>
                </div>
                <div class="p-4 text-center border border-gray-100 rounded-lg">
                    <div class="flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <h4 class="mt-2 text-xl font-semibold text-gray-700">{{ $itemCount }}</h4>
                    <p class="text-sm text-gray-500">Items</p>
                </div>
                <div class="p-4 text-center border border-gray-100 rounded-lg">
                    <div class="flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h4 class="mt-2 text-xl font-semibold text-gray-700">{{ $donationCount + $issueCount }}</h4>
                    <p class="text-sm text-gray-500">Total Records</p>
                </div>
            </div>
        </div>

            <!-- Stock Alerts -->
            <div class="p-6 bg-white shadow-sm rounded-xl lg:col-span-2">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-medium text-gray-800">Stock Alerts</h3>
                    <span class="px-3 py-1 text-sm text-gray-600 bg-gray-100 rounded-full">
                        {{ $items->count() }} Items
                    </span>
                </div>
                <div class="mt-4 overflow-x-auto overflow-y-auto max-h-96">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="sticky top-0 bg-gray-800">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-white uppercase">
                                    Item Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-white uppercase">
                                    Current Stock
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-white uppercase">
                                    Minimum Quantity
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-white uppercase">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($items->where('quantity', '<', 'minimum_qty') as $item)
                            <tr class="{{ $item->quantity < $item->minimum_qty ? 'bg-red-100 hover:bg-red-200' : 'bg-gray-50 hover:bg-gray-100' }}">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                    {{ $item->item_name }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                                    {{ $item->quantity }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                                    {{ $item->minimum_qty }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
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
    
    const itemNames = topDonatedItems.map(item => item.item ? item.item.item_name : 'Unknown Item');
    const itemQuantities = topDonatedItems.map(item => item.total_donated);

    const chartOptions = {
        chart: {
            type: 'bar',
            height: 350,
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
                columnWidth: '55%',
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
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false
            }
        },
        yaxis: {
            title: {
                text: 'Quantity Donated'
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
                right: 16,
                bottom: 0,
                left: 16
            }
        }
    };

    if (document.getElementById("top-products-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("top-products-chart"), chartOptions);
        chart.render();
    }

    // Monthly Donations Chart (if you want to add it back)
    const monthlyDonationsData = @json($monthlyDonations);
    
    const monthlyOptions = {
        chart: {
            type: 'area',
            height: 350,
            toolbar: {
                show: false
            }
        },
        // ... similar to your existing monthly chart options
        series: [{
            name: 'Donations',
            data: monthlyDonationsData
        }]
    };
</script>