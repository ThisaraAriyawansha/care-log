@include('layouts.header')

<div class="min-h-screen bg-gray-50">

    <!-- Dashboard Header -->
    <div class="px-4 py-4 bg-white shadow-sm sm:px-6 sm:py-6">
        <div class="flex flex-col space-y-4 sm:flex-row sm:items-center sm:justify-between sm:space-y-0">
            <div>
                <h1 class="text-2xl font-light text-gray-800 sm:text-3xl">Reports</h1>
                <p class="text-sm text-gray-500 sm:text-base">Access item issuing and donation history reports</p>
            </div>

            <div class="text-left sm:text-right">
                <p class="text-xs text-gray-500 sm:text-sm">Today’s Date</p>
                <p class="text-sm font-medium sm:text-base">{{ now()->format('F j, Y') }}</p>
            </div>
        </div>
    </div>

    <!-- Breadcrumbs -->
    <div class="px-8 py-4">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ url('/dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="text-sm font-medium text-gray-500 ms-1 md:ms-2">Issuers Reports</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="mt-2"><center>@include('_message')</center></div>
    </div>

    <!-- Reports Action Cards -->
    <div class="grid grid-cols-1 gap-6 p-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

        <!-- Good Donation History -->
        @if (has_permission(92))
        <a href="{{ url('reports/donations') }}" class="group">
            <div class="flex flex-col items-center justify-center h-full p-6 transition-all duration-300 transform bg-[#1C1C1E] shadow-sm rounded-xl hover:shadow-lg hover:-translate-y-1">
                <div class="flex items-center justify-center w-20 h-20 mb-4 rounded-full bg-gradient-to-br from-blue-500 to-indigo-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7l9-4 9 4m-9 4v9m-4-4h8m-8 0H7a2 2 0 01-2-2V7m12 9h2a2 2 0 002-2V7" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-center text-white transition-colors group-hover:text-blue-300">
                    Goods Donation History
                </h3>
                <p class="mt-1 text-xs text-center text-gray-400">View all past donation records</p>
            </div>
        </a>
        @endif

        <!-- Good Issuing History -->
        @if (has_permission(93))
        <a href="{{ url('reports/issues') }}" class="group">
            <div class="flex flex-col items-center justify-center h-full p-6 transition-all duration-300 transform bg-[#1C1C1E] shadow-sm rounded-xl hover:shadow-lg hover:-translate-y-1">
                <div class="flex items-center justify-center w-20 h-20 mb-4 rounded-full bg-gradient-to-br from-orange-500 to-yellow-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-center text-white transition-colors group-hover:text-yellow-300">
                    Goods Issuing History
                </h3>
                <p class="mt-1 text-xs text-center text-gray-400">View all past goods issued</p>
            </div>
        </a>
        @endif

    </div>
</div>

@include('layouts.footer')
