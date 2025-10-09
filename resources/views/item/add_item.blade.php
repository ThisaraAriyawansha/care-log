@include('layouts.header')
<div class="flex flex-col min-h-screen">
    <!-- Breadcrumbs -->
    <div class="px-4 py-5 sm:px-6 lg:px-8">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
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
                        <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Add Items</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Toast Notification -->
    <div id="toast-success" class="fixed z-50 hidden w-full max-w-xs p-4 text-green-800 bg-green-100 rounded-lg shadow-lg top-5 right-5" role="alert">
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            <span id="toast-message" class="text-sm font-medium">Item successfully added!</span>
        </div>
    </div>

    <!-- Form Section -->
    <div class="flex-grow p-4 sm:p-6 lg:p-8">
        <div class="w-full max-w-4xl p-6 mx-auto bg-white border border-gray-200 rounded-lg shadow">
            <form id="addItemForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-6 mb-6 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Item Name -->
                    <div>
                        <label for="item_name" class="block mb-2 text-sm font-medium text-gray-900">Item Name</label>
                        <input type="text" id="item_name" name="item_name"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                               placeholder="Enter item name" />
                        <p id="item_name_error" class="mt-1 text-sm text-red-500"></p>
                    </div>

                    <!-- Quantity -->
                    <div>
                        <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900">Quantity</label>
                        <input type="number" id="quantity" name="quantity"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                               placeholder="Enter quantity" />
                        <p id="quantity_error" class="mt-1 text-sm text-red-500"></p>
                    </div>

                    <!-- Minimum Quantity -->
                    <div>
                        <label for="minimum_qty" class="block mb-2 text-sm font-medium text-gray-900">Minimum Quantity</label>
                        <input type="number" id="minimum_qty" name="minimum_qty"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                               placeholder="Enter minimum quantity" />
                        <p id="minimum_qty_error" class="mt-1 text-sm text-red-500"></p>
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                        <select id="category_id" name="category_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="-1" selected>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->categories }}</option>
                            @endforeach
                        </select>
                        <p id="category_error" class="mt-1 text-sm text-red-500"></p>
                    </div>
                </div>

                <!-- Image Upload -->
                <div class="flex flex-col items-center justify-center w-full mb-6">
                    <label for="imageInput" class="block mb-2 text-sm font-medium text-gray-900">Add Image</label>
                    <input type="file" id="imageInput" name="image_path"
                           class="w-full max-w-md mb-2 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <div id="imageName" class="mb-2 text-sm text-gray-500"></div>
                    <div id="imagePreview" class="hidden mt-2 overflow-hidden border border-gray-300 rounded-lg" style="width: 200px; height: 200px;">
                        <img id="previewImage" src="" alt="Image Preview" class="object-cover w-full h-full">
                    </div>
                    <p id="image_path_error" class="mt-1 text-sm text-red-500">{{ $errors->first('image_path') }}</p>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-center gap-4">
                    <button type="submit" id="saveButton"
                            class="px-6 py-2.5 text-white bg-gray-900 rounded-lg hover:bg-blue-900 focus:ring-4 focus:ring-blue-300 disabled:bg-gray-400">
                        Save
                    </button>
                    <button type="reset" class="px-6 py-2.5 text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:ring-gray-300">
                        Reset
                    </button>
                </div>
            </form>
        </div>
    </div>

    @include('layouts.footer')
</div>

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="../../../scripts/common.js"></script>
<script>
    document.getElementById('addItemForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);
        const saveButton = document.getElementById('saveButton');
        const toast = document.getElementById('toast-success');
        const toastMessage = document.getElementById('toast-message');
        const textFields = document.querySelectorAll('input[type="text"], input[type="number"], textarea');

        // Disable Save button and indicate saving
        saveButton.disabled = true;
        saveButton.textContent = 'Saving...';

        fetch('{{ route('add_itam') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                if (response.status === 422) {
                    return response.json().then(data => { throw data; });
                }
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Success:', data);
            // Reset form fields
            textFields.forEach(field => field.value = '');
            document.getElementById('imagePreview').classList.add('hidden');
            document.getElementById('imageName').textContent = '';

            // Show toast notification
            toastMessage.textContent = 'Item successfully added!';
            toast.classList.remove('hidden');
            console.log('Toast shown for success');
            setTimeout(() => {
                toast.classList.add('hidden');
                console.log('Toast hidden after 5 seconds');
            }, 5000);

            // Reset Save button
            saveButton.disabled = false;
            saveButton.textContent = 'Save';
        })
        .catch(error => {
            console.error('Error:', error);
            saveButton.disabled = false;
            saveButton.textContent = 'Save';

            if (error.errors) {
                const errorFields = {
                    item_name: 'item_name_error',
                    quantity: 'quantity_error',
                    minimum_qty: 'minimum_qty_error',
                    image_path: 'image_path_error',
                    category_id: 'category_error'
                };

                Object.keys(errorFields).forEach(field => {
                    const errorElement = document.getElementById(errorFields[field]);
                    errorElement.textContent = error.errors[field] ? error.errors[field][0] : '';
                });
            } else {
                toastMessage.textContent = 'An error occurred. Please try again.';
                toast.classList.remove('hidden');
                toast.classList.replace('text-green-800', 'text-red-800');
                toast.classList.replace('bg-green-100', 'bg-red-100');
                console.log('Toast shown for error');
                setTimeout(() => {
                    toast.classList.add('hidden');
                    toast.classList.replace('text-red-800', 'text-green-800');
                    toast.classList.replace('bg-red-100', 'bg-green-100');
                    console.log('Toast hidden after 5 seconds');
                }, 5000);
            }
        });
    });

    // Image preview functionality
    const fileInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');
    const previewImage = document.getElementById('previewImage');
    const imageName = document.getElementById('imageName');

    fileInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            imageName.textContent = file.name;
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                imagePreview.classList.remove('hidden');
                console.log('Image preview shown');
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.classList.add('hidden');
            imageName.textContent = '';
            console.log('Image preview hidden');
        }
    });
</script>