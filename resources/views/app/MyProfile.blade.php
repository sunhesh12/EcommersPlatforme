@extends('app.layouts.main')
@section('content')

<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<div>
    <div class="profile-body">
        <div class="profile-container">
            <!-- Profile Image Section -->
            <div class="left-section">
                <div class="breadcrumb text-sm text-gray-500 mb-4">
                    Home &gt; <span class="text-black">My Dashboard</span>
                </div>
                <h1>My Profile</h1>
                <img src="{{ asset($user->profile_picture) }}" alt="Profile Picture" class="profile-img" width="150" height="150">
            </div>

            <!-- Account Information Section -->
            <div class="right-section">
                <div class="account-info">
                    <h2>Account Information</h2>
                    <p class="contact-label">Contact Information</p>
                    <p class="contact-name">{{ $user->name }}</p>
                    <p class="contact-email">{{ $user->email }}</p>
                    <div class="profile-actions">
                        <a href="{{ route('user.my-profile.edit', $user->id) }}">Edit</a> |
                        <a href="#">Change Password</a>
                    </div>
                </div>

                <!-- Address Book Section -->
                <div class="address-book">
                    <h2>Address Book</h2>
                    <p class="address-label">Default Shipping Address</p>
                    @if (!empty($user->address))
                    <p class="address-info">{{ $user->address }}</p>
                    <p class="address-info">{{ $user->city }}</p>
                    <p class="address-info">{{ $user->country }}</p>
                    <p class="address-info">{{ $user->state }}</p>
                    
                    @else
                    <p class="address-name">You have not set a default shipping address.</p>
                    @endif

                    @if (!empty($user->phone))
                    <p class="address-info">{{ $user->phone }}</p>
                    @else
                    <p class="address-name">You have not set a default phone number.</p>
                    @endif
                    <div class="profile-actions">
                        <a href="{{ route('user.my-profile.edit', $user->id) }}">Edit Address</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- My Orders Button -->
        <div class="orders-container">
            <a href="{{ route('user.cart') }}" class="orders-btn">My Orders</a>
        </div>
    </div>
</div>
@stop