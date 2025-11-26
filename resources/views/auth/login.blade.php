@extends('layouts.master')

@section('content')

<style>
    /* Background image */
    body {
        background: url('{{ asset("image/waste.jpg") }}') no-repeat center center fixed;
        background-size: cover;
        margin: 0;
        padding: 0;
        overflow-x: hidden;
        height: 100vh;
    }

    /* Center wrapper */
    .login-wrapper {
        max-width: 420px;
        margin: 80px auto;
        animation: fadeIn 0.9s ease-in-out;
    }

    /* Glass card */
    .login-card {
        padding: 30px;
        border-radius: 15px;
        backdrop-filter: blur(12px);
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.4);
        box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        animation: slideIn 0.9s ease-out;
    }

    /* Title */
    .login-title {
        font-size: 30px;
        font-weight: bold;
        text-align: center;
        color: #fff;
        margin-bottom: 20px;
        text-shadow: 0 3px 6px rgba(0,0,0,0.4);
    }

    /* Input fields */
    .form-control {
        border-radius: 10px;
        padding: 12px;
        border: none;
        font-size: 15px;
        box-shadow: 0 0 8px rgba(255,255,255,0.2);
    }

    .form-control:focus {
        box-shadow: 0 0 10px rgba(255,255,255,0.7);
        border: none;
        transition: 0.3s;
    }

    /* Button */
    .btn-login {
        width: 100%;
        padding: 12px;
        margin-top: 10px;
        font-size: 18px;
        font-weight: bold;
        border-radius: 10px;
        color: white;
        border: none;
        background: linear-gradient(90deg, #007bff, #559dff);
        transition: 0.3s;
    }

    .btn-login:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 14px rgba(0,0,0,0.3);
    }

    /* Flash messages */
    .alert {
        border-radius: 10px;
        text-align: center;
        font-weight: bold;
        box-shadow: 0 3px 10px rgba(0,0,0,0.3);
    }

    /* Animation */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideIn {
        from { transform: translateY(-25px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
nav { display: none !important; }

    /* Register link */
    .register-link {
        display: block;
        text-align: center;
        margin-top: 15px;
        color: #ffffff;
        font-weight: bold;
        text-decoration: none;
        text-shadow: 0 2px 4px rgba(0,0,0,0.5);
    }

    .register-link:hover {
        text-decoration: underline;
    }
</style>

<div class="login-wrapper">
    <div class="login-card">

        <h2 class="login-title">Login</h2>

        <!-- Flash messages -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Login Form -->
        <form action="/login" method="POST">
            @csrf

            <input type="text" name="name" placeholder="Name" class="form-control mb-3" required>

            <input type="email" name="email" placeholder="Email" class="form-control mb-3" required>

            <select name="role" class="form-control mb-3" required>
                <option value="">Select Role</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>

            <button class="btn btn-login">Login</button>
        </form>

        <a href="/register" class="register-link">Don't have an account? Register</a>

    </div>
</div>

@endsection
