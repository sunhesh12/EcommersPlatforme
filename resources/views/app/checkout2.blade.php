@extends('app.layouts.main')

@section('content')
<div class="checkout-container">
    <div class="checkout-progress">
        <div class="progress-step">
            <div class="step-number">1</div>
            <div class="step-text">Shipping</div>
        </div>
        <div class="progress-line">
            <div class="progress-line-fill"></div>
        </div>
        <div class="progress-step active">
            <div class="step-number">2</div>
            <div class="step-text">Review & Payments</div>
        </div>
    </div>

    <div class="checkout-content">
        <div class="payment-section">
            <h2 class="section-title">Payment</h2>

            <form id="payment-form" method="POST" action="{{ route('save.payment') }}">
                @csrf
                <div class="form-group">
                    <label for="card-number">Card Number</label>
                    <div class="card-input-container">
                        <!-- <input type="text" id="card-number" name="" placeholder="1234 5678 9101 1121" class="form-control"> -->
                        <!-- <input type="text" id="expiry-date" name="expiry_date" placeholder="MM/YY" class="form-control"> -->
                        <input type="text" id="card-number" name="card_number" placeholder="1234 5678 9101 1121" class="form-control">

                        <div class="card-icon">
                            <img src="{{ asset('images/mastercard.png') }}" alt="Mastercard">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group half">
                        <label for="expiry-date">Expiration Date</label>
                        <!-- <input type="text" id="expiry-date" placeholder="MM/YY" class="form-control"> -->
                        <input type="text" id="expiry-date" name="expiry_date" placeholder="MM/YY" class="form-control">
                    </div>
                    <div class="form-group half">
                        <label for="cvv">CVV</label>
                        <!-- <input type="text" id="cvv" placeholder="123" class="form-control"> -->
                        <input type="text" id="cvv" name="cvv" placeholder="123" class="form-control">
                    </div>
                </div>

                <div class="form-group checkbox">
                    <!-- <input type="checkbox" id="save-card"> -->
                    <input type="checkbox" id="save-card" name="save_card">
                    <label for="save-card">Save card details</label>
                </div>
                @php
                $sum = 0;
                @endphp

                @foreach ($cartItems as $item)
                @php
                $sum += $item->product->price * $item->quantity;
                @endphp
                @endforeach
                <button type="submit" class="pay-button">Pay Rs {{ number_format($sum, 2) }}</button>

                <div class="privacy-notice">
                    Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.
                </div>
            </form>
        </div>


        <!-- <-----------------order summary----------------->
        <div class="order-summary-container">
            <div class="order-summary">
                <h2 class="summary-title">Order Summary</h2>

                <div class="cart-items">
                    <div class="item-count">
                        @php
                        $count = count($cartItems);
                        @endphp

                        <span>{{ $count }} items in Cart</span>
                        <button class="collapse-button">-</button>
                    </div>
                    @foreach ($cartItems as $item)
                    <div class="item">
                        <div class="item-image">
                            <img src="{{ asset('storage/' . $item->product->logo) }}" alt="{{ $item->product->product_name }}">
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
                    <div class="total-price">Rs {{ number_format($sum, 2) }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Format card number
        const cardNumberInput = document.getElementById('card-number');
        if (cardNumberInput) {
            cardNumberInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
                let formattedValue = '';

                for (let i = 0; i < value.length; i++) {
                    if (i > 0 && i % 4 === 0) {
                        formattedValue += ' ';
                    }
                    formattedValue += value[i];
                }

                e.target.value = formattedValue.substring(0, 19); // Limit to 16 digits + 3 spaces
            });
        }

        // Format expiry date
        const expiryDateInput = document.getElementById('expiry-date');
        if (expiryDateInput) {
            expiryDateInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');

                if (value.length > 2) {
                    value = value.substring(0, 2) + '/' + value.substring(2, 4);
                }

                e.target.value = value;
            });
        }

        // Format CVV (numbers only)
        const cvvInput = document.getElementById('cvv');
        if (cvvInput) {
            cvvInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                e.target.value = value.substring(0, 3);
            });
        }

        // Form submission (prevent default for demo)
        // const paymentForm = document.getElementById('payment-form');
        // if (paymentForm) {
        //     paymentForm.addEventListener('submit', function(e) {
        //         e.preventDefault();
        //         alert('Payment processing would happen here in a real implementation.');
        //     });
        // }
    });
</script>