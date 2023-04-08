<!-- Related product -->
<div class="aa-product-related-item">
    <h3>Related Products</h3>
    <ul class="products-related-slider">
        @foreach ($relatedProducts as $relatedProduct)
            @include('shared.components.product-card', [
                'product' => $relatedProduct,
            ])
        @endforeach
    </ul>
</div>
@push('scripts')
    <script src="{{ asset('assets/js/products-related-slider.js') }}"></script>
@endpush
