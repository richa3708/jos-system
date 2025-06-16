<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to JOS System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            border-radius: 1rem;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container mt-5 text-center">
        <h1 class="mb-4">🗂️ Job Order Statement (JOS) System</h1>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-4">
                    <p class="lead mb-4">Welcome! Use the menu below to manage your data and generate statements.</p>

                    <div class="d-grid gap-3">
                        <a href="{{ route('type-of-works.index') }}" class="btn btn-outline-primary btn-lg">Manage Type of Work</a>
                        <a href="{{ route('contractors.index') }}" class="btn btn-outline-secondary btn-lg">Manage Contractors</a>
                        <a href="{{ route('conductors.index') }}" class="btn btn-outline-success btn-lg">Manage Conductors</a>
                        <a href="{{ route('job-orders.index') }}" class="btn btn-outline-warning btn-lg">Manage Job Orders</a>
                        <a href="{{ route('jos.index') }}" class="btn btn-outline-dark btn-lg">Generate/View JOS</a>
                    </div>
                </div>

                <footer class="mt-4 text-muted small">
                    <p>&copy; {{ date('Y') }} JOS System | Built with ❤️ by Richa Sharma</p>
                </footer>
            </div>
        </div>
    </div>
</body>
</html>
