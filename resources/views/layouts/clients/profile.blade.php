@extends('layouts.guests.base')
@section('title', 'Wishlist')
@section('content')
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-lg-3 col-md-4 pt-2 pb-2" style="background-color: #070720;border-radius: 3px">
                <div class="text-center card-box" >
                    <div class="member-card">
                        <div class="thumb-xl member-thumb m-b-10 center-block">
                            <img src="{{ $user->profile_pic}}" class="rounded-circle" alt="profile-image">
                        </div>

                        <div class="mt-3 mb-2">
                            <h4 class="m-b-5 text-light">{{ $user->username }}</h4>
                        </div>

                        <div class="text-left m-t-40">
                            <!-- Jogos wishlisted -->
                            <p class="text-muted font-13">
                                <strong>{{ $wishlistCount }}</strong>
                                <span class="m-l-15">
                                <a href="{{ route('user.wishlist', ['id_user' => $user->id_user]) }}" class="text-decoration-none">{{ __('messages.games_wishlisted_link') }}</a>
                            </span>
                            </p>

                            <!-- Jogos owned -->
                            <p class="text-muted font-13">
                                <strong>{{ $gamesOwnedCount }}</strong>
                                <span class="m-l-15">{{ __('messages.games_owned_label') }}</span>
                            </p>
                        </div>
                    </div>
                </div> <!-- end card-box -->

                <div class="card-box">
                    <h4 style="color:#e53637" class="m-t-0 m-b-20 header-title font-weight-bolder">{{ __('messages.favorite_genres_title') }}</h4>

                    <div class="p-b-10 mt-3">
                        @forelse($favoriteGenres as $genre)
                            <p style="margin-bottom: -3px" class="font-weight-bold text-light strong">{{ $genre['name'] }}</p>
                            <div class="progress progress-sm" >
                                <div class="progress-bar progress-bar-primary" role="progressbar"
                                     aria-valuenow="{{ $genre['percentage'] }};col"
                                     aria-valuemin="0" aria-valuemax="100"
                                     style="width: {{ $genre['percentage'] }}%;background-color: #35FF69">
                                </div>
                            </div>
                        @empty
                            <p class="text-muted">{{ __('messages.no_favorite_genres_message') }}</p>
                        @endforelse
                    </div>
                </div>

            </div> <!-- end col -->


            <div class="col-md-8 col-lg-9" >
                <div class="card" style="background-color: #070720;border-radius: 3px">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" role="tablist">

                            <li class="nav-item " >
                                <a style="color: white"  class="nav-link active font-weight-bold" href="#library" data-bs-toggle="tab" role="tab" aria-selected="true">
                                    <i class="fa-solid fa-gamepad"></i> {{ __('messages.library_label') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a style="color: white" class="nav-link font-weight-bold" href="#settings" data-bs-toggle="tab" role="tab" aria-selected="false">
                                    <i class="fa fa-cog me-2"></i> {{ __('messages.settings_label') }}
                                </a>
                            </li>
                            <li  class="nav-item">
                                <a style="color: white" class="nav-link font-weight-bold" href="#tickets" data-bs-toggle="tab" role="tab" aria-selected="true">
                                    <i class="fa-solid fa-circle-info"></i> {{ __('messages.tickets_label') }}
                                </a>
                            </li>

                        </ul>
                    </div>


                    <div class="card-body tab-content">
                        <!-- LIBRARY Tab -->
                        <div class="tab-pane fade show active" id="library" role="tabpanel">
                            <div class="row">
                                @forelse($games as $game)
                                    <div class="col-sm-4">
                                        <div class="gal-detail thumb">
                                            <a href="{{ route('games.show.mainpage', ['game' => $game->id_game]) }}" class="image-popup" title="{{ $game->game->name }}">
                                                <img src="{{ asset('/imgs/grids/' . $game->game->grid) }}"
                                                     alt="{{ $game->game->name }} Grid Image"
                                                     class="img-fluid rounded mb-3">
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12 text-center">
                                        <p class="text-muted">{{ __('messages.no_games_owned_message') }}</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>



                        <!-- SETTINGS Tab -->
                        <div class="tab-pane fade" id="settings" role="tabpanel">
                            <!-- Formulário de edição do perfil -->
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="text-light">
                                @csrf
                                @method('PUT')

                                <!-- Upload da imagem -->
                                <div class="mb-3">
                                    <label for="profilePic" class="form-label">{{ __('messages.profile_picture_label') }}</label>
                                    <input type="file" name="profile_pic" id="profilePic" class="form-control">
                                </div>

                                <!-- Username -->
                                <div class="mb-3">
                                    <label for="Username" class="form-label">{{ __('messages.username_label') }}</label>
                                    <input type="text" name="username" value="{{ old('username', $user->username) }}" id="Username" class="form-control">
                                </div>

                                <!-- Email (readonly) -->
                                <div class="mb-3">
                                    <label for="Email" class="form-label">Email</label>
                                    <input type="email" name="email" value="{{ $user->email }}" id="Email" class="form-control" readonly>
                                </div>

                                <!-- Password -->
                                <div class="mb-3">
                                    <label for="Password" class="form-label">{{ __('messages.password_label') }}</label>
                                    <input type="password" name="password" placeholder="{{ __('messages.password_placeholder') }}" id="Password" class="form-control">
                                </div>

                                <!-- Confirmar Password -->
                                <div class="mb-3">
                                    <label for="RePassword" class="form-label">{{ __('messages.repassword_label') }}</label>
                                    <input type="password" name="password_confirmation" placeholder="{{ __('messages.repassword_placeholder') }}" id="RePassword" class="form-control">
                                </div>

                                <!-- Telefone -->
                                <div class="mb-3">
                                    <label for="Phone" class="form-label">{{ __('messages.phone_label') }}</label>
                                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" id="Phone" class="form-control">
                                </div>

                                <!-- Botão de submit -->
                                <button style="background-color: #560bad; border-color: #560bad" class="btn btn-primary font-weight-bold " type="submit">
                                    <i class="fa-solid fa-floppy-disk mr-1"></i>{{ __('messages.save_button') }}
                                </button>
                            </form>
                        </div>




                        <div class="tab-pane fade" id="tickets" role="tabpanel">
                            <div class="m-t-30">
                                <h4 class="text-light font-weight-bold">Tickets</h4>

                                <div class="table-responsive">
                                    <table class="table card-table table-vcenter text-nowrap">
                                        <thead>
                                        <tr>
                                            <th class="w-1" style="color: white">ID</th>
                                            <th style="color: white">{{__('messages.supportticketmain')}}</th>
                                            <th style="color: white">{{__('messages.sticketstatus')}}</th>
                                            <th style="color: white">{{__('messages.sticketcreatedate')}}</th>
                                            <th class="text-end" style="color: white">{{__('messages.sticketaction')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($tickets as $ticket)
                                            @if($ticket['status'] != 4) <!-- Ignora os tickets com status "Resolved" -->
                                            <tr>
                                                <td><span class="text-secondary">#{{ $ticket['id'] }}</span></td>
                                                <td style="color: white">{{ \Illuminate\Support\Str::limit($ticket['subject'], 30) }}</td>
                                                <td>
                                                    @if($ticket['status'] == 2)
                                                        <span class="badge bg-warning" style="color: white;">{{__('messages.sticketopen')}}</span>
                                                    @elseif($ticket['status'] == 3)
                                                        <span class="badge bg-primary" style="color: white;">{{__('messages.sticketpending')}}</span>
                                                    @elseif($ticket['status'] == 5)
                                                        <span class="badge bg-danger" style="color: white;">{{__('messages.sticketclosed')}}</span>
                                                    @elseif($ticket['status'] == 6 || $ticket['status'] == 7)
                                                        <span class="badge bg-secondary" style="color: white;">{{__('messages.sticketinprogress')}}</span>
                                                    @else
                                                        <span class="badge bg-secondary" style="color: white;">{{__('messages.sticketunknown')}}</span>
                                                    @endif
                                                </td>
                                                <td style="color: white">{{ \Carbon\Carbon::parse($ticket['created_at'])->format('d/m/Y H:i') }}</td>
                                                <td class="text-end">
                                                    <form action="{{ route('support.tickets.resolve', $ticket['id']) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success">
                                                            <i class="ti ti-check"></i> {{__('messages.sticketresolve')}}
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endif
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center text-muted">
                                                    <i class="ti ti-info-circle"></i> {{__('messages.sticketzero')}}
                                                </td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- end row -->
@endsection
