<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} | @yield('title', 'Welcome')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Custom Styles -->
        <style>
            body {
                scroll-behavior: smooth;
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-gradient-to-br from-gray-100 via-white to-gray-200 dark:from-gray-900 dark:via-gray-800 dark:to-gray-700">
        <div class="min-h-screen flex flex-col">
            <!-- Navigation -->
            <div class="bg-gradient-to-r from-orange-500 to-red-500 text-white shadow-lg">
                @include('layouts.navigation')
            </div>

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-gradient-to-r from-orange-500 to-red-600 shadow-lg text-white">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h1 class="text-3xl font-bold tracking-tight">{{ $header }}</h1>
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-grow container mx-auto px-4 sm:px-6 lg:px-8 mt-6">
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    @yield('content')
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-gray-100 dark:bg-gray-900 text-center py-6 text-sm text-gray-600 dark:text-gray-400">
                <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
                <p class="mt-1">Crafted with ❤️ by Kelompok 2</p>
            </footer>
        </div>

        <!-- Optional: Custom Scripts -->
        <script>
            // Example: Add any custom JavaScript here
            console.log("Welcome to {{ config('app.name', 'jayusman2') }}!");
        </script>
    </body>
</html>
