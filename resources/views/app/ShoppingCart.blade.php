@extends('app.layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/shopping_cart.css') }}">

<div class="container">
    <div class="bodyTop">
      <nav class="breadcrumb">
          <a href="/">Home</a> > Login
      </nav>

      <h1>Shopping Cart</h1>
    </div>

    <div class="cart-container">
        <div class="cart-items">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th class="item-col">Item</th>
                        <th class="price-col">Price</th>
                        <th class="qty-col">Qty</th>
                        <th class="subtotal-col">Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="cart-item">
                        <td class="item-col">
                            <div class="item-wrapper">
                                <div class="item-image">
                                    <img src="{{ asset('images/msiLaptop.png') }}" alt="MSI MEG Trident X">
                                </div>
                                <div class="item-details">
                                    <p>MSI MEG Trident X 10SD-1012AU Intel i7 10700K, 2070 SUPER, 32GB RAM, 1TB SSD, Windows 10 Home, Gaming Keyboard and Mouse 3 Years Warranty</p>
                                </div>
                            </div>
                        </td>
                        <td class="price-col">$4,349.00</td>
                        <td class="qty-col">
                        <div class="quantity-container">
                            <input type="text" class="quantity-input" value="1" readonly>
                            <div class="quantity-buttons">
                                <button class="qty-btn increase">▲</button>
                                <button class="qty-btn decrease">▼</button>
                            </div>
                        </div>

                        </td>
                        <td class="subtotal-col">$13,047.00</td>
                        <td class="actions-col">
                            <div class="action-buttons">
                                <button class="action-btn remove-btn">
                                    &#10006; <!-- Cross Icon -->
                                </button>
                                <button class="action-btn edit-btn">
                                    ✎ <!-- Pencil Icon -->
                                </button>
                            </div>

                        </td>
                    </tr>
                    <tr class="cart-item">
                        <td class="item-col">
                            <div class="item-wrapper">
                                <div class="item-image">
                                    <img src="{{ asset('images/msiLaptop.png') }}" alt="MSI MEG Trident X">
                                </div>
                                <div class="item-details">
                                    <p>MSI MEG Trident X 10SD-1012AU Intel i7 10700K, 2070 SUPER, 32GB RAM, 1TB SSD, Windows 10 Home, Gaming Keyboard and Mouse 3 Years Warranty</p>
                                </div>
                            </div>
                        </td>
                        <td class="price-col">$4,349.00</td>
                        <td class="qty-col">
                        <div class="quantity-container">
                            <input type="text" class="quantity-input" value="1" readonly>
                            <div class="quantity-buttons">
                                <button class="qty-btn increase">▲</button>
                                <button class="qty-btn decrease">▼</button>
                            </div>
                        </div>
                        </td>
                        <td class="subtotal-col">$13,047.00</td>
                        <td class="actions-col">
                            <div class="action-buttons">
                                <button class="action-btn remove-btn">
                                    &#10006; <!-- Cross Icon -->
                                </button>
                                <button class="action-btn edit-btn">
                                    ✎ <!-- Pencil Icon -->
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="cart-buttons">
                <div class="action-buttons">
                    <button class="btn continue-btn">Continue Shopping</button>
                    <button class="btn clear-btn">Clear Shopping Cart</button>
                </div>
                <button class="btn update-btn">Update Shopping Cart</button>
            </div>
        </div>

        <div class="summary-section">
            <h2>Summary</h2>
            
            <div class="discount-box">
                <div class="discount-header">
                    <h3>Apply Discount Code</h3>
                </div>
                
                <div class="discount-form">
                    <label>Enter discount code</label>
                    <input type="text" placeholder="Enter Discount code">
                    <button class="btn apply-btn">Apply Discount</button>
                </div>
            </div>

            <div class="totals-box">
                <div class="total-row">
                    <span>Subtotal</span>
                    <span class="amount">$13,047.00</span>
                </div>
                
                <div class="total-row">
                    <span>Shipping</span>
                    <span class="amount">$21.00</span>
                </div>
                
                <div class="shipping-info">
                    <p>Standard rate - Price may vary depending on the item/destination. T&CS staff will contact you.</p>
                </div>
                
                <div class="total-row">
                    <span>Tax</span>
                    <span class="amount">$1.91</span>
                </div>
                
                <div class="total-row grand-total">
                    <span>Order Total</span>
                    <span class="amount">$13,068.00</span>
                </div>
            </div>

            <button class="btn checkout-btn">Proceed to Checkout</button>
        </div>
    </div>
</div>
@stop