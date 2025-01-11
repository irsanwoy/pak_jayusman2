<x-app-layout>
    <div class="container mx-auto p-6 bg-gray-100 dark:bg-gray-900 rounded shadow-lg">
        <h1 class="text-3xl font-extrabold text-center text-gray-800 dark:text-white mb-6">Dashboard Kasir</h1>

        <!-- Form for Transactions -->
        {{-- <form action="{{ route('transactionDetail.store') }}" method="POST" class="space-y-6">
            @csrf

    
            <div>
                <label for="product_id" class="block text-sm font-medium text-gray-700">Product</label>
                <select name="product_id" id="product_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    <option value="" data-price="0">-- Select Product --</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                            {{ $product->product_name }}
                        </option>
                    @endforeach
                </select>
            </div> --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                
                <div class="bg-gradient-to-r from-green-500 to-teal-500 text-white p-6 rounded-lg shadow-lg transform transition duration-500 hover:scale-105">
                    <h2 class="text-2xl font-semibold">Tambah Transaksi Baru</h2>
                    {{-- <p class="text-4xl font-bold">{{ $totalTransactions }}</p> --}}
                
                    <!-- Tombol untuk menuju ke halaman tambah transaksi baru -->
                    <a href="{{ route('transactionDetail.create') }}" class="mt-4 inline-block bg-white text-green-500 font-semibold py-2 px-4 rounded-md hover:bg-gray-100 transition duration-300">
                        Tambah Transaksi
                    </a>
                </div>
                
                
            </div>
            {{-- <div class="mt-4">
                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                <input type="number" id="quantity" name="quantity" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" min="1" value="1">
            </div>
            
            <div class="mt-4">
                <label for="total_price" class="block text-sm font-medium text-gray-700">Total Price</label>
                <input type="text" id="total_price" name="total_price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" readonly>
            </div> --}}
            
            
            
         
            <!-- Price (Auto-filled) -->
            {{-- <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input type="number" name="price" id="price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" readonly>
            </div>

            <!-- Tombol Simpan -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('transactionDetail.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Cancel</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
            </div>
        </form> --}}

        <!-- Additional Features: Recent Transactions -->
        {{-- <div class="mt-8">
            <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Recent Transactions</h2>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                <table class="table-auto w-full text-left text-gray-700 dark:text-gray-300">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Product</th>
                            <th class="px-4 py-2">Amount</th>
                            <th class="px-4 py-2">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">Product A</td>
                            <td class="px-4 py-2">3</td>
                            <td class="px-4 py-2">2023-12-01</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2">2</td>
                            <td class="px-4 py-2">Product B</td>
                            <td class="px-4 py-2">5</td>
                            <td class="px-4 py-2">2023-12-02</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> --}}
    </div>
</x-app-layout>
