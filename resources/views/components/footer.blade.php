<footer class="bg-dark text-textDark text-center py-6">
    <!-- Marquee untuk teks -->
    <div class="marquee bg-primary text-white py-2">
        <p class="text-center text-sm">
            Welcome to our website! 🚀 | Check out our latest updates! 🎉 | Follow us on GitHub! 👨‍💻
        </p>
    </div>

    <!-- Animasi Card -->
    <div class="bg-dark text-textDark py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Anggota 1 -->
                <div class="card bg-white dark:bg-gray-800 rounded-lg shadow-md p-4 text-center">
                    <img src="path-to-foto1.jpg" alt="Foto Anggota 1" class="w-24 h-24 rounded-full mx-auto mb-4">
                    <h3 class="text-lg font-bold">Nama Anggota 1</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">NPM: 1234567890</p>
                    <a href="https://github.com/anggota1" target="_blank" class="text-primary hover:underline">
                        GitHub
                    </a>
                </div>

                <!-- Anggota 2 -->
                <div class="card bg-white dark:bg-gray-800 rounded-lg shadow-md p-4 text-center">
                    <img src="path-to-foto2.jpg" alt="Foto Anggota 2" class="w-24 h-24 rounded-full mx-auto mb-4">
                    <h3 class="text-lg font-bold">Nama Anggota 2</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">NPM: 0987654321</p>
                    <a href="https://github.com/anggota2" target="_blank" class="text-primary hover:underline">
                        GitHub
                    </a>
                </div>

                <!-- Anggota 3 -->
                <div class="card bg-white dark:bg-gray-800 rounded-lg shadow-md p-4 text-center">
                    <img src="path-to-foto3.jpg" alt="Foto Anggota 3" class="w-24 h-24 rounded-full mx-auto mb-4">
                    <h3 class="text-lg font-bold">Nama Anggota 3</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">NPM: 1122334455</p>
                    <a href="https://github.com/anggota3" target="_blank" class="text-primary hover:underline">
                        GitHub
                    </a>
                </div>
            </div>

            <!-- Copyright -->
            <p class="mt-6 text-center text-sm">&copy; {{ date('Y') }} Your Project Name. All rights reserved.</p>
        </div>
    </div>
</footer>

<style>
    /* Animasi untuk Card */
    .card {
        animation: card-marquee 15s linear infinite;
    }

    /* Durasi dan jeda untuk setiap card */
    .card:nth-child(1) {
        animation-delay: 0s;
    }

    .card:nth-child(2) {
        animation-delay: 3s;
    }

    .card:nth-child(3) {
        animation-delay: 6s;
    }

    @keyframes card-marquee {
        from {
            transform: translateX(100%);
        }
        to {
            transform: translateX(-100%);
        }
    }
</style>
