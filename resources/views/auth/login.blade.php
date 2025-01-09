<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-orange-500 to-green-500 dark:from-gray-800 dark:to-gray-900">
        <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
            <div class="text-center mb-6">
                <!-- Logo -->
                <img src="{{ asset('images/js.png') }}" alt="Logo" class="mx-auto w-35 h-35 rounded-full">
                <h1 class="text-2xl font-bold text-orange-600 dark:text-orange-400 mt-2">Welcome Back To Jayusman Store</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">Please log in to continue</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
            @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 dark:text-gray-300" />
                    <x-text-input id="email" class="block mt-1 w-full bg-gray-100 dark:bg-gray-700 border border-orange-400 dark:border-orange-500 text-gray-800 dark:text-gray-300" 
                                  type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-orange-600 dark:text-orange-400" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-300" />
                    <x-text-input id="password" class="block mt-1 w-full bg-gray-100 dark:bg-gray-700 border border-orange-400 dark:border-orange-500 text-gray-800 dark:text-gray-300" 
                                  type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-orange-600 dark:text-orange-400" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-green-500 dark:border-green-600 text-green-600 dark:text-green-500 focus:ring-green-500 dark:focus:ring-green-600" name="remember">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-4">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-orange-600 dark:text-orange-400 hover:underline" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ml-3 bg-orange-500 dark:bg-orange-600 hover:bg-orange-600 dark:hover:bg-orange-700 focus:ring focus:ring-green-400 dark:focus:ring-green-600">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Footer -->
            <div class="mt-6 text-center text-sm text-gray-600 dark:text-gray-400">
                <p>Don't have an account? <a href="{{ route('register') }}" class="text-green-600 dark:text-green-500 hover:underline">Sign up</a></p>
            </div>
        </div>
    </div>

    
</x-guest-layout>
