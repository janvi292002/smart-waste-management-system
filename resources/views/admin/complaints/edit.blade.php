@extends('layouts.master')

@section('content')
<div class="container mt-4" style="max-width: 600px;">

    <h2 class="mb-4 text-primary">Update Complaint</h2>

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

    {{-- Complaint Image --}}
    @if($complaint->image)
        <div class="mb-3 text-center">
            <img src="/storage/complaints/{{ $complaint->image }}" 
                 class="rounded shadow-sm border" 
                 style="width: 200px; height: 200px; object-fit: cover;">
        </div>
    @endif

    <form action="/admin/complaints/{{ $complaint->id }}/update" method="POST">
        @csrf

        {{-- Status Select --}}
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status" id="status">
                <option value="pending" {{ $complaint->status=='pending'?'selected':'' }}>Pending</option>
                <option value="done" {{ $complaint->status=='done'?'selected':'' }}>Done</option>
            </select>
        </div>

        {{-- Solved Date --}}
        <div class="mb-3">
            <label for="solved_date" class="form-label">Solved Date</label>
            <input type="date" class="form-control" name="solved_date" id="solved_date" 
                   value="{{ $complaint->solved_date ?? '' }}">
        </div>

        {{-- Submit Button --}}
        <div class="d-grid">
            <button type="submit" class="btn btn-success btn-lg shadow-sm">
                <i class="bi bi-check-circle"></i> Update Complaint
            </button>
        </div>

    </form>
</div>
@endsection
