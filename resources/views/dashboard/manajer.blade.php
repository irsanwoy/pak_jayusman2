<x-app-layout>
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Dashboard Manajer Toko</h1>

        <!-- Statistik Pendapatan -->
        <div class="grid grid-cols-3 gap-4 mb-6">
            <div class="bg-white dark:bg-gray-800 rounded shadow p-4">
                <h2 class="text-lg font-semibold">Pendapatan Hari Ini</h2>
                <p class="text-2xl font-bold text-green-500">
                    Rp {{ number_format($pendapatanHariIni, 0, ',', '.') }}
                </p>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded shadow p-4">
                <h2 class="text-lg font-semibold">Pendapatan Minggu Ini</h2>
                <p class="text-2xl font-bold text-green-500">
                    Rp {{ number_format($pendapatanMingguIni, 0, ',', '.') }}
                </p>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded shadow p-4">
                <h2 class="text-lg font-semibold">Pendapatan Bulan Ini</h2>
                <p class="text-2xl font-bold text-green-500">
                    Rp {{ number_format($pendapatanBulanIni, 0, ',', '.') }}
                </p>
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
                    @foreach($kinerjaTim as $tim)
                        <tr>
                            <td class="px-4 py-2">{{ $tim->employee->name }}</td>
                            <td class="px-4 py-2">{{ $tim->jumlah_transaksi }}</td>
                            <td class="px-4 py-2">Rp {{ number_format($tim->total_pendapatan, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Script untuk Grafik -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const produkLabels = @json($produkTerlaris->pluck('product.product_name'));
        const produkData = @json($produkTerlaris->pluck('total_terjual'));

        const ctx = document.getElementById('topProductsChart').getContext('2d');
        const topProductsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: produkLabels,
                datasets: [{
                    label: 'Penjualan',
                    data: produkData,
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
