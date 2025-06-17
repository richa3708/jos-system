@extends('layouts.app')
@section('content')
<h2>Add Type of Work</h2>
<form action="{{ route('type-of-works.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Rate</label>
        <input type="number" name="rate" class="form-control" step="0.01" required>
    </div>
    <button class="btn btn-success">Save</button>
</form>
@endsection
