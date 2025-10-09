@include('layouts.header')
    <div class="flex flex-col h-5/6">
        <!--breadcrumbs-->
        <div class="px-12 py-5 max-sm:px-6">
            <nav class="flex items-center justify-between" aria-label="Breadcrumb">
                <!-- Breadcrumb Navigation -->
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                    <a href="{{ url('/dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Main Panel
                    </a>
                    </li>
                    <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ url('/item/item') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Items</a>
                    </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <p class="text-sm font-medium text-gray-700 ms-1 md:ms-2">Category List</p>
                        </div>
                    </li>
                </ol>

                
            </nav>
        </div>

        <!--search-->
        
        <div class="flex items-center w-1/2 gap-3 px-12 py-5 max-sm:px-6 max-md:w-full">
            <label for="search_item">Search</label>
            <input type="text" id="searchCatName" 
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Enter Category name" required />
            <button onclick="searchItems();" class="py-2 px-4 bg-[#1C1C1E] text-white rounded-lg text-sm">Search</button>
            <span class="flex items-center gap-3 w-fit max-md:w-full">
                <input type="number" id="col_num"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="30" min="1" oninput="showEntries()" required />
                Entries
            </span>
        </div>


        <!--table--><div><center>@include('_message')</center></div>
        <div class="flex flex-col px-12 py-5 overflow-y-auto bg-white max-sm:px-6">
            <span></span>
            <!--table from flowbite-->
            <div class="relative overflow-x-auto">
            <table id="catTable" class="w-full text-sm text-left text-gray-500 rtl:text-right">
                    <thead class="text-xs text-white uppercase bg-[#1C1C1E]">
                        <tr>
                            <th scope="col" class="px-4 py-2 rounded-tl-lg">
                                #
                            </th>
                            <th scope="col" class="px-4 py-2">
                                Category
                            </th>
                            <th scope="col" class="px-4 py-2">
                                Description
                            </th>
                            <th scope="col" class="px-4 py-2 rounded-tr-lg">
                                Manage
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($item_categories as $value)
                        <tr class="text-black bg-white border-2">
                            <td scope="row" class="px-4 py-2 font-medium whitespace-nowrap">
                                {{ $value->id }}
                            </td>
                            <td class="px-4 py-2 catName">
                                {{ $value->categories }}
                            </td>
                            <td class="px-4 py-2">
                                {{ $value->description }}
                            </td>
                            <td class="px-4 py-2">
                                @if (has_permission(53))
                                <a href="{{ url('item/edit_category/'.$value->id) }}">
                                    <button class="px-2 py-1 border-2 rounded-lg">Edit</button>
                                </a>
                                @endif

                                @if (has_permission(54))
                                <a href="{{ url('item/delete/'.$value->id) }}">
                                    <button class="hidden px-2 py-1 text-white bg-red-600 border-2 rounded-lg">Delete</button>
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</body>
@include('layouts.footer')

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script>
    function searchItems() {
        const searchValue = document.getElementById('searchCatName').value.toLowerCase();
        const rows = document.querySelectorAll('#catTable tbody tr');

        rows.forEach(row => {
            const itemName = row.querySelector('.catName').textContent.toLowerCase();

            // Show row if the item name includes the search text; otherwise, hide it
            if (itemName.includes(searchValue)) {
                row.style.display = ''; // Show row
            } else {
                row.style.display = 'none'; // Hide row
            }
        });
    }
    function showEntries() {
            const rows = document.querySelectorAll('#catTable tbody tr'); // Target the suppliersTable
            let entries = document.getElementById('col_num').value;

            // Set default value of 30 if input is empty or invalid
            if (!entries || entries <= 0) {
                entries = 30;
            }

            rows.forEach((row, index) => {
                if (index < entries) {
                    row.style.display = ''; // Show row
                } else {
                    row.style.display = 'none'; // Hide row
                }
            });
        }
    
</script>

