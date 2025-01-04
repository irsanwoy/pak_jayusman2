<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Tombol untuk menambah detail transaksi -->
                    <a href="{{ route('transactionDetail.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-4 inline-block">Add New Transaction Detail</a>

                    <!-- Tabel daftar detail transaksi -->
                    <table class="table-auto w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">Transaction ID</th>
                                <th class="border px-4 py-2">Product ID</th>
                                <th class="border px-4 py-2">Quantity</th>
                                <th class="border px-4 py-2">Price</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactionDetails as $detail)
                                <tr>
                                    <td class="border px-4 py-2">{{ $detail->transaction_id }}</td>
                                    <td class="border px-4 py-2">{{ $detail->product_id }}</td>
                                    <td class="border px-4 py-2">{{ $detail->quantity }}</td>
                                    <td class="border px-4 py-2">{{ number_format($detail->price, 0, ',', '.') }}</td>
                                    <td class="border px-4 py-2">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('transactionDetail.edit', $detail->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 inline-block">Edit</a>

                                        <!-- Form Hapus -->
                                        <form action="{{ route('transactionDetail.destroy', $detail->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
