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
                    @foreach ($cartItems as $item)
                    <tr class="cart-item">
                        <td class="item-col">
                            <div class="item-wrapper">
                                <div class="item-image">
                                    @if($item->product && $item->product->logo)
                                    <img src="{{ asset('storage/' . $item->product->logo) }}" alt="{{ $item->product->product_name }}">
                                    @else
                                    <p>No Image Available</p>
                                    @endif
                                </div>
                                <div class="item-details">
                                    @if($item->product)
                                    <p>{{ $item->product->product_name }}</p>
                                    @else
                                    <p>Product not found</p>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="price-col">Rs.{{ number_format($item->product->price, 2) }}</td>
                        <td class="qty-col">
                            <form action="{{ route('cart.update') }}" method="POST" class="quantity-form">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <div class="quantity-container">
                                    <input type="text" name="quantity" class="quantity-input" value="{{ $item->quantity }}" readonly>
                                    <div class="quantity-buttons">
                                        <button type="submit" class="qty-btn save-btn" style="display:none;">💾</button>
                                    </div>
                                </div>
                            </form>
                        </td>
                        <td class="subtotal-col">
                            Rs{{ number_format($item->product->price * $item->quantity, 2) }}
                        </td>
                        <td class="actions-col">
                            <div class="action-buttons">
                                <form action="{{ route('cart.remove') }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button class="action-btn remove-btn" type="submit">&#10006;</button>
                                </form>
                                <button class="action-btn edit-btn" type="button">✎</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
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