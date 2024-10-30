<x-app-layout>
    <div class="w-full min-h-screen bg-gray-50 flex flex-col items-center pt-6 sm:pt-0">
        <!-- Scrollable form container -->
        <div class="mt-30 m-20 pb-2 bg-white rounded-lg shadow-lg p-6 w-full sm:max-w-md mx-auto overflow-auto">
            <h2 class="mb-12 text-black text-center text-5xl font-extrabold">Edit Product</h2>

            <!-- Product edit form -->
            <form method="POST" action="{{ route('products.update', $product->id) }}">

            @csrf
                @method('PATCH')

                <!-- Product Name Input -->
                <div class="mb-4">
                    <label for="name" class="text-black block mb-1">Product Name</label>
                    <input type="text" id="name" name="name" placeholder="Product Name"
                           value="{{ old('name', $product->name) }}"
                    class="text-black py-2 px-3 border border-gray-300 focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" />

                    <!-- Error message for name -->
                    @error('name')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Product Price Input -->
                <div class="mb-4">
                    <label for="price" class="text-black block mb-1">Price</label>
                    <input type="number" id="price" name="price" placeholder="Price"
                           value="{{ old('price', $product->price) }}"
                    class="text-black py-2 px-3 border border-gray-300 focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" />

                    <!-- Error message for price -->
                    @error('price')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category Selector -->
                <div class="mb-4">
                    <label for="category" class="text-black block mb-1">Category</label>
                    <select id="category" name="category"
                            class="text-black py-2 px-3 border border-gray-300 focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full">
                        <option value="" disabled>Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    <!-- Error message for category -->
                    @error('category')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Product Description Input -->
                <div class="mb-4">
                    <label for="description" class="text-black block mb-1">Description</label>
                    <textarea id="description" name="description" placeholder="Product Description"
                              class="text-black py-2 resize-none px-3 border border-gray-300 focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" rows="4">{{ old('description', $product->description) }}</textarea> <!-- Pre-fill with existing description -->

                    <!-- Error message for description -->
                    @error('description')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Product Image URL Input -->
                <div class="mb-4">
                    <label for="image" class="text-black block mb-1">Image URL</label>
                    <input type="text" id="image" name="image" placeholder="https://example.com/image.jpg"
                           value="{{ old('image', $product->image) }}"
                    class="text-black py-2 px-3 border border-gray-300 focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" />

                    <!-- Error message for image_url -->
                    @error('image')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit"
                            class="w-full inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold capitalize text-white hover:bg-blue-700 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 disabled:opacity-25 transition">
                        Update Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
