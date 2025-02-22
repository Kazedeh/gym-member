@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fw-bold text-primary mb-4">Edit Member</h2>

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

    <div class="card shadow-sm p-4">
        <form action="{{ route('members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="first_name" class="form-label fw-semibold">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $member->first_name) }}" required>
                </div>
                <div class="col-md-6">
                    <label for="last_name" class="form-label fw-semibold">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $member->last_name) }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="gmail" class="form-label fw-semibold">Gmail</label>
                    <input type="email" class="form-control" id="gmail" name="gmail" value="{{ old('gmail', $member->gmail) }}" required>
                </div>
                <div class="col-md-6">
                    <label for="phone_number" class="form-label fw-semibold">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $member->phone_number) }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="date_join" class="form-label fw-semibold">Date Join</label>
                <input type="date" class="form-control" id="date_join" name="date_join" value="{{ old('date_join', $member->date_join) }}" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label fw-semibold">Profile Image</label>
                <input type="file" class="form-control" id="image" name="image">
                @if ($member->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $member->image) }}" alt="Member Image" class="img-thumbnail rounded" width="150">
                    </div>
                @endif
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="is_active" value="1" id="is_active" 
                    {{ $member->is_active ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Activated Member</label>
            </div>

            <div class="d-flex">
                <button type="submit" class="btn btn-primary me-2">
                    <i class="bi bi-check-circle"></i> Update Member
                </button>
                <a href="{{ route('members.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-circle"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@include('layouts.footer')
@endsection
