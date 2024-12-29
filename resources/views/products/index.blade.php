@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <h1>Products</h1>
    @component('components.button', ['class' => 'btn-success', 'type' => 'button'])
        <a href="{{ url('/products/create') }}" class="text-white text-decoration-none">Add New Product</a>
    @endcomponent
    @component('components.table', ['headers' => ['ID', 'Product Name', 'Description', 'Price']])
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    @component('components.button', ['class' => 'btn-warning'])
                        <a href="{{ url("/products/{$product->id}/edit") }}" class="text-white text-decoration-none">Edit</a>
                    @endcomponent
                    @component('components.button', ['class' => 'btn-danger', 'onclick' => "deleteProduct({{ $product->id }})"])
                        Delete
                    @endcomponent
                </td>
            </tr>
        @endforeach
    @endcomponent
@endsection
