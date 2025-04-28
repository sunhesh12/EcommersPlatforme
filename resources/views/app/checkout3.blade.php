@extends('app.layouts.main')

@section('content')
<div class="checkout-container">
    <div class="checkout-content">
        <!-- Left Section - Payment Form -->
        <div class="payment-section">
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
        </div>
        
        <!-- Right Section - Order Summary -->
        <div class="summary-section">
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
            
            <!-- Order Summary Card -->
            <div class="order-summary-card">
                <div class="card-header">
                    <h3>Order Summary</h3>
                </div>
                
                <div class="card-body">
                    <div class="items-header">
                        <span>2 items in Cart</span>
                        <span class="collapse-icon">-</span>
                    </div>
                    
                    <div class="order-items">
                        <!-- Item 1 -->
                        <div class="order-item">
                            <div class="item-image">
                                <img src="{{ asset('images/laptop.png') }}" alt="MSI MEG Trident">
                            </div>
                            <div class="item-details">
                                <p class="item-name">MSI MEG Trident X 10SD-1074AU Intel i7 10700K, 32GB SUPER...</p>
                                <div class="item-price-row">
                                    <span class="item-qty">Qty: 1</span>
                                    <span class="item-price">$3,799.00</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Item 2 -->
                        <div class="order-item">
                            <div class="item-image">
                                <img src="{{ asset('images/laptop.png') }}" alt="MSI MEG Trident">
                            </div>
                            <div class="item-details">
                                <p class="item-name">MSI MEG Trident X 10SD-1074AU Intel i7 10700K, 32GB SUPER...</p>
                                <div class="item-price-row">
                                    <span class="item-qty">Qty: 1</span>
                                    <span class="item-price">$3,799.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer">
                    <div class="total-row">
                        <span class="total-label">Order Total</span>
                        <span class="total-amount">$13,068.00</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
        const confirmButton = document.querySelector('.confirm-button');
        confirmButton.addEventListener('click', function() {
            let pin = '';
            pinInputs.forEach(input => {
                pin += input.value;
            });
            
            if (pin.length === 4) {
                alert('Payment processing... This is just a mock frontend.');
            } else {
                alert('Please enter your complete 4-digit PIN');
            }
        });
    });
</script>
@endsection