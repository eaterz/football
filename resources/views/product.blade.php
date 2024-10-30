<x-app-layout>
    <div class="grid grid-cols-2 gap-3 md:grid-cols-3 lg:grid-cols-4 lg:gap-4 p-6">
        @foreach($products as $product)
            <a href="{{ route('products.show', $product->id) }}">
                <div class=" relative rounded-lg bg-white @container z-[10] w-full p-2">
                    <!-- Product Image -->
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="h-full w-full rounded-xl object-cover object-center">

                    <!-- Product Name -->
                    <h3 class="m-0 line-clamp-3 min-h-[52.5px] p-0 px-2 text-sm font-bold leading-tight text-black @md:px-4">{{ $product->name }}</h3>
                    <span class="flex min-h-[16px] items-center gap-1 px-2 text-sm font-semibold text-black @md:min-h-[20px] @md:px-4 @md:text-sm">{{ $product->price }}€</span>
                </div>
            </a>
        @endforeach
    </div>
</x-app-layout>
