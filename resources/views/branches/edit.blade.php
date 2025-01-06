@extends('layouts.app')

@section('title', 'Edit Branch')

@section('content')
    <h1>Edit Branch</h1>

    <form action="{{ route('branches.update', $branch->id) }}" method="POST">
        @csrf <!-- Token keamanan untuk mencegah CSRF -->
        @method('PUT') <!-- Metode HTTP PUT untuk update -->

        <div class="form-group">
            <label for="branch_name">Branch Name</label>
            <input 
                type="text" 
                name="branch_name" 
                id="branch_name" 
                class="form-control" 
                placeholder="Enter branch name" 
                value="{{ old('branch_name', $branch->branch_name) }}" 
                required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea 
                name="address" 
                id="address" 
                class="form-control" 
                rows="3" 
                placeholder="Enter address" 
                required>{{ old('address', $branch->address) }}</textarea>
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input 
                type="text" 
                name="city" 
                id="city" 
                class="form-control" 
                placeholder="Enter city" 
                value="{{ old('city', $branch->city) }}" 
                required>
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="{{ route('branches.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
