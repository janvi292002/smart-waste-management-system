@extends('layouts.master')

@section('content')

<style>
    body {
        background: url('/images/waste.jpg') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Poppins', sans-serif;
    }

    .complaints-container {
        max-width: 95%;
        margin: 40px auto;
        background: rgba(255, 255, 255, 0.85);
        padding: 30px;
        border-radius: 20px;
        backdrop-filter: blur(6px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        animation: fadeIn 1s ease-in-out;
    }

    h2 {
        text-align: center;
        font-weight: 700;
        margin-bottom: 20px;
        color: #1a237e;
        animation: slideDown 0.8s ease-out;
    }

    table {
        background: white;
        border-radius: 10px;
        overflow: hidden;
    }

    th {
        background: #1a237e !important;
        color: white !important;
        text-align: center;
    }

    td {
        vertical-align: middle !important;
        text-align: center;
    }

    tr:hover {
        background: #eef2ff !important;
        transition: 0.3s;
    }

    .btn-primary {
        background: #3949ab;
        border: none;
        font-weight: 600;
        border-radius: 10px;
        padding: 10px 18px;
        transition: .3s;
    }
    .btn-primary:hover {
        background: #1a237e;
        transform: scale(1.05);
    }

    .btn-danger {
        border-radius: 8px;
        transition: .3s;
    }
    .btn-danger:hover {
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

<div class="complaints-container">

<h2>Your Complaints</h2>

<!-- Alert messages -->
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<a href="/user/complaints/create" class="btn btn-primary mb-3">Create New Complaint</a>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Date</th>
            <th>Image</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @forelse($complaints as $complaint)
        <tr>
            <td>{{ $complaint->id }}</td>
            <td>{{ $complaint->name }}</td>
            <td>{{ $complaint->address }}</td>
            <td>{{ $complaint->phone }}</td>
            <td>{{ $complaint->date }}</td>
            <td>
                @if($complaint->image)
                    <img src="{{ asset('storage/complaints/'.$complaint->image) }}" width="80" class="rounded shadow">
                @endif
            </td>
            <td><span class="badge bg-info text-dark">{{ ucfirst($complaint->status) }}</span></td>
            <td>
                <form action="/user/complaints/{{ $complaint->id }}" method="POST" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" class="text-center">No complaints found.</td>
        </tr>
        @endforelse
    </tbody>

</table>

</div>

@endsection
