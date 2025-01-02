<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;

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
        TransactionDetail::create($request->all());
        return redirect()->route('transactionDetail.index');
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
}
