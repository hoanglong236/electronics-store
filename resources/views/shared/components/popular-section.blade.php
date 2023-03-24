<section id="aa-popular-category">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="aa-popular-category-area">
                        <!-- start prduct navigation -->
                        <ul class="nav nav-tabs aa-products-tab">
                            <li class="active"><a href="#popular" data-toggle="tab">Popular</a></li>
                            <li><a href="#featured" data-toggle="tab">Featured</a></li>
                            <li><a href="#latest" data-toggle="tab">Latest</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- Popular products -->
                            <div class="tab-pane fade in active" id="popular">
                                <ul class="aa-product-catg aa-popular-slider">
                                    <!-- start single product item -->
                                    @foreach ($data['popularProducts'] as $popularProduct)
                                        <li>
                                            <figure>
                                                <a class="aa-product-img" href="#">
                                                    <img src="{{ asset('assets/img/man/polo-shirt-2.png') }}"
                                                        alt="polo shirt img">
                                                </a>
                                                <a class="aa-add-card-btn"href="#">
                                                    <span class="fa fa-shopping-cart"></span>
                                                    Add To Cart
                                                </a>
                                                <figcaption>
                                                    <h4 class="aa-product-title">
                                                        <a href="#">{{ $popularProduct->name }}</a>
                                                    </h4>
                                                    @if ($popularProduct->discount_percent > 0)
                                                        <span class="aa-product-price">
                                                            {{ '$' . $popularProduct->price * (1 - $popularProduct->discount_percent / 100) }}
                                                        </span>
                                                        <span class="aa-product-price">
                                                            <del>{{ '$' . $popularProduct->price }}</del>
                                                        </span>
                                                    @else
                                                        <span class="aa-product-price">
                                                            {{ '$' . $popularProduct->price }}
                                                        </span>
                                                    @endif
                                                </figcaption>
                                            </figure>
                                            <div class="aa-product-hvr-content">
                                                <a href="#" data-toggle="tooltip" data-placement="top"
                                                    title="Add to Wishlist">
                                                    <span class="fa fa-heart-o"></span>
                                                </a>
                                                <a href="#" data-toggle="tooltip" data-placement="top"
                                                    title="Compare">
                                                    <span class="fa fa-exchange"></span>
                                                </a>
                                                <a href="#" data-toggle2="tooltip" data-placement="top"
                                                    title="Quick View" data-toggle="modal"
                                                    data-target="#quick-view-modal">
                                                    <span class="fa fa-search"></span>
                                                </a>
                                            </div>
                                            <!-- product badge -->
                                            @if ($popularProduct->discount_percent > 0)
                                                <span class="aa-badge aa-sale" href="#">SALE!</span>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                                <a class="aa-browse-btn" href="#">
                                    Browse all Product <span class="fa fa-long-arrow-right"></span>
                                </a>
                            </div>
                            <!-- Popular products END -->

                            <!-- Featured products -->
                            <div class="tab-pane fade" id="featured">
                                <ul class="aa-product-catg aa-featured-slider">
                                    <!-- start single product item -->
                                    @foreach ($data['featuredProducts'] as $featuredProduct)
                                        <li>
                                            <figure>
                                                <a class="aa-product-img" href="#">
                                                    <img src="{{ asset('assets/img/man/polo-shirt-2.png') }}"
                                                        alt="polo shirt img">
                                                </a>
                                                <a class="aa-add-card-btn"href="#">
                                                    <span class="fa fa-shopping-cart"></span>
                                                    Add To Cart
                                                </a>
                                                <figcaption>
                                                    <h4 class="aa-product-title">
                                                        <a href="#">{{ $featuredProduct->name }}</a>
                                                    </h4>
                                                    @if ($featuredProduct->discount_percent > 0)
                                                        <span class="aa-product-price">
                                                            {{ '$' . $featuredProduct->price * (1 - $featuredProduct->discount_percent / 100) }}
                                                        </span>
                                                        <span class="aa-product-price">
                                                            <del>{{ '$' . $featuredProduct->price }}</del>
                                                        </span>
                                                    @else
                                                        <span class="aa-product-price">
                                                            {{ '$' . $featuredProduct->price }}
                                                        </span>
                                                    @endif
                                                </figcaption>
                                            </figure>
                                            <div class="aa-product-hvr-content">
                                                <a href="#" data-toggle="tooltip" data-placement="top"
                                                    title="Add to Wishlist">
                                                    <span class="fa fa-heart-o"></span>
                                                </a>
                                                <a href="#" data-toggle="tooltip" data-placement="top"
                                                    title="Compare">
                                                    <span class="fa fa-exchange"></span>
                                                </a>
                                                <a href="#" data-toggle2="tooltip" data-placement="top"
                                                    title="Quick View" data-toggle="modal"
                                                    data-target="#quick-view-modal">
                                                    <span class="fa fa-search"></span>
                                                </a>
                                            </div>
                                            <!-- product badge -->
                                            @if ($featuredProduct->discount_percent > 0)
                                                <span class="aa-badge aa-sale" href="#">SALE!</span>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                                <a class="aa-browse-btn" href="#">
                                    Browse all Product <span class="fa fa-long-arrow-right"></span>
                                </a>
                            </div>
                            <!-- Featured products END -->

                            <!-- Latest products -->
                            <div class="tab-pane fade" id="latest">
                                <ul class="aa-product-catg aa-latest-slider">
                                    @foreach ($data['latestProducts'] as $latestProduct)
                                        <li>
                                            <figure>
                                                <a class="aa-product-img" href="#">
                                                    <img src="{{ asset('assets/img/man/polo-shirt-2.png') }}"
                                                        alt="polo shirt img">
                                                </a>
                                                <a class="aa-add-card-btn"href="#">
                                                    <span class="fa fa-shopping-cart"></span>
                                                    Add To Cart
                                                </a>
                                                <figcaption>
                                                    <h4 class="aa-product-title">
                                                        <a href="#">{{ $latestProduct->name }}</a>
                                                    </h4>
                                                    @if ($latestProduct->discount_percent > 0)
                                                        <span class="aa-product-price">
                                                            {{ '$' . $latestProduct->price * (1 - $latestProduct->discount_percent / 100) }}
                                                        </span>
                                                        <span class="aa-product-price">
                                                            <del>{{ '$' . $latestProduct->price }}</del>
                                                        </span>
                                                    @else
                                                        <span class="aa-product-price">
                                                            {{ '$' . $latestProduct->price }}
                                                        </span>
                                                    @endif
                                                </figcaption>
                                            </figure>
                                            <div class="aa-product-hvr-content">
                                                <a href="#" data-toggle="tooltip" data-placement="top"
                                                    title="Add to Wishlist">
                                                    <span class="fa fa-heart-o"></span>
                                                </a>
                                                <a href="#" data-toggle="tooltip" data-placement="top"
                                                    title="Compare">
                                                    <span class="fa fa-exchange"></span>
                                                </a>
                                                <a href="#" data-toggle2="tooltip" data-placement="top"
                                                    title="Quick View" data-toggle="modal"
                                                    data-target="#quick-view-modal">
                                                    <span class="fa fa-search"></span>
                                                </a>
                                            </div>
                                            <!-- product badge -->
                                            @if ($latestProduct->discount_percent > 0)
                                                <span class="aa-badge aa-sale" href="#">SALE!</span>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                                <a class="aa-browse-btn" href="#">
                                    Browse all Product <span class="fa fa-long-arrow-right"></span>
                                </a>
                            </div>
                            <!-- Latest products END -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
