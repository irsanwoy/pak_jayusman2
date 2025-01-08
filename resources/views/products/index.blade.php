<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-600">
                    <!-- Form pencarian -->
                    <form method="GET" action="{{ route('product.index') }}" class="mb-4">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..." class="border rounded-md px-4 py-2 text-gray-900 dark:text-gray-100 dark:bg-gray-700">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Search</button>
                    </form>

                    <!-- Tombol untuk menambah produk -->
                    <a href="{{ route('product.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-4 inline-block">Add New Product</a>

                    <!-- Tabel daftar produk -->
                    <table class="table-auto w-full text-left border-collapse text-gray-900 dark:text-gray-100">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                <th class="border px-4 py-2 dark:border-gray-600">ID</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Product Name</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Price</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Stock</th>
                                @if(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Manajer Toko') ||  auth()->user()->hasRole('Gudang'))
                                <th class="border px-4 py-2 dark:border-gray-600">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr class="bg-white dark:bg-gray-800">
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $product->id }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $product->product_name }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $product->price }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $product->stock }}</td>
                                    @if(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Manajer Toko') || auth()->user()->hasRole('Gudang'))
                                    <td class="border px-4 py-2 dark:border-gray-600">
                                        <a href="{{ route('product.edit', $product->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 inline-block">Edit</a>
                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">No products found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $products->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
