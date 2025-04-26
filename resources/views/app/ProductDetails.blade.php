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
        <!-- <a href="www.{{$product->brand->name}}" class="productBrand">{{$product->brand->name}}</a> -->
        <!-- productsView -->

        <!-- <h1 class="productName"></h1> -->


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

        <div class="productPrice">Rs.{{ $product->price }}</div>

        <div class="cart-Container">
            <div class="Addtocart-items">
                <div class="addCartbtn">
                    @if ('isInCart')
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
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="add-to-cart-btn"
                                data-product-id="{{ $product->id }}">
                                <div class="cartButton">
                                    <!-- <img src="{{ asset('icon/cart.png') }}" alt="Cart Icon" /> -->
                                    <span>ADD TO CART</span>
                                </div>
                            </button>
                        </form>
                        @endif
                </div>
            </div>

            <!-- <div class="quantity-container"> -->
            @if ('isInCart')
            <!-- <div class="quantity-container"> -->
            <!-- <div><input type="text" id="quantity" value="1" class="quantity-input" readonly disabled></div>
                <div>
                    <button id="increaseQty" class="quantity-btn" disabled> ▲</button>
                    <button id="decreaseQty" class="quantity-btn" disabled> ▼ </button>
                </div> -->
            <!-- </div> -->
            @else
            <div class="quantity-container">
                <div><input type="text" id="quantity" value="1" class="quantity-input" readonly></div>
                <div>
                    <button id="increaseQty" class="quantity-btn"> ▲</button>
                    <button id="decreaseQty" class="quantity-btn"> ▼ </button>
                </div>
            </div>
            @endif
            <!-- </div> -->

        </div>

    </div>


    {{-- Product Section --}}
    <div class="productBody-right">
        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicators -->
            <!-- <div class="carousel-indicators">
                <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div> -->

            <!-- Carousel Items -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('storage/'.$product->logo) }}" class="d-block w-100" alt="Product Image 1">
                </div>
                <!-- temparary remove multiple images -->
                <!-- <div class="carousel-item">
                    <img src="{{ asset('images/product1img3.webp') }}" class="d-block w-100" alt="Product Image 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/product1img2.webp') }}" class="d-block w-100" alt="Product Image 3">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/product1img4.webp') }}" class="d-block w-100" alt="Product Image 3">
                </div> -->
            </div>

            <!-- Controls -->
            <!-- <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button> -->
        </div>

    </div>
</div>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
<script src="{{ asset('js/productQuantity.js') }}"></script>


@stop