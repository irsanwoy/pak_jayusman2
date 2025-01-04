<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transactions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Tombol untuk menambah transaksi -->
                    <a href="{{ route('transaction.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-4 inline-block">Tambah Pegawai</a>

                    <!-- Tabel daftar transaksi -->
                    <table class="table-auto w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">ID</th>
                                <th class="border px-4 py-2">Transaction Date</th>
                                <th class="border px-4 py-2">Branch</th>
                                <th class="border px-4 py-2">Employee</th>
                                <th class="border px-4 py-2">Total</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td class="border px-4 py-2">{{ $transaction->id }}</td>
                                    <td class="border px-4 py-2">{{ $transaction->date }}</td>
                                    <td class="border px-4 py-2">{{ $transaction->branch->branch_name ?? 'N/A' }}</td>
                                    <td class="border px-4 py-2">{{ $transaction->employee->name ?? 'N/A' }}</td>
                                    <td class="border px-4 py-2">{{ $transaction->total }}</td>
                                    <td class="border px-4 py-2">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('transaction.edit', $transaction->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 inline-block">Edit</a>

                                        <!-- Form Hapus -->
                                        <form action="{{ route('transaction.destroy', $transaction->id) }}" method="POST" style="display:inline-block;">
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
