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
                    @foreach ($products as $product)
                        <tr>
                            <td class="px-4 py-2">{{ $product->product_name }}</td>
                            <td class="px-4 py-2">{{ $product->stock }}</td>
                            <td class="px-4 py-2 
                                @if ($product->stock == 0)
                                    text-red-500
                                @elseif ($product->stock < 50)
                                    text-yellow-500
                                @else
                                    text-green-500
                                @endif">
                                @if ($product->stock == 0)
                                    Habis
                                @elseif ($product->stock < 50)
                                    Hampir Habis
                                @else
                                    Aman
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
