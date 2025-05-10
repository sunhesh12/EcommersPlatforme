@foreach($products->groupBy('brand_id')->take(4) as $brandId => $brandProducts)
    <div class="homeBodyMiddleTop">
        <div class="HomeBodyMiddleTopRight">
            <div class="leftbutton"></div>
            <div class="cartComponentContainer">
                @foreach($brandProducts->take(6) as $product)
                <a href="{{ route('product.details', $product->id) }}" class="brand-action-edit">
                    @include('components.product-card', ['product' => $product, 'isInCart' => in_array($product->id, $cartProductIds)])
                </a>
                @endforeach
            </div>
            <div class="Rightbutton"></div>
        </div>
    </div>
    <br><br>
@endforeach
