<x-app-layout>
<div class="w-full min-h-screen bg-gray-50 flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div class="w-full sm:max-w-md p-5 mx-auto">
        <h2 class="mb-12 text-black text-center text-5xl font-extrabold">Welcome.</h2>
        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <div class="mb-4">
                <label class="text-black block mb-1" for="email">Email-Address</label>
                <input type="text" id="email" name="email" placeholder="Email" autocomplete="off" class=" text-black py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" />
            </div>
            @error('email')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
            <div class="mb-4">
                <label class="text-black block mb-1" for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" class=" text-black py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" />
            </div>
            @error('password')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
            <div class="mt-6 flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" class="border border-gray-300 text-red-600 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50" />
                    <label for="remember_me" class="ml-2 block text-sm leading-5 text-gray-900"> Remember me </label>
                </div>

            </div>
            <div class="mt-6">
                <button class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold capitalize text-white hover:bg-red-700 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 disabled:opacity-25 transition">Sign In</button>
            </div>
            <div class="mt-6 text-center">
                <a href="/register" class="text-black underline">Sign up for an account</a>
            </div>
        </form>
    </div>
</div>
</x-app-layout>
