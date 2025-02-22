<div class="mb-3">
    <label>First Name</label>
    <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $member->first_name ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Last Name</label>
    <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $member->last_name ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Email</label>
    <input type="email" name="gmail" class="form-control" value="{{ old('gmail', $member->gmail ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Phone Number</label>
    <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $member->phone_number ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Profile Image</label>
    <input type="file" name="image" class="form-control">
    @if (!empty($member) && $member->image)
        <img src="{{ asset('storage/' . $member->image) }}" width="100" class="mt-2">
    @endif
</div>
<div class="mb-3 form-check">
    <input type="checkbox" name="is_active" class="form-check-input" {{ old('is_active', $member->is_active ?? false) ? 'checked' : '' }}>
    <label class="form-check-label">Activate Membership</label>
</div>
<div class="mb-3">
    <label>Date Join</label>
    <input type="date" name="date_join" class="form-control" value="{{ old('date_join', $member->date_join ?? '') }}" required>
</div>

