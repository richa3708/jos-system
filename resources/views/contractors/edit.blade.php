@extends('layouts.app')
@section('content')
<h2>Edit Contractor</h2>
<form action="{{ route('contractors.update', $contractor->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $contractor->name }}" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $contractor->email }}" required>
    </div>
    <div class="mb-3">
        <label>Phone Number</label>
        <input type="text" name="phone_number" class="form-control" value="{{ $contractor->phone_number }}" required>
    </div>
    <div class="mb-3">
        <label>Company Name</label>
        <input type="text" name="company_name" class="form-control" value="{{ $contractor->company_name }}" required>
    </div>
    <div class="mb-3">
        <label>Balance</label>
        <input type="number" step="0.01" name="balance" class="form-control" value="{{ $contractor->balance }}">
    </div>
    <button class="btn btn-success">Update</button>
</form>
@endsection
