<x-app-layout>
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Dashboard Gudang</h1>
        
        <!-- Section: Stok Barang -->
        <div class="bg-white dark:bg-gray-800 rounded shadow p-4 mb-6">
            <h2 class="text-xl font-semibold mb-4">Stok Barang</h2>
            <table class="table-auto w-full text-left">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                        <th class="px-4 py-2">Nama Produk</th>
                        <th class="px-4 py-2">Stok Tersedia</th>
                        <th class="px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-2">Produk A</td>
                        <td class="px-4 py-2">50</td>
                        <td class="px-4 py-2 text-green-500">Aman</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">Produk B</td>
                        <td class="px-4 py-2">10</td>
                        <td class="px-4 py-2 text-yellow-500">Hampir Habis</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">Produk C</td>
                        <td class="px-4 py-2">0</td>
                        <td class="px-4 py-2 text-red-500">Habis</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Section: Pengiriman Barang -->
        <div class="bg-white dark:bg-gray-800 rounded shadow p-4 mb-6">
            <h2 class="text-xl font-semibold mb-4">Pengiriman Barang</h2>
            <table class="table-auto w-full text-left">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                        <th class="px-4 py-2">Nama Produk</th>
                        <th class="px-4 py-2">Jumlah</th>
                        <th class="px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-2">Produk D</td>
                        <td class="px-4 py-2">20</td>
                        <td class="px-4 py-2 text-blue-500">Dalam Pengiriman</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">Produk E</td>
                        <td class="px-4 py-2">15</td>
                        <td class="px-4 py-2 text-green-500">Terkirim</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Section: Permintaan Restok -->
        <div class="bg-white dark:bg-gray-800 rounded shadow p-4">
            <h2 class="text-xl font-semibold mb-4">Permintaan Restok</h2>
            <table class="table-auto w-full text-left">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                        <th class="px-4 py-2">Nama Produk</th>
                        <th class="px-4 py-2">Permintaan</th>
                        <th class="px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-2">Produk F</td>
                        <td class="px-4 py-2">30</td>
                        <td class="px-4 py-2 text-yellow-500">Menunggu Persetujuan</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">Produk G</td>
                        <td class="px-4 py-2">40</td>
                        <td class="px-4 py-2 text-green-500">Disetujui</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
