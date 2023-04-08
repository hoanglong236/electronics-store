@extends('shared.layouts.shop-layout')

@section('body-main-content')
    <section id="aa-product-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-product-details-area">
                        @include('pages.product.components.product-details-area', [
                            'product' => $data['product'],
                            'productImages' => $data['productImages'],
                        ])
                        @include('pages.product.components.related-products-area')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
