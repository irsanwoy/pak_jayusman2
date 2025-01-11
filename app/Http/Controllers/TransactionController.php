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
        $branches = Branch::all();
   
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
    
        if ($request->has('branch_id') && $request->branch_id != '') {
            $query->where('branch_id', $request->branch_id);
        }
    
        $transactions = $query->paginate(5);

    
        return view('transactions.index', compact('transactions', 'branches'));
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

    dd([
        'Product ID' => $product->id,
        'Stock Sebelum' => $product->stock,
        'Quantity Request' => $request->quantity,
    ]);

    $product->stock -= $request->quantity;
    $product->save();

  
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

    $transaction = Transaction::with('branch', 'employee', 'transactionDetails')->findOrFail($id);

    $pdf = Pdf::loadView('transactions.pdf', compact('transaction'));

    return $pdf->stream('transaction_' . $transaction->id . '.pdf');
}

public function printAllTransactions()
{
    
    $transactions = Transaction::with('branch', 'employee')->get();

    $pdf = Pdf::loadView('transactions.pdf_all', compact('transactions'));

    return $pdf->stream('all_transactions.pdf');
}

public function printByBranchForm()
{
    $branches = Branch::all();
    return view('transactions.print_by_branch', compact('branches'));
}

public function printByBranch(Request $request)
{
    $request->validate([
        'branch_id' => 'required|exists:branches,id',
    ]);

    $branchId = $request->branch_id;
    $transactions = Transaction::with('branch', 'employee', 'transactionDetails')
        ->where('branch_id', $branchId)
        ->get();

    if ($transactions->isEmpty()) {
        return redirect()->back()->with('error', 'Tidak ada transaksi untuk cabang yang dipilih.');
    }

    $pdf = Pdf::loadView('transactions.pdf_by_branch', compact('transactions'));

    return $pdf->stream('transactions_branch_' . $branchId . '.pdf');
}

}
