@extends('layouts.master')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">
            Admin Dashboard – <span class="text-primary">{{ session('name') }}</span>
        </h2>
        <a href="/logout" class="btn btn-danger shadow-sm">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </div>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            <i class="bi bi-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger shadow-sm">
            <i class="bi bi-exclamation-circle"></i>
            {{ session('error') }}
        </div>
    @endif

    {{-- Complaints Table --}}
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Complaints List</h5>
        </div>

        <div class="card-body p-0">
            <table class="table table-hover table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>User</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Solved Date</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($complaints as $c)
                        <tr>
                            <td class="align-middle">{{ $c->name }}</td>

                            <td class="align-middle text-center">
                                @if($c->image)
                                    <img src="/storage/complaints/{{ $c->image }}"
                                         style="width: 80px; height: 80px; object-fit: cover;"
                                         class="rounded border shadow-sm">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>

                            <td class="align-middle">
                                <span class="badge 
                                    @if($c->status == 'pending') bg-warning text-dark
                                    @elseif($c->status == 'solved') bg-success
                                    @else bg-secondary @endif">
                                    {{ ucfirst($c->status) }}
                                </span>
                            </td>

                            <td class="align-middle">{{ $c->date }}</td>
                            <td class="align-middle">{{ $c->solved_date ?? '-' }}</td>

                            <td class="align-middle text-center">
                                <a href="/admin/complaints/{{ $c->id }}/edit" 
                                   class="btn btn-warning btn-sm shadow-sm">
                                    <i class="bi bi-pencil-square"></i> Update
                                </a>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                <i class="bi bi-info-circle"></i> No complaints found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</div>

@endsection
