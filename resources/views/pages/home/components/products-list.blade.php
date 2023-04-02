<div class="product-card-wrapper">
    @foreach ($products as $product)
        @include('pages.home.components.product-card', [
            'product' => $product,
        ])
    @endforeach
</div>
