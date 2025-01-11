<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use App\Models\Transaction;
use App\Models\Branch;
use App\Models\Product;
use App\Models\Employee;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class TransactionDetailController extends Controller
{
    public function index(Request $request)
{
    $query = TransactionDetail::with('transaction', 'product');
    $branches = Branch::all();

    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where('transaction_id', 'like', '%' . $search . '%')
              ->orWhereHas('product', function ($q) use ($search) {
                  $q->where('product_name', 'like', '%' . $search . '%');
              });
    }

    $transactionDetails = $query->paginate(5);

    return view('transactionDetail.index', compact('transactionDetails'));
}


    public function create()
    {
        $transactions = Transaction::all();
        $products = Product::all();
        $branches = Branch::all();
        $employees = Employee::all();
        return view('transactionDetail.create', compact('branches', 'employees','transactions', 'products'));
    }


public function store(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
    ]);


    $latestTransaction = Transaction::latest()->first();

    if (!$latestTransaction) {
        return redirect()->back()->withErrors(['error' => 'No transactions available.']);
    }

    $transactionId = $latestTransaction->id;

    $product = Product::find($request->product_id);

    if (!$product) {
        return redirect()->back()->withErrors(['error' => 'Product not found']);
    }

   
    if ($product->stock < $request->quantity) {
        return redirect()->back()->withErrors(['error' => 'Insufficient stock']);
    }

    $product->stock -= $request->quantity;
    $product->save();

    TransactionDetail::create([
        'transaction_id' => $transactionId,
        'product_id' => $request->product_id,
        'quantity' => $request->quantity,
        'price' => $product->price,
        'total_price' => $product->price * $request->quantity,
    ]);

    return redirect()->route('transactionDetail.index')->with('success', 'Transaction detail created successfully.');
}



    public function edit(TransactionDetail $transactionDetail)
    {
        $transactions = Transaction::all();
        $products = Product::all();
        $branches = Branch::all();
        $employees = Employee::all();
        return view('transactionDetail.edit', compact('transactionDetail', 'transactions', 'products', 'branches', 'employees'));
    }

    public function update(Request $request, TransactionDetail $transactionDetail)
    {
        $transactionDetail->update($request->all());
        return redirect()->route('transactionDetail.index');
    }

    public function destroy(TransactionDetail $transactionDetail)
    {
        $transactionDetail->delete();
        return redirect()->route('transactionDetail.index');
    }
    
    public function printDetail($id)
    {
     
        $transactionDetail = TransactionDetail::with('transaction', 'product')->findOrFail($id);

        $pdf = Pdf::loadView('transactionDetail.pdf', compact('transactionDetail'));

        return $pdf->stream('transactionDetail_' . $transactionDetail->id . '.pdf');
    }

    public function printAllDetails()
{
   
    $transactionDetails = TransactionDetail::with('transaction', 'product')->get();

    $pdf = Pdf::loadView('transactionDetail.pdf_all', compact('transactionDetails'));

    return $pdf->stream('all_transactionDetails.pdf');
}
public function printByBranchForm()
{
    $branches = Branch::all();
    return view('transactionDetail.print_by_branch', compact('branches'));
}

public function printByBranch(Request $request)
{
    $request->validate([
        'branch_id' => 'required|exists:branches,id', 
    ]);

    $branchId = $request->branch_id;
    $transactionDetails = TransactionDetail::with('branch', 'employee', 'transaction')
        ->where('branch_id', $branchId)
        ->get();

    if ($transactionDetails->isEmpty()) {
        return redirect()->back()->with('error', 'Tidak ada transaksi untuk cabang yang dipilih.');
    }

    $pdf = Pdf::loadView('transactionDetail.pdf_by_branch', compact('transactionDetails'));

    return $pdf->stream('transactionDetail_branch_' . $branchId . '.pdf');
}

}
