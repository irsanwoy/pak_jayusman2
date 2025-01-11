<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transactions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-600">
                
                    @if(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Manajer Toko') || auth()->user()->hasRole('Gudang'))

                    <a href="{{ route('transaction.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-4 inline-block">Tambah Transaksi</a>
                    @endif

           
                    <form method="GET" action="{{ route('transaction.index') }}" class="mb-4">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari transaksi..." class="border rounded-md px-4 py-2 text-gray-900 dark:text-gray-100 dark:bg-gray-700">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Cari</button>
                    </form>

                  
                    <table class="table-auto w-full text-left border-collapse text-gray-900 dark:text-gray-100">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                <th class="border px-4 py-2 dark:border-gray-600">ID</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Transaction Date</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Branch</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Employee</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Total</th>
                    @if(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Kasir') )

                                <th class="border px-4 py-2 dark:border-gray-600">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $transaction)
                                <tr class="bg-white dark:bg-gray-800">
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $transaction->id }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $transaction->date }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $transaction->branch->branch_name ?? 'N/A' }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $transaction->employee->name ?? 'N/A' }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $transaction->total }}</td>
                    @if(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Manajer Toko') )

                                    <td class="border px-4 py-2 dark:border-gray-600">
                                        <a href="{{ route('transaction.edit', $transaction->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 inline-block">Edit</a>
                                        <form action="{{ route('transaction.destroy', $transaction->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                        <a href="{{ route('transaction.print', $transaction->id) }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Print</a>
                                    </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">No transactions found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <br>
                    
                    @if(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Manajer Toko'))
                    <a href="{{ route('transaction.printByBranchForm') }}" class="bg-orange-500 text-white px-4 py-2 rounded-md hover:bg-orange-600 mb-4 inline-block">Print By Branch</a>

                    <a href="{{ route('transaction.printAll') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 mb-4 inline-block">Print All Transactions</a>
                    @endif
                   
                    <div class="mt-4">
                        {{ $transactions->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
