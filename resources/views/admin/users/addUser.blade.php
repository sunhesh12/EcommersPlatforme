@extends('app.layouts.admin')

@section('content')
<div class="admin-form-container">
    <h2 class="admin-form-title">Add New User</h2>


    {{-- Display success message if user added successfully --}}
    @if (session('success'))
    <div class="admin-alert admin-alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Name input (Required) --}}
        <div class="admin-form-group">
            <input type="text" name="name" class="admin-input" value="{{ old('name') }}" placeholder="Enter your name" required>
        </div>

        {{-- Email input (Required) --}}
        <div class="admin-form-group">
            <input type="email" name="email" class="admin-input" value="{{ old('email') }}" placeholder="Enter your Email" required>
        </div>

        {{-- Password input (Required) --}}
        <div class="admin-form-group">
            <input type="password" name="password" class="admin-input" placeholder="Create Password" required>
        </div>

        {{-- Confirm Password input (Required) --}}
        <div class="admin-form-group">
            <input type="password" name="password_confirmation" class="admin-input" placeholder="Confirm Password" required>
        </div>

        {{-- Optional Profile Picture Upload --}}
        <div class="admin-form-group">
            <input type="file" name="profile_picture" class="admin-input admin-input-file">
        </div>

        {{-- Optional Inputs Below --}}
        <div class="admin-form-group">
            <input type="text" name="phone" class="admin-input" value="{{ old('phone') }}" placeholder="Phone">
        </div>

        <div class="admin-form-group">
            <input type="text" name="address" class="admin-input" value="{{ old('address') }}" placeholder="Address">
        </div>

        <div class="admin-form-group">
            <input type="text" name="city" class="admin-input" value="{{ old('city') }}" placeholder="City">
        </div>

        <div class="admin-form-group">
            <input type="text" name="state" class="admin-input" value="{{ old('state') }}" placeholder="State">
        </div>

        <div class="admin-form-group">
            <input type="text" name="country" class="admin-input" value="{{ old('country') }}" placeholder="Country">
        </div>

        <div class="admin-form-group">
            <input type="text" name="postal_code" class="admin-input" value="{{ old('postal_code') }}" placeholder="Postal Code">
        </div>

        {{-- This duplicate error block is not needed again – already handled at the top --}}
        {{--
        @if ($errors->any())
        <div class="admin-alert admin-alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
        @endforeach
        </ul>
</div>
@endif
--}}
{{-- Display all validation errors at the top of the form --}}
@if ($errors->any())
<div class="admin-alert admin-alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li> {{-- Each error from validation will show here --}}
        @endforeach
    </ul>
</div>
@endif

{{-- Submit button --}}
<div class="admin-form-group">
    <button type="submit" class="admin-submit-btn">Add User</button>
</div>
</form>
</div>
@endsection