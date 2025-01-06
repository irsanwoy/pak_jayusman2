<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class TransactionDetailController extends Controller
{
    public function index()
    {
        $transactionDetails = TransactionDetail::all();
        return view('transactionDetail.index', compact('transactionDetails'));
    }

    public function create()
    {
        $transactions = Transaction::all();
        $products = Product::all();
        return view('transactionDetail.create', compact('transactions', 'products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);
    
        // Ambil transaction_id secara otomatis
        $transactionId = Transaction::latest()->first()->id; // Contoh: ambil ID transaksi terbaru
    
        // Simpan detail transaksi
        TransactionDetail::create([
            'transaction_id' => $transactionId,
            'product_id' => $validated['product_id'],
            'quantity' => $validated['quantity'],
            'price' => $validated['price'],
        ]);
    
        return redirect()->route('transactionDetail.index')->with('success', 'Transaction detail created successfully!');
    }

    public function edit(TransactionDetail $transactionDetail)
    {
        $transactions = Transaction::all();
        $products = Product::all();
        return view('transactionDetail.edit', compact('transactionDetail', 'transactions', 'products'));
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
        // Ambil data detail transaksi berdasarkan ID
        $transactionDetail = TransactionDetail::with('transaction', 'product')->findOrFail($id);

        // Generate PDF menggunakan view Blade
        $pdf = Pdf::loadView('transactionDetail.pdf', compact('transactionDetail'));

        // Unduh atau tampilkan file PDF
        return $pdf->stream('transactionDetail_' . $transactionDetail->id . '.pdf');
    }

    public function printAllDetails()
{
    // Ambil semua data detail transaksi
    $transactionDetails = TransactionDetail::with('transaction', 'product')->get();

    // Generate PDF menggunakan view Blade
    $pdf = Pdf::loadView('transactionDetail.pdf_all', compact('transactionDetails'));

    // Tampilkan atau unduh file PDF
    return $pdf->stream('all_transactionDetails.pdf');
}


}
