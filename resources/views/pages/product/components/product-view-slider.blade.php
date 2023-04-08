<div class="aa-product-view-slider">
    <div class="simpleLens-gallery-container">
        <div class="simpleLens-container">
            <div class="product-view-image">
                <img src="{{ asset('storage/' . $product->main_image_path) }}" class="simpleLens-big-image">
            </div>
        </div>
        <div class="product-view-slider-wrapper">
            <ul class="product-view-slider">
                @foreach ($productImages as $productImage)
                    <li>
                        <img height="50" src="{{ asset('storage/' . $productImage->image_path) }}" alt="java img">
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('assets/js/product-view-slider.js') }}"></script>
@endpush
