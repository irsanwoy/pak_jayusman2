<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased dark:text-gray-100">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900 transition-colors duration-300">
            {{-- <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500 dark:text-gray-300" />
                </a>
            </div> --}}

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>

          <!-- Tombol Toggle -->
          <button id="theme-toggle" class="fixed bottom-4 right-4 bg-primary text-white p-3 rounded-full shadow-md">
            <i id="theme-icon" class="fas fa-moon"></i>
        </button>

        <!-- Script untuk Toggle Dark Mode -->
        <script>
            const themeToggle = document.getElementById('theme-toggle');
            const themeIcon = document.getElementById('theme-icon');
            const htmlElement = document.documentElement;

            function toggleTheme() {
                if (htmlElement.classList.contains('dark')) {
                    htmlElement.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                    themeIcon.classList.remove('fa-sun');
                    themeIcon.classList.add('fa-moon');
                } else {
                    htmlElement.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                    themeIcon.classList.remove('fa-moon');
                    themeIcon.classList.add('fa-sun');
                }
            }

            themeToggle.addEventListener('click', toggleTheme);

            if (localStorage.getItem('theme') === 'dark') {
                htmlElement.classList.add('dark');
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
            } else {
                htmlElement.classList.remove('dark');
                themeIcon.classList.remove('fa-sun');
                themeIcon.classList.add('fa-moon');
            }
        </script>
    </body>
</html>
