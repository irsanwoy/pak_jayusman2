<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-600">
                    <!-- Tombol untuk menambah detail transaksi -->
                    <a href="{{ route('transactionDetail.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-4 inline-block">Add New Transaction Detail</a>

                    <!-- Form pencarian -->
                    <form method="GET" action="{{ route('transactionDetail.index') }}" class="mb-4">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search transaction ID or product..." class="border rounded-md px-4 py-2 text-gray-900 dark:text-gray-100 dark:bg-gray-700">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Search</button>
                    </form>

                    <!-- Tabel daftar detail transaksi -->
                    <table class="table-auto w-full text-left border-collapse text-gray-900 dark:text-gray-100">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                <th class="border px-4 py-2 dark:border-gray-600">Transaction ID</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Product</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Quantity</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Price</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactionDetails as $detail)
                                <tr class="bg-white dark:bg-gray-800">
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $detail->transaction_id }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $detail->product->product_name ?? 'N/A' }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $detail->quantity }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ number_format($detail->price, 0, ',', '.') }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">
                                        <a href="{{ route('transactionDetail.edit', $detail->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 inline-block">Edit</a>
                                        <form action="{{ route('transactionDetail.destroy', $detail->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                        <a href="{{ route('transactionDetail.print', $detail->id) }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Print</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">No transaction details found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $transactionDetails->withQueryString()->links() }}
                    </div>

                    <!-- Print All -->
                    <a href="{{ route('transactionDetail.printAll') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 mb-4 inline-block">Print All Details</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
