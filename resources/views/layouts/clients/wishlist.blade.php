@extends('layouts.guests.base')
@section('title', 'Wishlist')
@section('content')

    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> {{ __('messages.home') }}</a>
                        <span>Wishlist</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="product-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product__page__content">
                        <div class="section-title">
                            <h4>Wishlist</h4>
                        </div>
                        <x-user-wishlist :user="auth()->user()" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
