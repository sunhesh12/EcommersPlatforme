@extends('app.layouts.main')
@section('content')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<div>
    <div class="profile-body">
        <div class="changepassword-container">
            <h2>Change Password</h2>

            <form method="POST" action="{{ route('user.update-password') }}">
                @csrf
                <label>Current Password</label><br>
                <input type="password" name="current_password" required><br><br>

                <label>New Password</label><br>
                <input type="password" name="new_password" required><br><br>

                <label>Confirm New Password</label><br>
                <input type="password" name="new_password_confirmation" required><br><br>
                @if(session('success'))
            <div style="color: green;">{{ session('success') }}</div>
            @endif

            @if($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
                <button type="submit" class="updatePssword">Update Password</button>
            </form>
        </div>
    </div>
</div>
@endsection