@extends('app.layouts.main')

@section('content')
@php
$sum = 0;
@endphp

@foreach ($cartItems as $item)
@php
$sum += $item->product->price * $item->quantity;
@endphp
@endforeach
<div class="checkout-container">
    <div class="checkout-content">
        <!-- Left Section - Payment Form -->
        <!-- <div class="payment-section">
            <h2 class="section-title">Payment</h2>
            <div class="divider"></div>
            
            <div class="pin-section">
                <p class="pin-instruction">Enter your 4-digit card pin to confirm this payment</p>
                
                <div class="pin-inputs">
                    <input type="password" maxlength="1" class="pin-input">
                    <input type="password" maxlength="1" class="pin-input">
                    <input type="password" maxlength="1" class="pin-input">
                    <input type="password" maxlength="1" class="pin-input">
                </div>
                
                <button class="confirm-button">Confirm Payment</button>
                
                <p class="privacy-note">
                    Your personal data will be used to process your order, support your 
                    experience throughout this website, and for other purposes described 
                    in our privacy policy.
                </p>
            </div>
        </div> -->
        <div class="payment-section">
            <form method="POST" action="{{ route('verify.payment.otp.submit') }}">
                @csrf

                <h2 class="section-title">Payment</h2>
                <div class="divider"></div>

                <div class="pin-section">
                    <p class="pin-instruction">Enter your 4-digit card pin to confirm this payment</p>

                    <div class="pin-inputs">
                        <input type="password" maxlength="1" class="pin-input" autocomplete="new-password" oninput="moveNext(this, 0)">
                        <input type="password" maxlength="1" class="pin-input" oninput="moveNext(this, 1)">
                        <input type="password" maxlength="1" class="pin-input" oninput="moveNext(this, 2)">
                        <input type="password" maxlength="1" class="pin-input" oninput="moveNext(this, 3)">
                    </div>
                    <p id="otp-timer" style="color: red; font-weight: bold;"></p>

                    <a href="{{ route('resend.otp') }}" id="resend-otp-link" style="display:none; color: blue; cursor: pointer;">
                        Resend OTP
                    </a>


                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <!-- Hidden input to hold full OTP -->
                    <input type="hidden" name="otp" id="otp" required>

                    <button type="submit" class="confirm-button">Confirm Payment</button>

                    <p class="privacy-note">
                        Your personal data will be used to process your order, support your
                        experience throughout this website, and for other purposes described
                        in our privacy policy.
                    </p>
                </div>

            </form>

        </div>



        <!-- Right Section - Order Summary -->
        <div class="summary-section">


            <!-- Order Summary Card -->
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
    <!-- Progress Indicator -->
    <div class="progress-indicator">
        <div class="progress-step">
            <div class="step-circle completed">1</div>
            <span class="step-label">Shipping</span>
        </div>
        <div class="progress-line completed"></div>
        <div class="progress-step">
            <div class="step-circle active">2</div>
            <span class="step-label">Review & Payments</span>
        </div>
    </div>
</div>


<script>
    function moveNext(el, index) {
        const inputs = document.querySelectorAll('.pin-input');
        if (el.value.length === 1 && index < inputs.length - 1) {
            inputs[index + 1].focus();
        }

        // Combine digits
        let otp = '';
        inputs.forEach(input => otp += input.value);
        document.getElementById('otp').value = otp;
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-focus to first PIN input on page load
        document.querySelector('.pin-input').focus();

        // Auto-advance to next PIN input field
        const pinInputs = document.querySelectorAll('.pin-input');
        pinInputs.forEach((input, index) => {
            input.addEventListener('input', function() {
                if (this.value.length === parseInt(this.getAttribute('maxlength'))) {
                    if (index < pinInputs.length - 1) {
                        pinInputs[index + 1].focus();
                    }
                }
            });

            // Handle backspace to go to previous field
            input.addEventListener('keydown', function(e) {
                if (e.key === 'Backspace' && this.value.length === 0) {
                    if (index > 0) {
                        pinInputs[index - 1].focus();
                    }
                }
            });
        });

        // Confirm payment button click handler
        // const confirmButton = document.querySelector('.confirm-button');
        // confirmButton.addEventListener('click', function() {
        //     let pin = '';
        //     pinInputs.forEach(input => {
        //         pin += input.value;
        //     });

        // if (pin.length === 4) {
        //     // alert('Payment processing... This is just a mock frontend.');
        // } else {
        //     alert('Please enter your complete 4-digit PIN');
        // }
        // });
    });
</script>

<script>
    function startOtpTimer() {
        let timerDisplay = document.getElementById("otp-timer");
        let confirmButton = document.querySelector(".confirm-button");
        let resendLink = document.getElementById("resend-otp-link");
        let seconds = 60;

        resendLink.style.display = "none"; // Hide initially

        let countdown = setInterval(function() {
            if (seconds <= 0) {
                clearInterval(countdown);
                timerDisplay.textContent = "OTP expired.";
                confirmButton.disabled = true;
                resendLink.style.display = "inline"; // Show resend link
            } else {
                let mins = Math.floor(seconds / 60);
                let secs = seconds % 60;
                timerDisplay.textContent = `OTP expires in ${mins}:${secs < 10 ? '0' + secs : secs}`;
                seconds--;
            }
        }, 1000);
    }

    document.addEventListener("DOMContentLoaded", function() {
        startOtpTimer();
    });
</script>

@endsection