@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="glassmorphism-card p-4">
        <h2 class="fw-bold text-center text-dark mb-4">Add New Member</h2>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control glassmorphism-input" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control glassmorphism-input" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="gmail" class="form-label">Gmail</label>
                    <input type="email" class="form-control glassmorphism-input" id="gmail" name="gmail" value="{{ old('gmail') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control glassmorphism-input" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="date_join" class="form-label">Date Join</label>
                <input type="date" class="form-control glassmorphism-input" id="date_join" name="date_join" value="{{ old('date_join') }}" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Profile Image</label>
                <input type="file" class="form-control glassmorphism-input" id="image" name="image">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="is_active" value="1" id="is_active">
                <label class="form-check-label" for="is_active">Activated Member</label>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-2">
                    <i class="bi bi-person-plus-fill"></i> Add Member
                </button>
                <a href="{{ route('members.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-lg"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@include('layouts.footer')

<style>
    /* Background */
    body {
        background: #f8f9fa;
    }

    /* Glassmorphism Card */
    .glassmorphism-card {
        background: rgba(255, 255, 255, 0.6);
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(10px);
        max-width: 600px;
        width: 100%;
    }

    /* Input Field */
    .glassmorphism-input {
        background: rgba(255, 255, 255, 0.7);
        border: 1px solid rgba(0, 0, 0, 0.1);
        color: #333;
        padding: 10px;
        border-radius: 8px;
    }

    .glassmorphism-input:focus {
        background: rgba(255, 255, 255, 0.9);
        border: 1px solid #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }
</style>
@endsection
