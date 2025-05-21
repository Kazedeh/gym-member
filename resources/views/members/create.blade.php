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
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="first_name" class="form-label fw-semibold">First Name</label>
                    <input type="text" class="form-control glassmorphism-input @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                    @error('first_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="last_name" class="form-label fw-semibold">Last Name</label>
                    <input type="text" class="form-control glassmorphism-input @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                    @error('last_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="gmail" class="form-label fw-semibold">Gmail</label>
                    <input type="email" class="form-control glassmorphism-input @error('gmail') is-invalid @enderror" id="gmail" name="gmail" value="{{ old('gmail') }}" required>
                    @error('gmail')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="phone_number" class="form-label fw-semibold">Phone Number</label>
                    <input type="text" class="form-control glassmorphism-input @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
                    @error('phone_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="date_join" class="form-label fw-semibold">Date Join</label>
                <input type="date" class="form-control glassmorphism-input @error('date_join') is-invalid @enderror" id="date_join" name="date_join" value="{{ old('date_join') }}" required>
                @error('date_join')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="form-label fw-semibold">Profile Image</label>
                <input type="file" class="form-control glassmorphism-input @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check mb-4">
                <input type="checkbox" class="form-check-input" name="is_active" value="1" id="is_active" {{ old('is_active') ? 'checked' : '' }}>
                <label class="form-check-label fw-semibold" for="is_active">Activated Member</label>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-2">
                    <i class="bi bi-person-plus-fill me-1"></i> Add Member
                </button>
                <a href="{{ route('members.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-lg me-1"></i> Cancel
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
        transition: all 0.3s ease;
    }

    .glassmorphism-input:focus {
        background: rgba(255, 255, 255, 0.9);
        border: 1px solid #0d6efd;
        box-shadow: 0 0 8px rgba(13, 110, 253, 0.5);
        outline: none;
    }
</style>
@endsection
