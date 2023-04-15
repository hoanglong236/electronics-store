<div class="product-card">
    <a href="{{ route('product.details', $product->slug) }}" class="product-card__link">
        <div class="product-card__image-wrapper">
            <img src="{{ asset('storage/' . $product->main_image_path) }}" alt="">
        </div>

        <div class="product-card__name-wrapper">
            <h3>{{ $product->name }}</h3>
        </div>

        <div class="product-card__price-wrapper">
            @if ($product->discount_percent === 0)
                <span>{{ '$' . number_format($product->price) }}</span>
            @else
                <span>{{ '$' . number_format($product->price * (1 - $product->discount_percent / 100)) }}</span>
                <span><del>{{ '$' . number_format($product->price) }}</del></span>
            @endif
        </div>
    </a>

    <div class="product-card__action-wrapper">
        <a href="#favorite">
            <i class="fa fa-heart-o" aria-hidden="true"></i>
        </a>
        <button>
            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to Cart
        </button>
    </div>
</div>
