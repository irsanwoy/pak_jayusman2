<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;
class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        $branches = Branch::all(); 

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('product_name', 'like', '%' . $search . '%')
                  ->orWhere('price', 'like', '%' . $search . '%')
                  ->orWhere('stock', 'like', '%' . $search . '%');
        }


        $products = $query->paginate(5);

        return view('products.index', compact('products', 'branches'));
    }

    public function create()
    {
        $branches = Branch::all();
        $employees = Employee::all();
        $product = new Product(); // Inisialisasi objek Product jika diperlukan
        return view('products.create', compact('branches', 'employees', 'product'));
    }

    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('product.index');
    }

    public function edit(Product $product)
    {
        $branches = Branch::all();
        $employees = Employee::all();
        return view('products.edit', compact('branches', 'employees','product'));
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

    public function printByBranchForm()
        {
        
            $branches = Branch::all();
            return view('products.print_by_branch', compact('branches'));
        }
    public function printByBranch(Request $request)
    {
        $request->validate([
            'branch_id' => 'required|exists:branches,id', 
        ]);

        $branchId = $request->branch_id;
        $products = Product::with('branch', 'employee')
            ->where('branch_id', $branchId)
            ->get();

        if ($products->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada transaksi produk untuk cabang yang dipilih.');
        }

        $pdf = Pdf::loadView('products.pdf_by_branch', compact('products'));

        return $pdf->stream('product_branch_' . $branchId . '.pdf');
    }

}
