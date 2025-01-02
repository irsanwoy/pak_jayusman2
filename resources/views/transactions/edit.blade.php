@extends('layouts.app')

@section('title', 'Edit Transaction')

@section('content')
    <h1>Edit Transaction</h1>

    <!-- Menampilkan pesan error validasi -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Edit Transaksi -->
    <form action="{{ route('transaction.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="date" class="form-label">Transaction Date</label>
            <input type="date" id="date" name="date" class="form-control" value="{{ old('date', $transaction->date) }}" required>
        </div>

        <div class="mb-3">
            <label for="branch_id" class="form-label">Branch</label>
            <select id="branch_id" name="branch_id" class="form-select" required>
                <option value="">Select Branch</option>
                @foreach ($branches as $branch)
                    <option value="{{ $branch->id }}" {{ old('branch_id', $transaction->branch_id) == $branch->id ? 'selected' : '' }}>
                        {{ $branch->branch_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="employee_id" class="form-label">Employee</label>
            <select id="employee_id" name="employee_id" class="form-select" required>
                <option value="">Select Employee</option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}" {{ old('employee_id', $transaction->employee_id) == $employee->id ? 'selected' : '' }}>
                        {{ $employee->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="total" class="form-label">Total Amount</label>
            <input type="number" step="0.01" id="total" name="total" class="form-control" value="{{ old('total', $transaction->total) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Transaction</button>
        <a href="{{ route('transaction.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
