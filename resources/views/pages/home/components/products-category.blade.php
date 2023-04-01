<ul class="aa-product-catg">
    @foreach ($products as $product)
        <li>
            <figure>
                <a class="aa-product-img" href="#">
                    <img class="product-image" src="{{ asset('storage/' . $product->main_image_path) }}" alt="Product Image">
                </a>
                <a class="aa-add-card-btn"href="#">
                    <span class="fa fa-shopping-cart"></span>Add To Cart
                </a>
                <figcaption>
                    <h4 class="aa-product-title">
                        <a href="#">{{ $product->name }}</a>
                    </h4>
                    @if ($product->discount_percent === 0)
                        <span class="aa-product-price">{{ '$' . $product->price }}</span>
                    @else
                        <span class="aa-product-price">
                            {{ '$' . number_format($product->price * (1 - $product->discount_percent / 100)) }}
                        </span>
                        <span class="aa-product-price"><del>{{ '$' . number_format($product->price) }}</del></span>
                    @endif
                </figcaption>
            </figure>
            <div class="aa-product-hvr-content">
                <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                    <span class="fa fa-heart-o"></span>
                </a>
                <a href="#" data-toggle="tooltip" data-placement="top" title="Compare">
                    <span class="fa fa-exchange"></span>
                </a>
                <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal"
                    data-target="#quick-view-modal">
                    <span class="fa fa-search"></span>
                </a>
            </div>
            @if ($product->discount_percent >= 30)
                <span class="aa-badge aa-sale" href="#">HOT SALE!</span>
            @endif
            {{-- <span class="aa-badge aa-sold-out" href="#">Sold Out!</span> --}}
            {{-- <span class="aa-badge aa-hot" href="#">HOT!</span> --}}
        </li>
    @endforeach
</ul>
