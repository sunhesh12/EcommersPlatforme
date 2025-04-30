@extends('app.layouts.main') {{-- Use the main layout --}}

@section('content')

{{-- Features Section --}}
<div class="productDetailsContainer">

    <div class="productBody-left">

        <div class="navigation">
            <nav>
                <a href="/">Home</a> > <span class="product">Laptops</span>
            </nav>
        </div>

        <h1 class="productName">{{ $product->product_name }}</h1>

        <a href="https://www.google.com/search?q={{ urlencode($product->brand->name) }}" target="_blank" class="productBrand">
            {{ $product->brand->name }}
        </a>

        <small>
            <div class="pd_tag">Be the first to review this product</div>
        </small>

        <ul class="featurelist">
            <li>{{ $product->processor }}</li>
            <li>{{ $product->storage }}</li>
            <li>{{ $product->memory }}</li>
            <li>{{ $product->display }}</li>
            <li>{{ $product->graphics }}</li>
            <li>{{ $product->io_ports }}</li>
            <li>{{ $product->os }}</li>
        </ul>

        <br>

        <span>
            <small><strong>Have a Question?</strong> <a href="{{ route('user.contactUs') }}">Contact us</a></small>
        </span>

        <div class="productPrice">Rs. {{ number_format($product->price, 2) }}</div>

        {{-- Add to Cart Section --}}
        <div class="cart-Container">
            <div class="Addtocart-items">
                @php
                use App\Models\AddToCart;
                use App\Models\Product;
                use Illuminate\Support\Facades\Auth;
                $products = Product::latest()->take(12)->get(); // Fetch latest 12 products

                $userId = Auth::id();
                // $cartProductIds = AddToCart::where('user_id', $userId)->pluck('product_id')->toArray();
                $cartProductIds = [];

                if (Auth::check()) {
                $cartProductIds = AddToCart::where('user_id', Auth::id())->pluck('product_id')->toArray();
                }
                $isInCart = in_array($product->id, $cartProductIds);
                @endphp

                <div class="addCartbtn">
                    @if ($isInCart)
                    <button class="add-to-cart-btn" disabled>
                        <div class="cartButton">
                            <span>ADDED</span>
                        </div>
                    </button>
                    @elseif ($product->quantity <= 0)
                        <button class="add-to-cart-btn" disabled>
                        <div class="cartButton">
                            <span>OUT OF STOCK</span>
                        </div>
                        </button>
                        @else
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <div style="display: flex; justify-content:center; gap: 20px; align-items: center;">
                                <div>
                                    <button type="submit" class="add-to-cart-btn" data-product-id="{{ $product->id }}">
                                        <div class="cartButton">
                                            <span>ADD TO CART</span>
                                        </div>
                                    </button>
                                </div>
                                <div>
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                                    <div class="quantity-container">
                                        <div>
                                            <input type="number" id="quantityInput{{ $product->id }}" name="quantity" value="1" class="quantity-input" readonly>
                                        </div>
                                        <div>
                                            <button type="button" onclick="increaseValue({{ $product->id }})" class="quantity-btn">▲</button>
                                            <button type="button" onclick="decreaseValue({{ $product->id }})" class="quantity-btn">▼</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <script>
                            function increaseValue(productId) {
                                var input = document.getElementById('quantityInput' + productId);
                                var value = parseInt(input.value, 10);
                                input.value = isNaN(value) ? 1 : value + 1;
                            }

                            function decreaseValue(productId) {
                                var input = document.getElementById('quantityInput' + productId);
                                var value = parseInt(input.value, 10);
                                if (value > 1) {
                                    input.value = value - 1;
                                }
                            }
                        </script>

                        <!-- <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="number" name="quantity" value="1" id="hiddnenQty">
                            <button type="submit" class="add-to-cart-btn" data-product-id="{{ $product->id }}">
                                <div class="cartButton">
                                    <span>ADD TO CART</span>
                                </div>
                            </button>
                        </form> -->
                        @endif
                </div>

            </div>
            <!-- {{-- Quantity Container --}}
            <div class="quantity-container">
                <div>
                    <input type="text" id="quantity" name="quantity" value="1" class="quantity-input" readonly {{ $isInCart || $product->quantity <= 0 ? 'disabled' : ''  }}>
                </div>
                <div>
                    <button onclick="valueIncreases()" id="increaseQty" class="quantity-btn" {{ $isInCart || $product->quantity <= 0 ? 'disabled' : '' }}>▲</button>
                    <button onclick="valueDecreases()" id="decreaseQty" class="quantity-btn" {{ $isInCart || $product->quantity <= 0 ? 'disabled' : '' }}>▼</button>
                </div>
            </div>-->
        </div>

        <!--<script>

            function valueIncreases(){
                const quantity = document.getElementById('quantity');
                const hiddenQty = document.getElementById('hiddnenQty');

                document.getElementById('increaseQty').addEventListener('click', function() {
                if (parseInt(quantity.value)) 
                {
                    hiddenQty.value = quantity.value; // Update hidden input
                }
            });
            }
            
            function valueDecreases(){
                const quantity = document.getElementById('quantity');
                const hiddenQty = document.getElementById('hiddnenQty');

                document.getElementById('decreaseQty').addEventListener('click', function() {
                if (parseInt(quantity.value)) 
                {
                    hiddenQty.value = quantity.value; // Update hidden input
                }
            });
            }
        </script> -->
    </div>

    {{-- Product Section (Image Carousel) --}}
    <div class="productBody-right">
        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    {{-- Correct storage image access --}}
                    <img src="{{ asset('storage/'.$product->logo) }}" class="d-block w-100" alt="{{ $product->product_name }}">
                </div>
            </div>
        </div>
    </div>

</div>

<script src="{{ asset('js/productQuantity.js') }}"></script>

@stop