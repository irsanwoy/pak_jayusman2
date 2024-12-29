@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
    <h1>Add New Product</h1>

    <!-- Menampilkan pesan error validasi -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Tambah Produk -->
    <form action="{{ route('product.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="product_name" class="form-label">Product Name</label>
            <input type="text" id="product_name" name="product_name" class="form-control" value="{{ old('product_name') }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" id="price" name="price" class="form-control" value="{{ old('price') }}" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" id="stock" name="stock" class="form-control" value="{{ old('stock') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Product</button>
        <a href="{{ route('product.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
