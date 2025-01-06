@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <h1>Products</h1>
    @component('components.button', ['class' => 'btn-success', 'type' => 'button'])
        <a href="{{ url('/products/create') }}" class="text-white text-decoration-none">Add New Product</a>
    @endcomponent
    @component('components.table', ['headers' => ['ID', 'Product Name', 'Price', 'Stock', 'Actions']])
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    @component('components.button', ['class' => 'btn-warning'])
                        <a href="{{ url("/product/{$product->id}/edit") }}" class="text-white text-decoration-none">Edit</a>
                    @endcomponent

                    <!-- Form Delete -->
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    @endcomponent
@endsection
