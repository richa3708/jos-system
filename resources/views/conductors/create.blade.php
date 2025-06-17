@extends('layouts.app')
@section('content')
<h2>Add Conductor</h2>
<form action="{{ route('conductors.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>First Name</label>
        <input type="text" name="first_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Middle Name</label>
        <input type="text" name="middle_name" class="form-control">
    </div>
    <div class="mb-3">
        <label>Last Name</label>
        <input type="text" name="last_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email (optional)</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <label>Phone Number (optional)</label>
        <input type="text" name="phone_number" class="form-control">
    </div>
    <div class="mb-3">
        <label>Department Name</label>
        <input type="text" name="department_name" class="form-control" required>
    </div>
    <button class="btn btn-success">Save</button>
</form>
@endsection
