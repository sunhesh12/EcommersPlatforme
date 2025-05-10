

@extends('app.layouts.main')

@section('content')
<div class="checkout-success-container">
    <div class="success-card">
        <img src="{{ asset('icon/upuTracking.webp') }}" alt="logo" class="logo" width="100px" height="100px">
        <img src="{{ asset('icon/logo.png') }}" alt="logo" class="logo" width="100px" height="100px">
        <div class="success-header">
            <h1>Thank You For Your Purchase</h1>
        </div>
        
        <div class="success-icon">
            <span class="checkmark">&#10003;</span>
        </div>
        
        <div class="order-details">
            <h2>Order #123RGR231567Y Confirmed</h2>
        </div>
        
        <div class="action-buttons-checkout">
            <a href="https://parcelsapp.com/"><button class="track-order-btn">Track Order</button></a>
            <a href="{{ route('order.summary.download') }}" class="generate-receipt">Generate Receipt</a>
        </div>
    </div>
</div>
@endsection