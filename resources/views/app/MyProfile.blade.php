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
                <img src="{{ asset('images/profile.jpg') }}" alt="Profile Picture" class="profile-img">
            </div>
            
            <!-- Account Information Section -->
            <div class="right-section">
                <div class="account-info">
                    <h2>Account Information</h2>
                    <p class="contact-label">Contact Information</p>
                    <p class="contact-name">Alex Driver</p>
                    <p class="contact-email">ExampleAdress@gmail.com</p>
                    <div class="profile-actions">
                        <a href="#">Edit</a> |
                        <a href="#">Change Password</a>
                    </div>
                </div>

                <!-- Address Book Section -->
                <div class="address-book">
                    <h2>Address Book</h2>
                    <p class="address-label">Default Shipping Address</p>
                    <p class="address-info">You have not set a default shipping address.</p>
                    <div class="profile-actions">
                        <a href="#">Edit Address</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- My Orders Button -->
        <div class="orders-container">
            <a href="#" class="orders-btn">My Orders</a>
        </div>
    </div>
</div>
@stop
