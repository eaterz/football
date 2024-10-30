

<nav class="bg-black p-4 top-0 w-full fixed z-[999]">


        <div class="grid grid-cols-3 items-center w-full gap-3">
            @auth

                    @if (Auth::user()->role == 'admin')


                        <a href="/dashboard" class="text-white text-lg font-bold" >FootyFrenzy</a>

                    @else
                    <div class="flex justify-center gap-10">
                        <x-link :href="route('products.show', 'Football boots')" :name="'Boots'"/>
                        <x-link :href="route('products.show', 'Football')" :name="'Balls'"/>
                        <x-link :href="route('products.show', 'Shin pads')" :name="'Shin pads'"/>
                        <x-link :href="route('products.show', 'Base layer')" :name="'Layer'"/>
                        <x-link :href="route('products.show', 'Football wear')" :name="'Wear'"/>
                    </div>



                    <div class="flex justify-center">
                        <a href="/" class="text-white text-xl font-bold">FootyFrenzy</a>
                    </div>
                    @endif
                <div class="flex justify-end">
                    <form action="{{ route('logout') }}" method="POST" >
                        @csrf
                        <button type="submit" class="text-white hover:text-gray-300">Logout</button>
                    </form>
                </div>
            @endauth
        </div>

</nav>
