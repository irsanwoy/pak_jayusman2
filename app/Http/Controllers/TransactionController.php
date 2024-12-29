<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Branch;
use App\Models\Employee;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $branches = Branch::all();
        $employees = Employee::all();
        return view('transaction.create', compact('branches', 'employees'));
    }

    public function store(Request $request)
    {
        Transaction::create($request->all());
        return redirect()->route('transaction.index');
    }

    public function edit(Transaction $transaction)
    {
        $branches = Branch::all();
        $employees = Employee::all();
        return view('transaction.edit', compact('transaction', 'branches', 'employees'));
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
}
