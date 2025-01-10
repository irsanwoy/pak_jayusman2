<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class TransactionDetailController extends Controller
{
    public function index(Request $request)
{
    $query = TransactionDetail::with('transaction', 'product');

    // Search functionality
    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where('transaction_id', 'like', '%' . $search . '%')
              ->orWhereHas('product', function ($q) use ($search) {
                  $q->where('product_name', 'like', '%' . $search . '%');
              });
    }

    // Pagination
    $transactionDetails = $query->paginate(5);

    return view('transactionDetail.index', compact('transactionDetails'));
}


    public function create()
    {
        $transactions = Transaction::all();
        $products = Product::all();
        return view('transactionDetail.create', compact('transactions', 'products'));
    }

//     public function store(Request $request)
// {
//     $request->validate([
//         'product_id' => 'required|exists:products,id',
//         'quantity' => 'required|integer|min:1',
//     ]);

//     // Ambil data produk berdasarkan ID
//     $product = Product::find($request->product_id);

//     // Pastikan produk ditemukan
//     if (!$product) {
//         return redirect()->back()->withErrors(['error' => 'Product not found']);
//     }

//     // Cek stok apakah mencukupi
//     if ($product->stock < $request->quantity) {
//         return redirect()->back()->withErrors(['error' => 'Stok produk tidak mencukupi']);
//     }

//     // Kurangi stok produk
//     $product->stock -= $request->quantity;
//     $product->save();

//     // Simpan detail transaksi
//     TransactionDetail::create([
//         'product_id' => $request->product_id,
//         'quantity' => $request->quantity,
//         'price' => $product->price,
//         'total_price' => $product->price * $request->quantity,
//     ]);

//     return redirect()->route('transactionDetail.index')->with('success', 'Transaksi berhasil dibuat dan stok berkurang.');
// }
public function store(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
    ]);

    // Ambil transaksi terbaru (atau logika lain untuk menentukan ID)
    $latestTransaction = Transaction::latest()->first();

    if (!$latestTransaction) {
        return redirect()->back()->withErrors(['error' => 'No transactions available.']);
    }

    $transactionId = $latestTransaction->id;

    // Ambil data produk berdasarkan ID
    $product = Product::find($request->product_id);

    if (!$product) {
        return redirect()->back()->withErrors(['error' => 'Product not found']);
    }

    // Cek stok apakah mencukupi
    if ($product->stock < $request->quantity) {
        return redirect()->back()->withErrors(['error' => 'Insufficient stock']);
    }

    // Kurangi stok produk
    $product->stock -= $request->quantity;
    $product->save();

    // Simpan detail transaksi dengan transaction_id otomatis
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
update