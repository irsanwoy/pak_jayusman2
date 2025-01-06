<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Branches') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Search branch</h1>
                    <form method="GET" action="{{ route('branch.index') }}">
                        <input 
                            type="text" 
                            name="search" 
                            placeholder="Search branches..." 
                            value="{{ request('search') }}" 
                            class="border rounded p-2">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
                    </form>
                    <br>
                    <!-- Tombol untuk menambah branch -->
                    <a href="{{ route('branch.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-4 inline-block">Tambah Branch</a>

                    <!-- Tabel daftar branch -->
                    <table class="table-auto w-full text-left border-collapse mt-4">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">ID</th>
                                <th class="border px-4 py-2">Branch Name</th>
                                <th class="border px-4 py-2">Address</th>
                                <th class="border px-4 py-2">City</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($branches as $branch)
                                <tr>
                                    <td class="border px-4 py-2">{{ $branch->id }}</td>
                                    <td class="border px-4 py-2">{{ $branch->branch_name }}</td>
                                    <td class="border px-4 py-2">{{ $branch->address }}</td>
                                    <td class="border px-4 py-2">{{ $branch->city }}</td>
                                    <td class="border px-4 py-2">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('branch.edit', $branch->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 inline-block">Edit</a>

                                        <!-- Form Hapus -->
                                        <form action="{{ route('branch.destroy', $branch->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $branches->links() }}
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
