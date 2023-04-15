@extends('shared.layouts.shop-layout')

@section('body-main-content')
    <section id="checkout">
        <div class="container my-4">
            <div class="row">
                <div class="col-md-12">
                    @if (Session::has(Constants::ACTION_ERROR))
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ Session::get(Constants::ACTION_ERROR) }}
                        </div>
                    @elseif (Session::has(Constants::ACTION_SUCCESS))
                        <div class="alert alert-success mt-2" role="alert">
                            {{ Session::get(Constants::ACTION_SUCCESS) }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @include('pages.cart.components.cart-items-table', [
                        'customCartItems' => $data['customCartItems'],
                    ])
                    <div class="cart-action-wrapper">
                        <a href="{{ route('cart.checkout') }}" class="btn action-btn checkout-btn">CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
