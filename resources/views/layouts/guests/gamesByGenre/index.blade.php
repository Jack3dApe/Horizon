@extends('layouts.guests.base')
@section('title', 'Games By Genre')
@section('content')

    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{route('home')}}"><i class="fa fa-home"></i> {{__('messages.home')}}</a>
                        <a href="{{route('home')}}">{{__('messages.categories')}}</a>
                        <span>{{ $genre->name }}</span>
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
                                        <h4>{{ $genre->name }}</h4>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="product__page__filter">
                                        <p>{{__('messages.orderby')}}</p>
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
                            @if($games->count() > 0)
                                @foreach($games as $game)
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <x-game-container :game="$game" />
                                    </div>
                                @endforeach
                            @else
                                <p>{{__('messages.nogamesgenre')}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="product__pagination">
                        @if ($games->lastPage() > 1)
                            @if ($games->currentPage() > 1)
                                <a href="{{ $games->previousPageUrl() }}"><i class="fa fa-angle-double-left"></i></a>
                            @endif

                            @for ($i = 1; $i <= $games->lastPage(); $i++)
                                <a href="{{ $games->url($i) }}" class="{{ $i == $games->currentPage() ? 'current-page' : '' }}">{{ $i }}</a>
                            @endfor

                            @if ($games->currentPage() < $games->lastPage())
                                <a href="{{ $games->nextPageUrl() }}"><i class="fa fa-angle-double-right"></i></a>
                            @endif
                        @endif
                    </div>
                </div>
                <x-top-games/>
            </div>
        </div>

    </section>
@endsection

