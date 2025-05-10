@extends('app.layouts.main')
@section('content')
<div class="homeContainer">
    <div class="container">
        <div class="catalogAll">
            <div class="catalogHeader">
                <div class="catalogHeaderLeft">
                    <h2>Catalog Search</h2>
                </div>
            </div>
            <div class="wallpapwerContainerCatalog">
                <img id="slideshow" src="{{ asset('images/wallpaper.jpg') }}">
            </div>
            <div class="catalogContainer">
                <div class="left-side-catalog">
                    <!-- //code here -->
                    <form method="GET" action="{{ route('catalog.filter') }}">
                        <div class="filterSection">
                            <h3>Filter by Price</h3>
                            <input type="text" name="search" placeholder="Search Anything..." value="{{ request('search') }}" class="searchInput" autocomplete="new-password">
                            <div class="price-range-container">
                                <input type="range" id="min-price-slider" name="min_price" min="0" max="500000" step="5000" value="{{ request('min_price', 0) }}">
                                <input type="range" id="max-price-slider" name="max_price" min="0" max="500000" step="5000" value="{{ request('max_price', 500000) }}">

                                <div class="price-values">
                                    <span>Min: Rs. <input type="number" id="min-price-input" value="{{ request('min_price', 0) }}"></span>
                                    <span>Max: Rs. <input type="number" id="max-price-input" value="{{ request('max_price', 500000) }}"></span>
                                </div>
                            </div>

                            <h3>Filter by Brand</h3>
                            @foreach($brands as $brand)
                            <label>
                                <input type="checkbox" name="brand[]" value="{{ $brand->id }}"
                                    {{ is_array(request('brand')) && in_array($brand->id, request('brand')) ? 'checked' : '' }}>
                                {{ $brand->name }}
                            </label><br>
                            @endforeach

                            <button type="submit" class="filterBtn">Apply Filters</button>
                            <a href="{{ route('catalog.filter') }}" class="clearBtn">Clear Filters</a>

                        </div>
                    </form>

                </div>
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

<script>
    const minSlider = document.getElementById('min-price-slider');
    const maxSlider = document.getElementById('max-price-slider');
    const minInput = document.getElementById('min-price-input');
    const maxInput = document.getElementById('max-price-input');

    function syncSliderAndInput(slider, input) {
        slider.addEventListener('input', () => input.value = slider.value);
        input.addEventListener('input', () => slider.value = input.value);
    }

    syncSliderAndInput(minSlider, minInput);
    syncSliderAndInput(maxSlider, maxInput);
</script>

@stop