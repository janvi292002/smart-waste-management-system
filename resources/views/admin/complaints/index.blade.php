@extends('layouts.master')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">All Complaints</h2>
    </div>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger shadow-sm">
            <i class="bi bi-exclamation-circle"></i> {{ session('error') }}
        </div>
    @endif

    {{-- Complaints Table --}}
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Complaints List</h5>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-hover table-bordered mb-0 align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Solved Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($complaints as $complaint)
                        <tr>
                            <td>{{ $complaint->id }}</td>
                            <td>{{ $complaint->name }}</td>
                            <td>{{ $complaint->email ?? '-' }}</td>
                            <td>{{ $complaint->address }}</td>
                            <td>{{ $complaint->phone }}</td>
                            <td>{{ $complaint->date }}</td>
                            <td class="text-center">
                                @if($complaint->image)
                                    <img src="{{ asset('storage/complaints/'.$complaint->image) }}" 
                                         class="rounded shadow-sm border"
                                         style="width: 80px; height: 80px; object-fit: cover;">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge 
                                    @if($complaint->status == 'pending') bg-warning text-dark
                                    @elseif($complaint->status == 'done') bg-success
                                    @else bg-secondary @endif">
                                    {{ ucfirst($complaint->status) }}
                                </span>
                            </td>
                            <td>{{ $complaint->solved_date ?? '-' }}</td>
                            <td>
                                <a href="/admin/complaints/{{ $complaint->id }}/edit" 
                                   class="btn btn-sm btn-primary shadow-sm">
                                    <i class="bi bi-pencil-square"></i> Update
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center py-4 text-muted">
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
