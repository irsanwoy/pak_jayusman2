<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-4xl font-bold mb-6 text-center text-primary">Admin Dashboard</h1>
        
        <!-- Statistik Utama -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-gradient-to-r from-blue-500 to-purple-500 text-white p-6 rounded-lg shadow-lg transform transition duration-500 hover:scale-105">
                <h2 class="text-2xl font-semibold">Total Users</h2>
                <p class="text-4xl font-bold">100</p>
                <p class="mt-2 text-sm">New: 10 Today</p>
            </div>
            <div class="bg-gradient-to-r from-green-500 to-teal-500 text-white p-6 rounded-lg shadow-lg transform transition duration-500 hover:scale-105">
                <h2 class="text-2xl font-semibold">Total Transactions</h2>
                <p class="text-4xl font-bold">$5,000</p>
                <p class="mt-2 text-sm">This Week: +15%</p>
            </div>
            <div class="bg-gradient-to-r from-red-500 to-orange-500 text-white p-6 rounded-lg shadow-lg transform transition duration-500 hover:scale-105">
                <h2 class="text-2xl font-semibold">Total Products</h2>
                <p class="text-4xl font-bold">150</p>
                <p class="mt-2 text-sm">Updated: 5 New</p>
            </div>
        </div>

        <!-- Grafik dan Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold mb-4">User Growth</h2>
                <canvas id="userGrowthChart"></canvas>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold mb-4">Revenue Over Time</h2>
                <canvas id="revenueChart"></canvas>
            </div>
        </div>

        <!-- Tabel Aktivitas Terbaru -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg mb-8">
            <h2 class="text-xl font-semibold mb-4">Recent Activities</h2>
            <table class="table-auto w-full text-left">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                        <th class="px-4 py-2">Activity</th>
                        <th class="px-4 py-2">User</th>
                        <th class="px-4 py-2">Time</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-2">Logged In</td>
                        <td class="px-4 py-2">User A</td>
                        <td class="px-4 py-2">5 mins ago</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">Purchased Product</td>
                        <td class="px-4 py-2">User B</td>
                        <td class="px-4 py-2">10 mins ago</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">Updated Profile</td>
                        <td class="px-4 py-2">User C</td>
                        <td class="px-4 py-2">15 mins ago</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <button class="bg-blue-500 text-white py-4 rounded-lg shadow-lg transform transition duration-300 hover:bg-blue-600">
                Add New User
            </button>
            <button class="bg-green-500 text-white py-4 rounded-lg shadow-lg transform transition duration-300 hover:bg-green-600">
                Generate Report
            </button>
            <button class="bg-red-500 text-white py-4 rounded-lg shadow-lg transform transition duration-300 hover:bg-red-600">
                Manage Products
            </button>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const userGrowthCtx = document.getElementById('userGrowthChart').getContext('2d');
        const userGrowthChart = new Chart(userGrowthCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Users',
                    data: [50, 75, 100, 150, 200, 250],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(revenueCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Revenue ($)',
                    data: [1000, 2000, 3000, 4000, 5000, 6000],
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-app-layout>
