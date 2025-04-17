@extends('app.layouts.main')
@section('content')
<div class="homeContainer">
    <div class="container">
        <div class="homeBodyTop">
            <div class="homeBodyTopTop">
                <img src={{ asset('images/wallpaper.jpg') }}>
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
                        @include('components.product-card', ['product' => $product])
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
                        @include('components.product-card', ['product' => $product])
                        @endforeach

                    </div>
                    <div class="Rightbutton"></div>
                </div>
            </div>
            @endforeach


            <!-- <div class="homeBodyMiddleTop">
                <div class="HomeBodyMiddleTopLeft">
                    <img src={{ asset('images/msiLogo.jpg') }}>
                </div>
                <div class="HomeBodyMiddleTopRight">
                    <div class="leftbutton"></div>
                    <div class="cartComponentContainer">

                        @foreach($products->where('brand_id', '1') as $product)
                        @include('components.product-card', ['product' => $product])
                        @endforeach

                    </div>
                    <div class="Rightbutton"></div>
                </div>
            </div> -->

            <!-- <div class="homeBodyMiddleTop">
                <div class="HomeBodyMiddleTopLeft">
                    <img src={{ asset('images/msiLogo.jpg') }}>
                </div>
                <div class="HomeBodyMiddleTopRight">
                    <div class="leftbutton"></div>
                    <div class="cartComponentContainer">

                        @foreach($products->where('brand_id', '2') as $product)
                        @include('components.product-card', ['product' => $product])
                        @endforeach

                    </div>
                    <div class="Rightbutton"></div>
                </div>
            </div> -->

            <!-- <div class="homeBodyMiddleTop">
                <div class="HomeBodyMiddleTopLeft">
                    <img src={{ asset('images/msiLogo.jpg') }}>
                </div>
                <div class="HomeBodyMiddleTopRight">
                    <div class="leftbutton"></div>
                    <div class="cartComponentContainer">

                        @foreach($products->where('brand_id', '3') as $product)
                        @include('components.product-card', ['product' => $product])
                        @endforeach

                    </div>
                    <div class="Rightbutton"></div>
                </div>
            </div> -->
        </div>
        <div class="homeBodyBottom">
            <div class="homeBodyBottomTop">
                <hr />
                <div class="homeBodyBottomTopContainer">
                    <img src="{{ asset('images/msiLogo.png') }}">
                    <img src="{{ asset('images/msiLogo.png') }}">
                    <img src="{{ asset('images/msiLogo.png') }}">
                    <img src="{{ asset('images/msiLogo.png') }}">
                    <img src="{{ asset('images/msiLogo.png') }}">
                </div>
                <hr />
            </div>
            <!-- //middle section -->
            <div class="homeBodyBottomMiddle">
                <div class="homeBodyBottomMiddleTop">
                    <div class="homeBodyBottomMiddleTopLeft">
                        <img src="{{ asset('icon/quationMark.png') }}">
                    </div>
                    <div class="homeBodyBottomMiddleTopRight"></div>
                </div>
                <div class="homeBodyBottomMiddleMiddle"></div>
                <div class="homeBodyBottomMiddleBottom"></div>
            </div>

            <div class="homeBodyBottomBottom">

            </div>
        </div>
    </div>
</div>
@stop