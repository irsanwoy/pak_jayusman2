<x-app-layout>
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Dashboard Manajer Toko</h1>

        <!-- Statistik Pendapatan -->
        <div class="grid grid-cols-3 gap-4 mb-6">
            <div class="bg-white dark:bg-gray-800 rounded shadow p-4">
                <h2 class="text-lg font-semibold">Pendapatan Hari Ini</h2>
                <p class="text-2xl font-bold text-green-500">Rp 5.000.000</p>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded shadow p-4">
                <h2 class="text-lg font-semibold">Pendapatan Minggu Ini</h2>
                <p class="text-2xl font-bold text-green-500">Rp 25.000.000</p>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded shadow p-4">
                <h2 class="text-lg font-semibold">Pendapatan Bulan Ini</h2>
                <p class="text-2xl font-bold text-green-500">Rp 100.000.000</p>
            </div>
        </div>

        <!-- Grafik Penjualan Produk Terlaris -->
        <div class="bg-white dark:bg-gray-800 rounded shadow p-4 mb-6">
            <h2 class="text-xl font-semibold mb-4">Produk Terlaris</h2>
            <canvas id="topProductsChart"></canvas>
        </div>

        <!-- Kinerja Tim -->
        <div class="bg-white dark:bg-gray-800 rounded shadow p-4">
            <h2 class="text-xl font-semibold mb-4">Kinerja Tim</h2>
            <table class="table-auto w-full text-left">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                        <th class="px-4 py-2">Nama Kasir</th>
                        <th class="px-4 py-2">Jumlah Transaksi</th>
                        <th class="px-4 py-2">Total Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-2">Kasir A</td>
                        <td class="px-4 py-2">50</td>
                        <td class="px-4 py-2">Rp 10.000.000</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">Kasir B</td>
                        <td class="px-4 py-2">40</td>
                        <td class="px-4 py-2">Rp 8.000.000</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">Kasir C</td>
                        <td class="px-4 py-2">30</td>
                        <td class="px-4 py-2">Rp 6.000.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Script untuk Grafik -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('topProductsChart').getContext('2d');
        const topProductsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Produk A', 'Produk B', 'Produk C', 'Produk D', 'Produk E'],
                datasets: [{
                    label: 'Penjualan',
                    data: [50, 40, 30, 20, 10],
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-app-layout>
