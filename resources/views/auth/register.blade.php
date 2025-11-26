@extends('layouts.master')

@section('content')

<style>
    nav { display: none !important; }

    /* Full background image */
    body {
        background: url('{{ asset("image/waste.jpg") }}') no-repeat center center fixed;
        background-size: cover;
        margin: 0;
        padding: 0;
        overflow-x: hidden;
        height: 100vh;
    }

    /* Wrapper for centering form */
    .register-wrapper {
        max-width: 420px;
        margin: 70px auto;
        animation: fadeIn 0.9s ease-in-out;
    }

    /* Glassmorphism card */
    .register-card {
        padding: 30px;
        border-radius: 15px;
        backdrop-filter: blur(12px);
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.4);
        box-shadow: 0 8px 25px rgba(0,0,0,0.35);
        animation: slideIn 0.9s ease-out;
    }

    /* Title */
    .register-title {
        font-size: 30px;
        font-weight: bold;
        text-align: center;
        color: #ffffff;
        margin-bottom: 20px;
        text-shadow: 0 3px 6px rgba(0,0,0,0.4);
    }

    /* Animations */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideIn {
        from { transform: translateY(-30px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    /* Input fields */
    .form-control {
        border-radius: 10px;
        padding: 12px;
        font-size: 15px;
        border: none;
        box-shadow: 0 0 8px rgba(255,255,255,0.2);
    }

    .form-control:focus {
        box-shadow: 0 0 10px rgba(255,255,255,0.7);
        border: none;
        transition: 0.3s;
    }

    /* Button */
    .btn-register {
        width: 100%;
        padding: 12px;
        font-size: 18px;
        font-weight: bold;
        border-radius: 10px;
        background: linear-gradient(90deg, #28a745, #5ad75f);
        border: none;
        color: white;
        transition: 0.3s;
    }

    .btn-register:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 14px rgba(0,0,0,0.25);
    }

    /* Login link */
    .login-link {
        display: block;
        text-align: center;
        margin-top: 15px;
        color: #ffffff;
        font-weight: bold;
        text-decoration: none;
        text-shadow: 0 2px 4px rgba(0,0,0,0.5);
    }
    .login-link:hover {
        text-decoration: underline;
    }

    /* Flash message */
    .alert {
        border-radius: 10px;
        text-align: center;
        font-weight: bold;
        box-shadow: 0 3px 10px rgba(0,0,0,0.3);
    }
</style>

<div class="register-wrapper">
    <div class="register-card">

        <h2 class="register-title">Create Account</h2>

        <!-- Flash alerts -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Registration Form -->
        <form action="/register" method="POST">
            @csrf

            <input type="text" name="name" class="form-control mb-3" placeholder="Enter your name" required>

            <input type="email" name="email" class="form-control mb-3" placeholder="Enter your email" required>

            <input type="password" name="password" class="form-control mb-3" placeholder="Create password" required>

            <button class="btn btn-register mt-2">Register</button>
        </form>

        <a href="/login" class="login-link">Already have an account? Login</a>

    </div>
</div>

@endsection
