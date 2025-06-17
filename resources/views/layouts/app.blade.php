<!DOCTYPE html>
<html>
<head>
    <title>JOS System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <nav class="mb-4">
        <a href="/">Home</a> |
        <a href="{{ route('type-of-works.index') }}">Type of Works</a> |
        <a href="{{ route('contractors.index') }}">Contractors</a> |
        <a href="{{ route('conductors.index') }}">Conductors</a> |
        <a href="{{ route('job-orders.index') }}">Job Orders</a> |
        <a href="{{ route('jos.index') }}">JOS</a>
    </nav>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @yield('content')

</div>
</body>
</html>
