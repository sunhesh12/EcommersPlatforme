@extends('app.layouts.main')

@section('content')
<div class="checkout-container">
    <!-- <div class="breadcrumb">
        <a href="#">Home</a>
        <span class="separator">·</span>
        <a href="#">Shopping Cart</a>
        <span class="separator">·</span>
        <span class="current">Checkout Process</span>
    </div> -->

    <h1 class="checkout-title">Checkout</h1>

    <div class="checkout-layout">
        <!-- Left column: Shipping form -->
        <div class="checkout-form-container">
            <h2 class="section-title">Shipping Address</h2>

            <form action="{{ route('user.checkout2') }}" method="GET">
                @csrf

                <div class="form-row">
                    <label for="first_name">First Name <span class="required">*</span></label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>

                <div class="form-row">
                    <label for="last_name">Last Name <span class="required">*</span></label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>

                <div class="form-row">
                    <label for="street_address">Street Address <span class="required">*</span></label>
                    <input type="text" id="street_address" name="street_address" required>
                </div>

                <!-- <div class="form-row address-line2">
                    <input type="text" id="street_address_2" name="street_address_2">
                </div> -->

                <div class="form-row">
                    <label for="email">Email <span class="required">*</span></label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-row">
                    <label for="city">City <span class="required">*</span></label>
                    <input type="text" id="city" name="city" required>
                </div>

                <div class="form-row">
                    <label for="country">Country <span class="required"> *</span></label>
                    <select id="country" name="country" required>
                        <option value="United States">United States</option>
                        <option value="Canada">Canada</option>
                        <option value="UK">United Kingdom</option>
                        <!-- More countries would go here -->
                    </select>
                </div>

                <div class="form-row">
                    <label for="state">State/Province <span class="required">*</span></label>
                    <select id="state" name="state" required>
                        <option value="">Please, select a region, state or province</option>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="CA">California</option>
                        <!-- More states would go here -->
                    </select>
                </div>



                <div class="form-row">
                    <label for="phone">Phone Number <span class="required">*</span></label>
                    <input type="tel" id="phone" name="phone" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="next-button">Next</button>
                </div>
            </form>
        </div>

        <!-- Right column: Order summary -->
        <div class="order-summary-container">
            <div class="order-summary">
                <h2 class="summary-title">Order Summary</h2>

                <div class="cart-items">
                    <div class="item-count">
                        @php
                        $count = count($cartItems);
                        @endphp

                        <!-- Total items: {{ $count }} -->
                        <span>{{ $count }} items in Cart</span>
                        <button class="collapse-button">-</button>
                    </div>
                    @foreach ($cartItems as $item)
                    <div class="item">
                        <div class="item-image">
                            <img src="{{ asset('storage/' . $item->product->logo) }}" alt="{{ $item->product->product_name }}">
                            <!-- <img src="{{ asset('images/laptop.jpg') }}" alt="MSI MEG Trident X"> -->
                        </div>
                        <div class="item-details">
                            <div class="item-name">{{$item->product->product_name}}</div>
                            <div class="item-qty">quantity {{$item->quantity}}</div>
                            <div class="item-qty">unit price Rs.{{$item->product->price}}</div>
                            <div class="item-price">Rs {{ number_format($item->product->price * $item->quantity, 2) }}</div>
                        </div>
                    </div>
                    @endforeach

                </div>

                <div class="order-total">
                    <div class="total-label">Order Total</div>
                    @php
                    $sum = 0;
                    @endphp

                    @foreach ($cartItems as $item)
                    @php
                    $sum += $item->product->price * $item->quantity;
                    @endphp
                    @endforeach
                    <div class="total-price">Rs {{ number_format($sum, 2) }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Checkout progress indicator -->
<div class="checkout-progress">
    <div class="progress-bar">
        <div class="progress-completed"></div>
    </div>

    <div class="steps">
        <div class="step active">
            <div class="step-indicator">
                <span class="step-icon"><i class="fas fa-check"></i></span>
            </div>
            <div class="step-label">Shipping</div>
        </div>

        <div class="step">
            <div class="step-indicator">
                <span class="step-number">2</span>
            </div>
            <div class="step-label">Review & Payments</div>
        </div>
    </div>
</div>
@endsection