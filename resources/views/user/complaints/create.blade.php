@extends('layouts.master')

@section('content')

<style>
    body {
        background: url('/images/waste.jpg') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Poppins', sans-serif;
    }

    .complaint-container {
        max-width: 450px;
        margin: 60px auto;
        background: rgba(255, 255, 255, 0.88);
        padding: 35px;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        animation: fadeIn 1s ease-in-out;
        backdrop-filter: blur(4px);
    }

    h2 {
        text-align: center;
        font-weight: 700;
        margin-bottom: 20px;
        color: #1a237e;
        animation: slideDown 0.8s ease-out;
    }

    input, select {
        border-radius: 10px !important;
        padding: 12px !important;
    }

    .btn-primary {
        width: 100%;
        padding: 12px;
        border-radius: 12px;
        font-weight: 600;
        background: #3949ab;
        border: none;
        transition: 0.3s;
    }

    .btn-primary:hover {
        background: #1a237e;
        transform: scale(1.05);
    }

    /* Animations */
    @keyframes fadeIn {
        from {opacity: 0; transform: translateY(20px);}
        to {opacity: 1; transform: translateY(0);}
    }

    @keyframes slideDown {
        from {opacity: 0; transform: translateY(-20px);}
        to {opacity: 1; transform: translateY(0);}
    }
</style>

<div class="complaint-container">

<h2>Create Complaint</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form action="/user/complaints" method="POST" enctype="multipart/form-data">
@csrf

<input class="form-control mb-3" name="name" placeholder="Name">
<input class="form-control mb-3" name="address" placeholder="Address">
<input class="form-control mb-3" name="phone" placeholder="Phone">
<input type="date" class="form-control mb-3" name="date">
<input type="file" class="form-control mb-3" name="image">

<button class="btn btn-primary">Submit</button>

</form>

</div>

@endsection
