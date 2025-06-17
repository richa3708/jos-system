@extends('layouts.app')
@section('content')
<h2>Edit Type of Work</h2>
<form action="{{ route('type-of-works.update', $typeOfWork->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $typeOfWork->name }}" required>
    </div>
    <div class="mb-3">
        <label>Rate</label>
        <input type="number" name="rate" class="form-control" step="0.01" value="{{ $typeOfWork->rate }}" required>
    </div>
    <button class="btn btn-success">Update</button>
</form>
@endsection
