@extends('shared.layouts.shop-layout')

@section('body-main-content')
    <section id="checkout">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-8">
                    @include('pages.cart.components.cart-items-table', [
                        'customCartItems' => $data['customCartItems'],
                    ])
                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>
    </section>
@endsection
