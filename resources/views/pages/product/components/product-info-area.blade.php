<div class="product-view-content ml-4 mt-3">
    <h3>{{ $product->name }}</h3>
    <div class="product-view-price">
        @if ($product->discount_percent === 0)
            <span>{{ '$' . number_format($product->price) }}</span>
        @else
            <span>{{ '$' . number_format($product->price * (1 - $product->discount_percent / 100)) }}</span>
            <span><del>{{ '$' . number_format($product->price) }}</del></span>
        @endif
    </div>
    <div class="product-view-brand mt-4">
        <span>Brand: </span>
        <a href="#">Oppo</a>
    </div>
    <div class="product-view-ability mb-2">
        Avilability: <span>In stock</span>
    </div>
    @include('pages.product.components.product-view-promotion-box')
    <div class="action-button-wrapper mt-3">
        <a class="btn action-outline-btn px-4" href="#">
            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Add To Cart
        </a>
        <a class="btn action-outline-btn px-4 ml-3" href="#">
            <i class="fa fa-heart-o" aria-hidden="true"></i> Wishlist
        </a>
    </div>
</div>
