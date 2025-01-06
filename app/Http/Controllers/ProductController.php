<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $query = Product::query();

    // Search functionality
    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where('product_name', 'like', '%' . $search . '%')
              ->orWhere('price', 'like', '%' . $search . '%')
              ->orWhere('stock', 'like', '%' . $search . '%');
    }

    // Pagination
    $products = $query->paginate(5);

    return view('products.index', compact('products'));
}


    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('product.index');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('product.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
