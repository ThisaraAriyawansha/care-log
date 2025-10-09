<body class="bg-gray-50">
      @include('layouts.header')

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
                      <li>
                          <div class="flex items-center">
                              <svg class="w-3 h-3 mx-1 text-gray-400" fill="none" viewBox="0 0 6 10">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                              </svg>
                              <a href="{{ url('/reports/issues') }}" class="transition-colors hover:text-blue-600">Issue History</a>
                          </div>
                      </li>
                      <li aria-current="page">
                          <div class="flex items-center">
                              <svg class="w-3 h-3 mx-1 text-gray-400" fill="none" viewBox="0 0 6 10">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                              </svg>
                              <span class="font-medium text-gray-700">Issue Details</span>
                          </div>
                      </li>
                  </ol>
              </nav>

              <!-- Issue Details -->
              <div class="bg-white shadow sm:rounded-lg">
                  <div class="px-4 py-5 sm:p-6">
                      <h1 class="text-2xl font-semibold text-gray-900">Issue Details</h1>
                      <div class="grid grid-cols-1 mt-6 gap-y-6 sm:grid-cols-2 sm:gap-x-6">
                          <div>
                              <h3 class="text-sm font-medium text-gray-500">Issuer Name</h3>
                              <p class="mt-1 text-lg text-gray-900">{{ $issue->issuer->name ?? 'N/A' }}</p>
                          </div>
                          <div>
                              <h3 class="text-sm font-medium text-gray-500">Issue Date</h3>
                              <p class="mt-1 text-lg text-gray-900">{{ \Carbon\Carbon::parse($issue->issue_date)->format('d M Y') }}</p>
                          </div>
                          <div>
                              <h3 class="text-sm font-medium text-gray-500">Total Quantity</h3>
                              <p class="mt-1 text-lg text-gray-900">{{ $issue->total_quantity }}</p>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Issued Items Table -->
              <div class="mt-6">
                  <h2 class="text-xl font-semibold text-gray-900">Issued Items</h2>
                  <div class="mt-4 overflow-x-auto">
                      <table class="min-w-full bg-white border border-gray-200 rounded-md">
                          <thead class="bg-gray-100">
                              <tr>
                                  <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Item Name</th>
                                  <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Item Code</th>
                                  <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Quantity</th>
                                  <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Image</th>
                              </tr>
                          </thead>
                          <tbody class="divide-y divide-gray-200">
                              @forelse ($issue->items as $issueItem)
                                  <tr>
                                      <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">{{ $issueItem->item->item_name ?? 'N/A' }}</td>
                                      <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">{{ $issueItem->item->item_code ?? 'N/A' }}</td>
                                      <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">{{ $issueItem->quantity }}</td>
                                      <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                                          <img src="{{ $issueItem->item->image_url }}" alt="{{ $issueItem->item->item_name ?? 'Item Image' }}" class="object-cover w-16 h-16 rounded-md">
                                      </td>
                                  </tr>
                              @empty
                                  <tr>
                                      <td colspan="4" class="px-6 py-4 text-sm text-center text-gray-500">No items found for this issue.</td>
                                  </tr>
                              @endforelse
                          </tbody>
                      </table>
                  </div>
              </div>

              <!-- Back Button -->
              <div class="mt-6">
                  <a href="{{ url('/reports/issues') }}" class="inline-flex items-center px-4 py-2 text-white bg-gray-600 rounded-md hover:bg-gray-700">
                      <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                      </svg>
                      Back to Issues
                  </a>
              </div>
          </div>
      </div>

      @include('layouts.footer')
  </body>