@extends('layouts.guests.base')
@section('title', ' AI Search Results')

@section('content')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> {{ __('messages.home') }}</a>
                        <span>{{ __('messages.ai_search_label') }}</span>
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
                        <div class="product__page__title">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="section-title">
                                        <h4>{{ __('messages.ai_search_results_title') }}</h4>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="product__page__filter">
                                        <p>{{ __('messages.orderby') }}</p>
                                        <select>
                                            <option value="">A-Z</option>
                                            <option value="">1-10</option>
                                            <option value="">10-50</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @if ($games->count() > 0)
                                @foreach ($games as $game)
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <x-game-container :game="$game" />
                                    </div>
                                @endforeach
                            @else
                                <p>{{ __('messages.no_game_found_message') }}</p>
                            @endif
                        </div>
                    </div>

                </div>
                <x-top-games />
            </div>
        </div>
    </section>
@endsection
