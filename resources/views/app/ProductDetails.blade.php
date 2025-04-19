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
                <h1 class="productName">MSI Cyborg 15 Gaming A13UCX i5</h1>

                <small><div class="pd_tag">Be the first to review this product</div></small>

                <ul class="featurelist">
                    <li> Intel Core i513420H Processor</li>
                    <li>512GB NVMe PCIe SSD</li>
                    <li>16GB DDR5 5200MHz RAM</li>
                    <li>15.6″, FHD (1920×1080), 144Hz, IPS Display</li>
                    <li>4GB NVIDIA GeForce RTX 2050 Graphics</li>
                    <li> Single Backlit Keyboard </li>
                    <li>Free Dos</li>
                </ul>

                <br>

                <span>
                <small><strong>Have a Question?</strong> <a href="#">Contact us</a></small>
                </span>

                <div class="productPrice">$3,299.00</div>

                <div class="cart-Container">
                    <div><button class="addCartbtn">Add to cart</button></div>

                    <div class="quantity-container">
                        <div><input type="text" id="quantity" value="1" class="quantity-input" readonly></div>
                        <div>
                            <button id="increaseQty" class="quantity-btn"> ▲</button>
                            <button id="decreaseQty" class="quantity-btn"> ▼ </button>
                        </div>
                    </div>
                    
                </div>
             
        </div>
        

        {{-- Product Section --}} 
        <div class="productBody-right">
        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <!-- Carousel Items -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/product1img1.jpg') }}" class="d-block w-100" alt="Product Image 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/product1img3.webp') }}" class="d-block w-100" alt="Product Image 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/product1img2.webp') }}" class="d-block w-100" alt="Product Image 3">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/product1img4.webp') }}" class="d-block w-100" alt="Product Image 3">
                </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/productQuantity.js') }}"></script>

    
@stop
