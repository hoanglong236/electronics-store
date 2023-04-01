@extends('shared.layouts.base-layout')

@section('body')
    {{-- Slider section --}}
    @include('pages.home.components.slider-section')

    {{-- Promo section --}}
    @include('pages.home.components.promo-section')

    {{-- Products section --}}
    @include('pages.home.components.products-section')

    {{-- <!-- banner section --> --}}
    @include('pages.home.components.banner-section')

    {{-- <!-- popular section --> --}}
    @include('pages.home.components.popular-section')
@endsection
