@extends('shared.layouts.login-register-layout')

@section('container-content')
    <div class="row">
        <div class="col-md-12 auth-form-container">
            <div class="auth-form-area">
                @include('shared.components.header-logo-section')
                <div class="form-title">
                    <h4>LOGIN</h4>
                </div>

                @include('pages.account.components.login-form')

                @if (Session::has(Constants::ACTION_ERROR))
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ Session::get(Constants::ACTION_ERROR) }}
                    </div>
                @elseif (Session::has(Constants::ACTION_SUCCESS))
                    <div class="alert alert-success mt-2" role="alert">
                        {{ Session::get(Constants::ACTION_SUCCESS) }}
                    </div>
                @endif

                <div class="external-link">
                    New to <strong>daily<span>Shop</span></strong>?
                    <a href="{{ route('customer.register') }}">Create an account.</a>
                </div>
            </div>
        </div>
    </div>
@endsection
