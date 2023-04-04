@extends('shared.layouts.shop-layout')

@section('body-main-content')
    @include('pages.product.components.head-banner')
    <section id="aa-product-category">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-product-catg-content">
                        @include('pages.product.components.product-filter-nav')
                        @include('shared.components.products-list', [
                            'products' => $data['products'],
                        ])
                        @include('shared.components.paginator', [
                            'paginator' => $data['products'],
                        ])
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
