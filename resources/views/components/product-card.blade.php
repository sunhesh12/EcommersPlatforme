<div class="cartContainer">
    <div class="cartInsideContainer">
        <div class="CartStock">
            <p><img src="{{ asset('icon/greenTik.png') }}"> in stock</p>
        </div>

        <div class="cartImage">
            <img src="{{ asset('storage/' . $product->logo) }}" alt="{{ $product->product_name }}">
        </div>

        <div class="cartReview">
            <div class="review-panel">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star empty-star"></i>
            </div>
            <p>Reviews (4)</p>
        </div>

        <div class="cartDescription">
            <p><span>{{ $product->product_name }}</span></p>
            <p><span>{{ $product->processor }}</span></p>
        </div>

        <p><span><del>${{ $product->price + 99 }}</del></span></p>
        <h2>${{ $product->price }}</h2>

        <div class="cartButton">
            @if ('isInCart')
            <button class="add-to-cart-btn" disabled>
            <div class="cartButton">
                <span>ADDED</span>
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
</div>