<x-app-layout>
    <h2 class="mb-12 text-black text-center text-5xl font-extrabold">Products</h2>
    <a href="{{ route('products.create') }}">
        <button class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            Create
        </button>
    </a>

    <div class="grid grid-cols-2 gap-3 md:grid-cols-3 lg:grid-cols-4 lg:gap-4 p-6">
        @foreach($products as $product)
            <div class="relative rounded-lg bg-white @container z-[10] w-full p-2">
                <!-- Product Image -->
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class=" w-full rounded-xl object-cover object-center mb-2">

                <!-- Product Name -->
                <h3 class="m-0 line-clamp-3 min-h-[52.5px] p-0 px-2 text-sm font-bold leading-tight text-black @md:px-4">{{ $product->name }}</h3>

                <!-- Product Price -->
                <span class="flex min-h-[16px] items-center gap-1 px-2 text-sm font-semibold text-black @md:min-h-[20px] @md:px-4 @md:text-sm">{{ $product->price }}€</span>

                <!-- Edit and Delete Buttons -->
                <div class="mt-3 flex justify-between">
                    <!-- Edit Button -->
                    <a href="{{ route('products.edit', $product->id) }}" class="text-white bg-blue-500 hover:bg-blue-700 font-medium rounded-lg text-sm px-4 py-2">
                        Edit
                    </a>

                    <!-- Delete Button (Form) -->
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-red-500 hover:bg-red-700 font-medium rounded-lg text-sm px-4 py-2">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
