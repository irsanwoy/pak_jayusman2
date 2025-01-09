<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Branch;
use App\Models\Product;
use App\Models\Employee;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaction::query();
    
        // Search functionality
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('id', 'like', '%' . $search . '%')
                  ->orWhere('date', 'like', '%' . $search . '%')
                  ->orWhere('total', 'like', '%' . $search . '%')
                  ->orWhereHas('branch', function ($q) use ($search) {
                      $q->where('branch_name', 'like', '%' . $search . '%');
                  })
                  ->orWhereHas('employee', function ($q) use ($search) {
                      $q->where('name', 'like', '%' . $search . '%');
                  });
        }
    
        // Pagination
        $transactions = $query->paginate(5);
    
        return view('transactions.index', compact('transactions'));
    }
    

    public function create()
    {
        $branches = Branch::all();
        $employees = Employee::all();
        return view('transactions.create', compact('branches', 'employees'));
    }

    public function store(Request $request)
{
    $request->validate([
        'id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
    ]);

    $product = Product::find($request->id);

    if (!$product) {
        dd('Product not found');
    }

    if ($product->stock < $request->quantity) {
        return redirect()->back()->withErrors(['error' => 'Stok tidak mencukupi']);
    }

    // Debug sebelum mengurangi stok
    dd([
        'Product ID' => $product->id,
        'Stock Sebelum' => $product->stock,
        'Quantity Request' => $request->quantity,
    ]);

    $product->stock -= $request->quantity;
    $product->save();

    // Debug setelah mengurangi stok
    if ($product->wasChanged('stock')) {
        dd('Stok berhasil dikurangi');
    } else {
        dd('Stok gagal diperbarui');
    }

    Transaction::create([
        'product_id' => $request->id,
        'quantity' => $request->quantity,
    ]);

    return redirect()->route('transaction.index')->with('success', 'Transaksi berhasil!');
}



    public function edit(Transaction $transaction)
    {
        $branches = Branch::all();
        $employees = Employee::all();
        return view('transactions.edit', compact('transaction', 'branches', 'employees'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $transaction->update($request->all());
        return redirect()->route('transaction.index');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transaction.index');
    }

    public function printTransaction($id)
{
    // Ambil data transaksi berdasarkan ID
    $transaction = Transaction::with('branch', 'employee', 'transactionDetails')->findOrFail($id);

    // Generate PDF menggunakan view Blade
    $pdf = Pdf::loadView('transactions.pdf', compact('transaction'));

    // Unduh atau tampilkan file PDF
    return $pdf->stream('transaction_' . $transaction->id . '.pdf');
}

public function printAllTransactions()
{
    // Ambil semua data transaksi
    $transactions = Transaction::with('branch', 'employee')->get();

    // Generate PDF menggunakan view Blade
    $pdf = Pdf::loadView('transactions.pdf_all', compact('transactions'));

    // Unduh atau tampilkan file PDF
    return $pdf->stream('all_transactions.pdf');
}

}
