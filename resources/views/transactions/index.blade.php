@extends('layouts.app')

@section('title', 'Transactions')

@section('content')
    <h1>Transactions</h1>
    @component('components.button', ['class' => 'btn-success', 'type' => 'button'])
        <a href="{{ url('/transaction/create') }}" class="text-white text-decoration-none">Add New Transaction</a>
    @endcomponent
    @component('components.table', ['headers' => ['ID', 'Transaction Date', 'Branch', 'Employee', 'Total', 'Actions']])
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->date }}</td>
                <td>{{ $transaction->branch->branch_name ?? 'N/A' }}</td>
                <td>{{ $transaction->employee->name ?? 'N/A' }}</td>
                <td>{{ $transaction->total }}</td>
                <td>
                    @component('components.button', ['class' => 'btn-warning'])
                        <a href="{{ url("/transaction/{$transaction->id}/edit") }}" class="text-white text-decoration-none">Edit</a>
                    @endcomponent
                    <!-- Form Delete -->
                    <form action="{{ route('transaction.destroy', $transaction->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    @endcomponent
@endsection
