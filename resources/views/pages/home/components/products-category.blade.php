<div class="products">
    @foreach ($products as $product)
        @include('pages.home.components.product-card', [
            'product' => $product,
        ])
    @endforeach
</div>
