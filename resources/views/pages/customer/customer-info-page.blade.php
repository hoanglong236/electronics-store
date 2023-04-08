@extends('shared.layouts.shop-layout')

@section('body-main-content')
    <section id="customer-info">
        <div class="container mt-2">
            <div class="row">
                <div class="col-md-4">
                    @include('pages.customer.components.customer-info-table', [
                        'customer' => Auth::guard('customer')->user(),
                    ])
                </div>
                <div class="col-md-8">
                    @include('pages.customer.components.customer-address-table', [
                        'customerAddresses' => $data['customerAddresses'],
                    ])
                </div>
            </div>
        </div>
    </section>
@endsection
