<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Tombol untuk menambah produk -->
                    <a href="{{ route('product.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-4 inline-block">Add New Product</a>

                    <!-- Tabel daftar produk -->
                    <table class="table-auto w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">ID</th>
                                <th class="border px-4 py-2">Product Name</th>
                                <th class="border px-4 py-2">Price</th>
                                <th class="border px-4 py-2">Stock</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="border px-4 py-2">{{ $product->id }}</td>
                                    <td class="border px-4 py-2">{{ $product->product_name }}</td>
                                    <td class="border px-4 py-2">{{ $product->price }}</td>
                                    <td class="border px-4 py-2">{{ $product->stock }}</td>
                                    <td class="border px-4 py-2">
                                        <!-- Tombol Edit -->
                                        <a href="{{ url("/product/{$product->id}/edit") }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 inline-block">Edit</a>

                                        <!-- Form Hapus -->
                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline-block;">
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
