@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card border-0 shadow-lg p-4 rounded-4" 
        style="backdrop-filter: blur(15px); background: rgba(255, 255, 255, 0.2); max-width: 600px; width: 100%;">
        
        <div class="text-center">
            @if ($member->image)
                <img src="{{ asset('storage/' . $member->image) }}" 
                    alt="Member Image" 
                    class="img-fluid rounded-circle shadow-sm"
                    style="width: 120px; height: 120px; object-fit: cover;">
            @else
                <p class="text-muted">No Image Available</p>
            @endif
            <h4 class="fw-bold mt-3 text-dark">{{ $member->first_name }} {{ $member->last_name }}</h4>
            <span class="badge {{ $member->is_active ? 'bg-success' : 'bg-danger' }} px-3 py-2">
                {{ $member->is_active ? 'Active' : 'Inactive' }}
            </span>
        </div>

        <div class="mt-4">
            <ul class="list-group list-group-flush">
                <li class="list-group-item bg-transparent"><strong>Email:</strong> {{ $member->gmail }}</li>
                <li class="list-group-item bg-transparent"><strong>Phone:</strong> {{ $member->phone_number }}</li>
                <li class="list-group-item bg-transparent"><strong>Date Joined:</strong> 
                    {{ \Carbon\Carbon::parse($member->date_join)->format('d M Y') }}
                </li>
            </ul>
        </div>

        <!-- Tombol Aksi -->
        <div class="mt-4 d-flex justify-content-center">
            <a href="{{ route('members.index') }}" class="btn btn-outline-dark me-2">
                <i class="bi bi-arrow-left-circle"></i> Back
            </a>
            <a href="{{ route('members.edit', $member->id) }}" class="btn btn-dark">
                <i class="bi bi-pencil"></i> Edit
            </a>
        </div>
    </div>
</div>

@include('layouts.footer')
@endsection
