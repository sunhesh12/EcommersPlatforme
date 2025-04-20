@extends('app.layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/checkout.css') }}">

<div class="checkout-container">
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span class="separator">·</span>
        <a href="{{ route('shopping.cart') }}">Shopping Cart</a>
        <span class="separator">·</span>
        <span class="current">Checkout Process</span>
    </div>

    <h1 class="checkout-title">Checkout</h1>

    <div class="checkout-content">
        <!-- Shipping Form -->
        <div class="checkout-form">
            <h2 class="form-section-title">Shipping Address</h2>

            <form action="{{ route('checkout.process') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="first_name">First Name <span class="required">*</span></label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name <span class="required">*</span></label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>

                <div class="form-group">
                    <label for="street_address">Street Address <span class="required">*</span></label>
                    <input type="text" id="street_address" name="street_address" required>
                </div>

                <div class="form-group">
                    <input type="text" id="street_address_2" name="street_address_2" placeholder="Apartment, suite, etc. (optional)">
                </div>

                <div class="form-group">
                    <label for="email">Email <span class="required">*</span></label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="city">City <span class="required">*</span></label>
                    <input type="text" id="city" name="city" required>
                </div>

                <div class="form-group">
                    <label for="state">State/Province <span class="required">*</span></label>
                    <select id="state" name="state" required>
                        <option value="">Select a state</option>
                        <option value="CA">California</option>
                        <option value="TX">Texas</option>
                        <option value="NY">New York</option>
                        <!-- Add more -->
                    </select>
                </div>

                <div class="form-group">
                    <label for="country">Country <span class="required">*</span></label>
                    <select id="country" name="country" required>
                        <option value="">Select a country</option>
                        <option value="USA">USA</option>
                        <option value="Canada">Canada</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number <span class="required">*</span></label>
                    <input type="tel" id="phone" name="phone" required>
                </div>

                <button type="submit" class="next-button">Next</button>
            </form>
        </div>

        <!-- Order Summary -->
        <div class="order-summary">
            <div class="summary-container">
                <h2 class="summary-title">Order Summary</h2>

                <div class="cart-items">
                    <div class="items-header">
                        <span>2 items in Cart</span>
                        <span class="toggle-icon">-</span>
                    </div>

                    <div class="item">
                        <div class="item-image">
                            <img src="{{ asset('images/laptop.jpg') }}" alt="MSI MEG Trident X">
                        </div>
                        <div class="item-details">
                            <div class="item-name">MSI MEG Trident X Intel i7</div>
                            <div class="item-qty">Qty: 1</div>
                            <div class="item-price">$3,799.00</div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="item-image">
                            <img src="{{ asset('images/laptop.jpg') }}" alt="MSI MEG Trident X">
                        </div>
                        <div class="item-details">
                            <div class="item-name">MSI MEG Trident X Intel i7</div>
                            <div class="item-qty">Qty: 1</div>
                            <div class="item-price">$3,799.00</div>
                        </div>
                    </div>
                </div>

                <div class="order-total">
                    <span>Order Total</span>
                    <span class="total-price">$7,598.00</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Progress Bar -->
<div class="checkout-progress">
    <div class="progress-container">
        <div class="progress-bar">
            <div class="progress-fill"></div>
        </div>

        <div class="progress-steps">
            <div class="step active">
                <div class="step-icon">✔</div>
                <div class="step-label">Shipping</div>
            </div>
            <div class="step">
                <div class="step-icon">2</div>
                <div class="step-label">Review & Payment</div>
            </div>
        </div>
    </div>
</div>
@endsection
