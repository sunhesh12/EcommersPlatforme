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
            
            <form id="payment-form">
                <div class="form-group">
                    <label for="card-number">Card Number</label>
                    <div class="card-input-container">
                        <input type="text" id="card-number" placeholder="1234 5678 9101 1121" class="form-control">
                        <div class="card-icon">
                            <img src="{{ asset('images/mastercard.png') }}" alt="Mastercard">
                        </div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group half">
                        <label for="expiry-date">Expiration Date</label>
                        <input type="text" id="expiry-date" placeholder="MM/YY" class="form-control">
                    </div>
                    <div class="form-group half">
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" placeholder="123" class="form-control">
                    </div>
                </div>
                
                <div class="form-group checkbox">
                    <input type="checkbox" id="save-card">
                    <label for="save-card">Save card details</label>
                </div>
                
                <button type="submit" class="pay-button">Pay USD13,068.00</button>
                
                <div class="privacy-notice">
                    Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.
                </div>
            </form>
        </div>
        
        <div class="order-summary">
            <h3 class="summary-title">Order Summary</h3>
            <div class="cart-count">2 Items in Cart</div>
            
            <div class="cart-items">
                <div class="cart-item1">
                    <div class="item-image">
                        <img src="{{ asset('images/laptop.jpg') }}" alt="MSI MEG Trident">
                    </div>
                    <div class="item-details">
                        <div class="item-name">MSI MEG Trident X 12th-1023AU Intel i7 12700K, 32TD SUPER...</div>
                        <div class="item-qty">Qty: 1</div>
                    </div>
                    <div class="item-price">$3,798.00</div>
                </div>
                
                <div class="cart-item1">
                    <div class="item-image">
                        <img src="{{ asset('images/laptop.jpg') }}" alt="MSI MEG Trident">
                    </div>
                    <div class="item-details">
                        <div class="item-name">MSI MEG Trident X 12th-1023AU Intel i7 12700K, 32TD SUPER...</div>
                        <div class="item-qty">Qty: 1</div>
                    </div>
                    <div class="item-price">$9,270.00</div>
                </div>
            </div>
            
            <div class="order-total">
                <div class="total-label">Order Total</div>
                <div class="total-amount">$13,068.00</div>
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
    const paymentForm = document.getElementById('payment-form');
    if (paymentForm) {
        paymentForm.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Payment processing would happen here in a real implementation.');
        });
    }
});
</script>