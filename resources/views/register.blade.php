<x-app-layout>
    <div class="w-full min-h-screen bg-gray-50 flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="w-full sm:max-w-md p-5 mx-auto">
            <h2 class="text-black mb-12 text-center text-5xl font-extrabold">Register</h2>

            <form id="registrationForm" method="POST" action="{{ url('/register') }}">
                @csrf

                <!-- Name Field -->
                <div class="mb-4">
                    <label class="text-black block mb-1" for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Name" value="{{ old('name') }}"
                           class="text-black py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" />

                    <!-- Error Message for Name -->
                    @error('name')
                    <p class="text-sm text-red-500 mt-1" id="nameError">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="mb-4">
                    <label class="text-black block mb-1" for="email">Email Address</label>
                    <input type="text" id="email" name="email" placeholder="Email" value="{{ old('email') }}"
                           autocomplete="off" class="text-black py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" />

                    <!-- Error Message for Email -->
                    @error('email')
                    <p class="text-sm text-red-500 mt-1" id="emailError">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-4">
                    <label class="text-black block mb-1" for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password"
                           class="text-black py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" />

                    <!-- Error Message for Password -->
                    @error('password')
                    <p class="text-sm text-red-500 mt-1" id="passwordError">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-4">
                    <label class="text-black block mb-1" for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password"
                           class="text-black py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" />

                    <!-- Error Message for Confirm Password -->
                    @error('password_confirmation')
                    <p class="text-sm text-red-500 mt-1" id="passwordConfirmError">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold capitalize text-white hover:bg-red-700 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 disabled:opacity-25 transition">
                        Sign In
                    </button>
                </div>

                <!-- Redirect to Login -->
                <div class="mt-6 text-center">
                    <a href="{{ url('/') }}" class="text-black underline">Already have an account?</a>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript Validation Script -->
    <script>
        // Validate Email
        function validateEmail(email) {
            const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            return re.test(email);
        }

        // Name validation function
        function validateName(name) {
            return /^[a-zA-Z\s]{3,}$/.test(name);
        }

        // Password validation function
        function validatePassword(password) {
            const re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            return re.test(password);
        }

        // Name validation
        document.getElementById('name').addEventListener('input', function () {
            const name = this.value;
            const nameError = document.getElementById('nameError');
            if (!validateName(name)) {
                nameError.textContent = 'Name must be at least 3 characters long and only contain letters and spaces.';
                nameError.classList.remove('hidden');
            } else {
                nameError.classList.add('hidden');
            }
        });

        // Email validation
        document.getElementById('email').addEventListener('input', function () {
            const email = this.value;
            const emailError = document.getElementById('emailError');
            if (!validateEmail(email)) {
                emailError.textContent = 'Please enter a valid email address.';
                emailError.classList.remove('hidden');
            } else {
                emailError.classList.add('hidden');
            }
        });

        // Password validation
        document.getElementById('password').addEventListener('input', function () {
            const password = this.value;
            const passwordError = document.getElementById('passwordError');
            if (!validatePassword(password)) {
                passwordError.textContent = 'Password must meet the required criteria.';
                passwordError.classList.remove('hidden');
            } else {
                passwordError.classList.add('hidden');
            }
        });

        // Password confirmation validation
        document.getElementById('password_confirmation').addEventListener('input', function () {
            const password = document.getElementById('password').value;
            const passwordConfirmation = this.value;
            const passwordConfirmError = document.getElementById('passwordConfirmError');
            if (password !== passwordConfirmation) {
                passwordConfirmError.textContent = 'Passwords do not match.';
                passwordConfirmError.classList.remove('hidden');
            } else {
                passwordConfirmError.classList.add('hidden');
            }
        });
    </script>
</x-app-layout>
