@extends('app.layouts.main')
@section('content')
<div class="homeContainer">
    <div class="container">
        <div class="catalogAll">
            <div class="catalogHeader">
                <div class="catalogHeaderLeft">
                    <h2>Catalog</h2>
                </div>
            </div>
            <div class="wallpapwerContainerCatalog">
                <img id="slideshow" src="{{ asset('images/wallpaper.jpg') }}">
            </div>
            <div class="catalogContainer">
                <div class="left-side-catalog"></div>
                <div class="right-side-catalog">
                    @foreach($products->groupBy('brand_id')->take(4) as $brandId => $brandProducts)
                    <div class="homeBodyMiddleTop">

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
                    <br>
                    <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@stop