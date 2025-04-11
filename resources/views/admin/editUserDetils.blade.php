@extends('app.layouts.admin')

@section('content')
<div class="admin-form-container">
    <h2 class="admin-form-title">Edit User</h2>

    @if ($errors->any())
    <div class="admin-alert admin-alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('success'))
    <div class="admin-alert admin-alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="admin-form-group">
            <label for="is_admin">User Name</label>
            <input type="text" name="name" class="admin-input" value="{{ old('name', $user->name) }}" placeholder="Enter your name" required>
        </div>

        <div class="admin-form-group">
            <label for="is_admin">User Role</label>
            <select name="is_admin" class="admin-input" required>
                <option value="0" {{ old('is_admin', $user->is_admin) == 0 ? 'selected' : '' }}>User</option>
                <option value="1" {{ old('is_admin', $user->is_admin) == 1 ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <div class="admin-form-group">
            <label for="is_admin">User Email</label>
            <input type="email" name="email" class="admin-input" value="{{ old('email', $user->email) }}" placeholder="Enter your Email" required>
        </div>

        <div class="admin-form-group">
            <label for="is_admin">User Phone number</label>
            <input type="text" name="phone" class="admin-input" value="{{ old('phone', $user->phone) }}" placeholder="Phone">
        </div>

        <div class="admin-form-group">
            <label for="is_admin">User Address</label>
            <input type="text" name="address" class="admin-input" value="{{ old('address', $user->address) }}" placeholder="Address">
        </div>

        <div class="admin-form-group">
            <label for="is_admin">User City</label>
            <input type="text" name="city" class="admin-input" value="{{ old('city', $user->city) }}" placeholder="City">
        </div>

        <div class="admin-form-group">
            <label for="is_admin">User State</label>
            <input type="text" name="state" class="admin-input" value="{{ old('state', $user->state) }}" placeholder="State">
        </div>

        <div class="admin-form-group">
            <label for="is_admin">User Country</label>
            <input type="text" name="country" class="admin-input" value="{{ old('country', $user->country) }}" placeholder="Country">
        </div>

        <div class="admin-form-group">
            <label for="is_admin">User Postal Code</label>
            <input type="text" name="postal_code" class="admin-input" value="{{ old('postal_code', $user->postal_code) }}" placeholder="Postal Code">
        </div>

        <div class="admin-form-group">
            <label>Profile Picture (Optional)</label>
            <input type="file" name="profile_picture" class="admin-input admin-input-file">
            @if ($user->profile_picture)
            <img src="{{ asset($user->profile_picture) }}" width="100" class="mt-2">
            @endif
        </div>

        <div class="admin-form-group">
            <button type="submit" class="admin-submit-btn">Update User</button>
        </div>
    </form>
</div>
@endsection