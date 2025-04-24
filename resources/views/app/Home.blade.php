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
                        @include('components.product-card', ['product' => $product])
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