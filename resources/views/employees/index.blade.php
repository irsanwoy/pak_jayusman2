<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Pegawai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Tombol untuk menambah pegawai -->
                    <a href="{{ route('employee.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-4 inline-block">Tambah Pegawai</a>

                    <!-- Tabel daftar pegawai -->
                    <table class="table-auto w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">ID</th>
                                <th class="border px-4 py-2">Nama</th>
                                <th class="border px-4 py-2">Posisi</th>
                                <th class="border px-4 py-2">Cabang</th>
                                <!-- <th class="border px-4 py-2">Role</th> -->
                                <th class="border px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                <td>{{ $employee->id }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->position }}</td>
                                <td>{{ $employee->branch->branch_name }}</td>
                                    <!-- <td class="border px-4 py-2">{{ $employee->name }}</td>
                                    <td class="border px-4 py-2">{{ $employee->position }}</td>
                                    <td class="border px-4 py-2">
                                        {{ $employee->branch->name ?? 'Tidak Ada Cabang' }}
                                    </td>
                                    <td class="border px-4 py-2">
                                        @if ($employee->user && $employee->user->roles->count() > 0)
                                            {{ $employee->user->roles->pluck('name')->join(', ') }}
                                        @else
                                            Tidak Ada Role
                                        @endif
                                    </td> -->
                                        <td class="border px-4 py-2">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('employee.edit', $employee->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 inline-block">Edit</a>

                                        <!-- Form Hapus -->
                                        <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
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
