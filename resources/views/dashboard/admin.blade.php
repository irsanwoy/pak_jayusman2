<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-4xl font-bold mb-6 text-center text-primary">Admin Dashboard</h1>
        
        <!-- Statistik Utama -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-gradient-to-r from-blue-500 to-purple-500 text-white p-6 rounded-lg shadow-lg transform transition duration-500 hover:scale-105">
                <h2 class="text-2xl font-semibold">Total Users</h2>
                <p class="text-4xl font-bold">{{ $totalUsers }}</p>
            </div>
            <div class="bg-gradient-to-r from-green-500 to-teal-500 text-white p-6 rounded-lg shadow-lg transform transition duration-500 hover:scale-105">
                <h2 class="text-2xl font-semibold">Total Transactions</h2>
                <p class="text-4xl font-bold">{{ $totalTransactions }}</p>
            </div>
            <div class="bg-gradient-to-r from-red-500 to-orange-500 text-white p-6 rounded-lg shadow-lg transform transition duration-500 hover:scale-105">
                <h2 class="text-2xl font-semibold">Total Products</h2>
                <p class="text-4xl font-bold">{{ $totalProducts }}</p>
            </div>
        </div>

        

      <!-- Quick Actions -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <button 
        onclick="window.location.href='{{ route('users.create') }}'" 
        class="bg-blue-500 text-white py-4 rounded-lg shadow-lg transform transition duration-300 hover:bg-blue-600">
        Add New User
    </button>
    <button>
        {{-- onclick="window.location.href='{{ route('transactions.pdf_all') }}'" 
        class="bg-green-500 text-white py-4 rounded-lg shadow-lg transform transition duration-300 hover:bg-green-600">
        Generate Report --}}
    </button>
    <a href="{{ route('product.index') }}" class="bg-red-500 text-white py-4 rounded-lg shadow-lg transform transition duration-300 hover:bg-red-600 text-center flex items-center justify-center">
        Manage Products
    </a>
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
