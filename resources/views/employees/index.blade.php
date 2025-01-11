<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Pegawai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-600">
                   
                    <div class="flex items-center space-x-4 mb-4">
                    
                        <form method="GET" action="{{ route('employee.index') }}" class="flex items-center space-x-2">
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari pegawai..." class="border rounded-md px-4 py-2 text-gray-900 dark:text-gray-100 dark:bg-gray-700">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Cari</button>
                        </form>
                       
                        
                        
                        <form action="{{ route('employee.index') }}" method="GET" class="flex items-center space-x-2">
                            <label for="branch_id" class="text-gray-700 dark:text-gray-100">Pilih Cabang:</label>
                            <select name="branch_id" id="branch_id" class="border rounded-md px-4 py-2 text-gray-900 dark:text-gray-100 dark:bg-gray-700">
                                <option value="">-- Semua Cabang --</option>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}" {{ request('branch_id') == $branch->id ? 'selected' : '' }}>
                                        {{ $branch->branch_name }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Lihat Berdasarkan Cabang</button>
                        </form>
                    </div>

                   
                    <a href="{{ route('employee.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-4 inline-block">Tambah Pegawai</a>

                 
                    <table class="table-auto w-full text-left border-collapse text-gray-900 dark:text-gray-100">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                <th class="border px-4 py-2 dark:border-gray-600">ID</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Nama</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Posisi</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Cabang</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employees as $employee)
                                <tr class="bg-white dark:bg-gray-800">
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $employee->id }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $employee->name }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $employee->position }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $employee->branch->branch_name }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">
                                        <a href="{{ route('employee.edit', $employee->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 inline-block">Edit</a>
                                        <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">Tidak ada pegawai yang ditemukan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $employees->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
