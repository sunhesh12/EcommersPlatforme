@extends('app.layouts.main')
@section('content')
<div class="homeContainer">
    <div class="container">
        <div class="homeBodyTop">
            <div class="homeBodyTopTop">
                <img id="slideshow" src="{{ asset('images/wallpaper.jpg') }}">
                <!-- Dots Container -->
                <div id="dotsContainer">
                    <!-- Dots will be here -->
                </div>
            </div>
            <br>
            <br>
            <div class="homeBodyTopBottom">
                <h2>New Products</h2>
                <div class="homeBodyTopBottomitemContainer">
                    <div class="leftbutton"></div>
                    <div class="cartComponentContainer">

                        <!-- <x-cart></x-cart> -->
                        @foreach($products as $product)
                        <a href="{{ route('product.details', $product->id) }}" class="brand-action-edit">
                            @include('components.product-card', ['product' => $product,'isInCart' => in_array($product->id, $cartProductIds)])
                        </a>
                        @endforeach

                        <!-- <============f=del=ete============> -->

                    </div>
                    <div class="Rightbutton"></div>
                </div>
            </div>
        </div>
        <div class="homeBodyMiddle">

            @foreach($products->groupBy('brand_id')->take(4) as $brandId => $brandProducts)
            <div class="homeBodyMiddleTop">
                <div class="HomeBodyMiddleTopLeft">
                    {{-- Example brand logo — adjust based on real brand --}}
                    <img src="{{ asset('storage/' . strtolower($brandProducts->first()->brand->wallpaper)) }}" alt="{{ $brandProducts->first()->brand->name }}">
                </div>

                <div class="HomeBodyMiddleTopRight">
                    <div class="leftbutton"></div>
                    <div class="cartComponentContainer">

                        @foreach($brandProducts->take(6) as $product) {{-- Show max 6 products per brand --}}
                        <a href="{{ route('product.details', $product->id) }}" class="brand-action-edit">
                            @include('components.product-card', ['product' => $product,'isInCart' => in_array($product->id, $cartProductIds)])
                        </a>
                        @endforeach

                    </div>
                    <div class="Rightbutton"></div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="homeBodyBottom">
            <div class="homeBodyBottomTop">
                <hr />
                <div class="homeBodyBottomTopContainer">
                    @foreach($products->groupBy('brand_id')->take(5) as $brandId => $brandProducts)
                    <img src="{{ asset('storage/' . strtolower($brandProducts->first()->brand->logo)) }}">
                    @endforeach
                </div>
                <hr />
            </div>
            <!-- //middle section -->
            <div class="homeBodyBottomMiddle">
                <div class="homeBodyBottomMiddleTop">
                    <div class="homeBodyBottomMiddleTopLeft">
                        <img src="{{ asset('icon/quationMark.png') }}">
                        <div>
                            <h1>My first order arrived today in perfect condition. From the time I sent a question about the
                                item to making the purchase, to the shipping and now the delivery, your company, Tecs, has
                                stayed in touch. Such great service. I look forward to shopping on your site in the future and
                                would highly recommend it.</h1>
                            <br>
                            <br>
                        </div>
                        <div class="whosay">
                            <button class="whosayButton">Leave Us A Review</button>
                            <h3>-Tama Broen-</h3>
                        </div>
                    </div>
                    <div class="homeBodyBottomMiddleTopRight">

                    </div>
                </div>
                <div class="homeBodyBottomMiddleMiddle"></div>
                <div class="homeBodyBottomMiddleBottom"></div>
            </div>

            <div class="homeBodyBottomBottom">
                <div class="homeBodyBottomBottom1">

                </div>
                <div class="homeBodyBottomBottom1">

                </div>
                <div class="homeBodyBottomBottom1">

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let images = [
        "{{ asset('images/wallpaper.jpg') }}",
        "{{ asset('images/wallpaper1.jpg') }}",
        "{{ asset('images/wallpaper2.jpg') }}",
        "{{ asset('images/wallpaper1.jpg') }}",
        "{{ asset('images/wallpaper.jpg') }}"
    ];

    let index = 0;
    let slideshow = document.getElementById('slideshow');
    let dotsContainer = document.getElementById('dotsContainer');

    function createDots() {
        images.forEach((img, i) => {
            let dot = document.createElement('span');
            dot.setAttribute('data-index', i);

            dot.addEventListener('click', function() {
                index = parseInt(this.getAttribute('data-index'));
                updateImageAndDots();
            });

            dotsContainer.appendChild(dot);
        });
    }

    function updateImageAndDots() {
        slideshow.src = images[index];
        let allDots = dotsContainer.querySelectorAll('span');
        allDots.forEach((dot, i) => {
            dot.style.backgroundColor = (i === index) ? '#007bff' : '#ccc';
        });
    }

    createDots();

    setInterval(function() {
        index = (index + 1) % images.length;
        updateImageAndDots();
    }, 2000);
</script>

@stop