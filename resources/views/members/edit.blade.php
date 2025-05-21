@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="fw-bold text-primary mb-4 text-center">Edit Member</h2>

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

    <div class="card shadow-sm border-0 rounded-4 p-4 mx-auto" style="max-width: 700px;">
        <form action="{{ route('members.update', $member->id) }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            @method('PUT')

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label for="first_name" class="form-label fw-semibold">First Name</label>
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" 
                        value="{{ old('first_name', $member->first_name) }}" required placeholder="Enter first name">
                    @error('first_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="last_name" class="form-label fw-semibold">Last Name</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" 
                        value="{{ old('last_name', $member->last_name) }}" required placeholder="Enter last name">
                    @error('last_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label for="gmail" class="form-label fw-semibold">Email (Gmail)</label>
                    <input type="email" class="form-control @error('gmail') is-invalid @enderror" id="gmail" name="gmail" 
                        value="{{ old('gmail', $member->gmail) }}" required placeholder="example@gmail.com">
                    @error('gmail')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="phone_number" class="form-label fw-semibold">Phone Number</label>
                    <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" 
                        value="{{ old('phone_number', $member->phone_number) }}" required placeholder="+62...">
                    @error('phone_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="date_join" class="form-label fw-semibold">Date Joined</label>
                <input type="date" class="form-control @error('date_join') is-invalid @enderror" id="date_join" name="date_join" 
                    value="{{ old('date_join', $member->date_join) }}" required>
                @error('date_join')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="form-label fw-semibold">Profile Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                @if ($member->image)
                    <div class="mt-3 d-flex align-items-center gap-3">
                        <img src="{{ asset('storage/' . $member->image) }}" alt="Member Image" class="img-thumbnail rounded" style="width: 120px; height: auto; object-fit: cover;">
                        <span class="text-muted fst-italic">Current Profile Image</span>
                    </div>
                @endif
            </div>

            <div class="form-check form-switch mb-4">
                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ $member->is_active ? 'checked' : '' }}>
                <label class="form-check-label fw-semibold" for="is_active">Activated Member</label>
            </div>

            <div class="d-flex justify-content-center gap-3">
                <button type="submit" class="btn btn-primary px-4">
                    <i class="bi bi-check-circle me-2"></i> Update Member
                </button>
                <a href="{{ route('members.index') }}" class="btn btn-outline-secondary px-4">
                    <i class="bi bi-x-circle me-2"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@include('layouts.footer')
@endsection
