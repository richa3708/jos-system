@extends('layouts.app')
@section('content')
<h2>Add Contractor</h2>
<form action="{{ route('contractors.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Phone Number</label>
        <input type="text" name="phone_number" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Company Name</label>
        <input type="text" name="company_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Balance</label>
        <input type="number" step="0.01" name="balance" class="form-control">
    </div>
    <button class="btn btn-success">Save</button>
</form>
@endsection
