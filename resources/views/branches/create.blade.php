@extends('layouts.app')

@section('title', 'Create New Branch')

@section('content')
    <h1>Create New Branch</h1>

    <form action="{{ route('branch.store') }}" method="POST">
        @csrf <!-- Token keamanan untuk mencegah CSRF -->

        <div class="form-group">
            <label for="branch_name">Branch Name</label>
            <input type="text" name="branch_name" id="branch_name" class="form-control" placeholder="Enter branch name" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" id="address" class="form-control" rows="3" placeholder="Enter address" required></textarea>
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" id="city" class="form-control" placeholder="Enter city" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('branch.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
