@extends('layouts.app')
@section('content')
<h2>Edit Conductor</h2>
<form action="{{ route('conductors.update', $conductor->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>First Name</label>
        <input type="text" name="first_name" class="form-control" value="{{ $conductor->first_name }}" required>
    </div>
    <div class="mb-3">
        <label>Middle Name</label>
        <input type="text" name="middle_name" class="form-control" value="{{ $conductor->middle_name }}">
    </div>
    <div class="mb-3">
        <label>Last Name</label>
        <input type="text" name="last_name" class="form-control" value="{{ $conductor->last_name }}" required>
    </div>
    <div class="mb-3">
        <label>Email (optional)</label>
        <input type="email" name="email" class="form-control" value="{{ $conductor->email }}">
    </div>
    <div class="mb-3">
        <label>Phone Number (optional)</label>
        <input type="text" name="phone_number" class="form-control" value="{{ $conductor->phone_number }}">
    </div>
    <div class="mb-3">
        <label>Department Name</label>
        <input type="text" name="department_name" class="form-control" value="{{ $conductor->department_name }}" required>
    </div>
    <button class="btn btn-success">Update</button>
</form>
@endsection
