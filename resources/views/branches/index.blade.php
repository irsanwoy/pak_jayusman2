@extends('layouts.app')

@section('title', 'Branches')

@section('content')
    <div class="bg-gray-900 shadow rounded-lg p-6">
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-orange-400">Branches</h1>
            <a href="{{ url('/branches/create') }}" 
               class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded shadow hover:shadow-lg transition duration-300">
                Add New Branch
            </a>
        </div>

        <!-- Table Section -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-800 border border-gray-700 rounded-lg">
                <thead class="bg-gray-700">
                    <tr>
                        @foreach (['ID', 'Branch Name', 'Address', 'City', 'Actions'] as $header)
                            <th class="text-left px-4 py-2 font-semibold text-orange-400 border-b border-gray-600">
                                {{ $header }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @forelse ($branches as $branch)
                        <tr class="hover:bg-gray-700">
                            <td class="px-4 py-2 text-gray-300 border-b border-gray-600">{{ $branch->id }}</td>
                            <td class="px-4 py-2 text-gray-300 border-b border-gray-600">{{ $branch->branch_name }}</td>
                            <td class="px-4 py-2 text-gray-300 border-b border-gray-600">{{ $branch->address }}</td>
                            <td class="px-4 py-2 text-gray-300 border-b border-gray-600">{{ $branch->city }}</td>
                            <td class="px-4 py-2 text-gray-300 border-b border-gray-600 flex space-x-2">
                                <!-- Edit Button -->
                                <a href="{{ url("/branches/{$branch->id}/edit") }}" 
                                   class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-1 px-3 rounded shadow hover:shadow-md transition duration-300">
                                    Edit
                                </a>
                                <!-- Delete Form -->
                                <form action="{{ url("/branches/{$branch->id}") }}" method="POST" 
                                      onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded shadow hover:shadow-md transition duration-300">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-2 text-center text-gray-500">
                                No branches found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
