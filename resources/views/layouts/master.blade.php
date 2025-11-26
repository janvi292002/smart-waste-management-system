<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Smart Waste Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
        <a class="navbar-brand" href="/"><h1>Smart Waste Management System</h1></a>
        <div class="ml-auto">
            @if(session('role'))
                <span class="me-3">Hello, {{ session('name') }}</span>
                <a href="/logout" class="btn btn-danger">Logout</a>
            @else
                <a href="/login" class="btn btn-primary me-2">Login</a>
                <a href="/register" class="btn btn-success">Register</a>
            @endif
        </div>
    </div>
</nav>

<div class="container">
    <!-- Alerts -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Page content -->
    @yield('content')
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
