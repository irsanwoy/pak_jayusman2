@extends('layouts.app')

@section('title', 'Transactions')

@section('content')
    <h1>Transactions</h1>
    @component('components.button', ['class' => 'btn-success', 'type' => 'button'])
        <a href="{{ url('/transactions/create') }}" class="text-white text-decoration-none">Add New Transaction</a>
    @endcomponent
    @component('components.table', ['headers' => ['ID', 'Transaction Date', 'Branch']])
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->transaction_date }}</td>
                <td>{{ $transaction->branch->branch_name }}</td>
                <td>
                    @component('components.button', ['class' => 'btn-warning'])
                        <a href="{{ url("/transactions/{$transaction->id}/edit") }}" class="text-white text-decoration-none">Edit</a>
                    @endcomponent
                    @component('components.button', ['class' => 'btn-danger', 'onclick' => "deleteTransaction({{ $transaction->id }})"])
                        Delete
                    @endcomponent
                </td>
            </tr>
        @endforeach
    @endcomponent
@endsection
