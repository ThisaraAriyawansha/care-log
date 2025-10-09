 @include('layouts.header')
<div class="h-[95vh] max-lg:h-[95vh] flex flex-col grow">
    <!-- Breadcrumbs -->
    <div class="px-12 py-5 max-sm:px-6">
        <nav aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <p class="inline-flex items-center text-sm font-medium text-gray-700">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Main Panel
                    </p>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <p class="text-sm font-medium text-gray-700 ms-1 md:ms-2">Stock List</p>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Search Controls -->
    <div class="flex items-center justify-between w-full gap-3 px-6 py-3 max-sm:px-6 max-md:flex-col">
        <!-- Search -->
        <div class="flex items-center w-1/2 gap-3 max-md:w-full">
            <label for="search_cat" class="text-sm">Search</label>
            <input type="text" id="search_cat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-3 px-2.5" placeholder="Enter Item name" required />
            <button onclick="searchItems('search_cat', 'stockTable', 2);" class="py-3 px-5 bg-[#1C1C1E] text-white rounded-lg text-sm">Search</button>
        </div>
        <!-- Entries -->
        <span class="flex items-center gap-3 w-fit max-md:w-full">
            Show
            <input type="number" id="col_num" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-3 px-2.5" placeholder="30" min="1" oninput="showEntries()" required />
            Entries
        </span>
    </div>

    <!-- Table -->
    <div class="flex flex-col flex-grow px-12 py-5 overflow-y-auto bg-white max-sm:px-6 max-lg:min-h-full">
        <div class="relative overflow-x-auto">
            <table id="stockTable" class="w-full text-sm text-left text-gray-500 border-collapse rtl:text-right">
                <thead class="text-xs text-white uppercase bg-[#1C1C1E]">
                    <tr>
                        <th scope="col" class="px-4 py-2 rounded-tl-lg">#</th>
                        <th scope="col" class="px-4 py-2">Item Code</th>
                        <th scope="col" class="px-4 py-2">Item Name</th>
                        <th scope="col" class="px-4 py-2">Quantity</th>
                        <th scope="col" class="px-4 py-2 rounded-tr-lg">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $key => $item)
                        <tr class="text-black bg-white border-b">
                            <td scope="row" class="px-4 py-2 font-medium whitespace-nowrap">{{ $key + 1 }}</td>
                            <td class="px-4 py-2">{{ $item->item_code }}</td>
                            <td class="px-4 py-2">{{ $item->item_name }}</td>
                            <td class="px-4 py-2">{{ $item->quantity }}</td>
                            <td class="px-4 py-2">
                                @if (has_permission(57))
                                    <button class="p-2 border rounded-md" onclick="editItem({{ $item->id }})">Add Stock</button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-2 text-center">No items found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @include('layouts.footer')
</div>

<script>
    // Search functionality
    document.getElementById('search_cat').addEventListener('input', function() {
        const filter = this.value.toLowerCase();
        const rows = document.querySelectorAll('#stockTable tbody tr');

        rows.forEach(row => {
            const itemName = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
            row.style.display = itemName.includes(filter) ? '' : 'none';
        });
    });

    // Show specific number of entries
    function showEntries() {
        const rows = document.querySelectorAll('#stockTable tbody tr');
        let entries = document.getElementById('col_num').value;

        if (!entries || entries <= 0) {
            entries = 30;
        }

        rows.forEach((row, index) => {
            row.style.display = index < entries ? '' : 'none';
        });
    }

    // Redirect to edit item page
    function editItem(itemId) {
        window.location.href = `/stock/updateStock/${itemId}`;
    }

    // Search items function (assuming it's defined in common.js or elsewhere)
    function searchItems(searchId, tableId, columnIndex) {
        // Implementation might be in common.js
        const searchValue = document.getElementById(searchId).value.toLowerCase();
        const table = document.getElementById(tableId);
        const rows = table.getElementsByTagName('tr');

        for (let i = 1; i < rows.length; i++) {
            const cell = rows[i].getElementsByTagName('td')[columnIndex];
            if (cell) {
                const textValue = cell.textContent.toLowerCase();
                rows[i].style.display = textValue.includes(searchValue) ? '' : 'none';
            }
        }
    }
</script>
