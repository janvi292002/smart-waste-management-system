@extends('layouts.master')

@section('content')

<style>
    /* Full background image */
    body {
        background: url('{{ asset("image/waste.jpg") }}') no-repeat center center fixed;
        background-size: cover;
        margin: 0;
        padding: 0;
        overflow-x: hidden;
        height: 100vh;
    }

    /* Glass container */
    .dashboard-container {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(12px);
        border-radius: 15px;
        padding: 25px;
        margin-top: 40px;
        animation: fadeIn 1s ease-in-out;
        box-shadow: 0 8px 25px rgba(0,0,0,0.3);
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Dashboard Header */
    .dashboard-header {
        background: linear-gradient(90deg, #0055ff, #00bfff);
        padding: 15px 20px;
        border-radius: 12px;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        animation: slideDown 0.9s ease-out;
    }

    @keyframes slideDown {
        from { transform: translateY(-25px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    /* Table Styling */
    table {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.25);
    }

    th {
        background-color: #0056b3;
        color: white;
        text-align: center;
        padding: 12px;
        font-size: 17px;
    }

    td {
        background: rgba(255, 255, 255, 0.85);
        text-align: center;
        vertical-align: middle;
        font-weight: 500;
    }

    tr:hover td {
        background: rgba(230, 245, 255, 0.8);
        transition: 0.3s;
    }

    /* Buttons */
    .btn-primary, .btn-danger {
        border-radius: 30px;
        font-weight: bold;
        padding-left: 20px;
        padding-right: 20px;
    }

    .btn-primary:hover,
    .btn-danger:hover {
        transform: scale(1.07);
        transition: 0.25s;
    }

    /* Badge */
    .badge {
        font-size: 14px;
        padding: 8px 12px;
        border-radius: 20px;
    }

    /* Flash Messages */
    .alert {
        border-radius: 10px;
        font-weight: bold;
        box-shadow: 0 4px 12px rgba(0,0,0,0.25);
    }
</style>

<div class="dashboard-container container">

    <!-- HEADER -->
    {{-- <div class="dashboard-header mb-4">
        <h2 class="m-0">User Dashboard - {{ session('name') }}</h2>
        <a href="/logout" class="btn btn-danger px-4">Logout</a>
    </div> --}}

    <!-- FLASH MESSAGES -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- ADD COMPLAINT BUTTON -->
    <div class="text-end mb-3">
        <a href="/user/complaints/create" class="btn btn-primary btn-lg">➕ Add Complaint</a>
    </div>

    <!-- TABLE -
