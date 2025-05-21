@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fw-bold text-dark mb-4 text-center">All Members</h2> 

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-hover table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Image</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $member->first_name }}</td>
                <td>{{ $member->last_name }}</td>
                <td>{{ $member->gmail }}</td>
                <td>{{ $member->phone_number }}</td>
                <td>
                    @if($member->image)
                        <img src="{{ asset('storage/' . $member->image) }}" alt="Member Image" class="img-thumbnail" width="50">
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    <span class="badge {{ $member->is_active ? 'bg-success' : 'bg-danger' }}">
                        {{ $member->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('members.show', $member->id) }}" class="btn btn-info btn-sm text-white">
                        <i class="bi bi-eye"></i> View
                    </a>
                    <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <form id="delete-form-{{ $member->id }}" action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $member->id }}">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('layouts.footer')

<!-- SweetAlert2 Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.btn-delete');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const memberId = this.getAttribute('data-id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + memberId).submit();
                }
            });
        });
    });
});
</script>

@endsection
