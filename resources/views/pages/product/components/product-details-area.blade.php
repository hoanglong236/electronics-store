<div class="aa-product-details-content">
    <div class="row">
        <div class="col-md-3">
            @include('pages.product.components.product-view-slider', [
                'product' => $product,
            ])
        </div>
        <div class="col-md-6">
            @include('pages.product.components.product-info-area', [
                'product' => $product,
            ])
        </div>
        <div class="col-md-3">
            {{-- @include('pages.product.components.product-sub-info-area', [
                'product' => $product,
            ]) --}}
        </div>
    </div>
</div>
