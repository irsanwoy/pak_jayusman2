<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-orange-500 to-green-500 dark:from-gray-800 dark:to-gray-900">
        <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
            <div class="text-center mb-6">
                <!-- Logo -->
                <img src="{{ asset('images/js.png') }}" alt="Logo" class="mx-auto w-35 h-35 rounded-full">
                <h1 class="text-2xl font-bold text-orange-600 dark:text-orange-400 mt-2">Create Your Account</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">Join Jayusman Store and enjoy exclusive offers</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-gray-700 dark:text-gray-300" />
                    <x-text-input id="name" class="block mt-1 w-full bg-gray-100 dark:bg-gray-700 border border-orange-400 dark:border-orange-500 text-gray-800 dark:text-gray-300"
                                  type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-orange-600 dark:text-orange-400" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 dark:text-gray-300" />
                    <x-text-input id="email" class="block mt-1 w-full bg-gray-100 dark:bg-gray-700 border border-orange-400 dark:border-orange-500 text-gray-800 dark:text-gray-300"
                                  type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-orange-600 dark:text-orange-400" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-300" />
                    <x-text-input id="password" class="block mt-1 w-full bg-gray-100 dark:bg-gray-700 border border-orange-400 dark:border-orange-500 text-gray-800 dark:text-gray-300"
                                  type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-orange-600 dark:text-orange-400" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 dark:text-gray-300" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full bg-gray-100 dark:bg-gray-700 border border-orange-400 dark:border-orange-500 text-gray-800 dark:text-gray-300"
                                  type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-orange-600 dark:text-orange-400" />
                </div>

                <div class="flex items-center justify-between mt-6">
                    <a class="text-sm text-green-600 dark:text-green-500 hover:underline" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ml-3 bg-orange-500 dark:bg-orange-600 hover:bg-orange-600 dark:hover:bg-orange-700 focus:ring focus:ring-green-400 dark:focus:ring-green-600">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>

            <div class="mt-6 text-center text-sm text-gray-600 dark:text-gray-400">
                <p>By creating an account, you agree to our <a href="#" class="text-orange-600 dark:text-orange-400 hover:underline">Terms of Service</a> and <a href="#" class="text-orange-600 dark:text-orange-400 hover:underline">Privacy Policy</a>.</p>
            </div>
        </div>
    </div>
</x-guest-layout>
