<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Branches') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-600">
                    <h1 class="text-gray-900 dark:text-gray-100">Search branch</h1>
                    <form method="GET" action="{{ route('branch.index') }}">
                        <input 
                            type="text" 
                            name="search" 
                            placeholder="Search branches..." 
                            value="{{ request('search') }}" 
                            class="border rounded p-2 text-gray-900 dark:text-gray-100 dark:bg-gray-700">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Search</button>
                    </form>
                    <br>
                    <a href="{{ route('branch.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-4 inline-block">Tambah Branch</a>

                    <table class="table-auto w-full text-left border-collapse mt-4 text-gray-900 dark:text-gray-100">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                <th class="border px-4 py-2 dark:border-gray-600">ID</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Branch Name</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Address</th>
                                <th class="border px-4 py-2 dark:border-gray-600">City</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($branches as $branch)
                                <tr class="bg-white dark:bg-gray-800">
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $branch->id }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $branch->branch_name }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $branch->address }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $branch->city }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">
                                        <a href="{{ route('branch.edit', $branch->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 inline-block">Edit</a>
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
                    <div class="mt-4">
                        {{ $branches->links('pagination::tailwind', ['class' => 'text-gray-900 dark:text-gray-100']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
