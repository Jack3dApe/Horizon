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
                                <a href="{{ route('user.wishlist', ['id_user' => $user->id_user]) }}" class="text-decoration-none">Games wishlisted</a>
                            </span>
                            </p>

                            <!-- Jogos owned -->
                            <p class="text-muted font-13">
                                <strong>{{ $gamesOwnedCount }}</strong>
                                <span class="m-l-15">Games owned</span>
                            </p>
                        </div>
                    </div>
                </div> <!-- end card-box -->

                <div class="card-box">
                    <h4 style="color:#e53637" class="m-t-0 m-b-20 header-title font-weight-bolder">Favorite genres</h4>

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
                            <p class="text-muted">No favorite genres available.</p>
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
                                    <i class="fa-solid fa-gamepad"></i> LIBRARY
                                </a>
                            </li>
                            <li class="nav-item">
                                <a style="color: white" class="nav-link font-weight-bold" href="#settings" data-bs-toggle="tab" role="tab" aria-selected="false">
                                    <i class="fa fa-cog me-2"></i> SETTINGS
                                </a>
                            </li>
                            <li  class="nav-item">
                                <a style="color: white" class="nav-link font-weight-bold" href="#tickets" data-bs-toggle="tab" role="tab" aria-selected="true">
                                    <i class="fa-solid fa-circle-info"></i> TICKETS
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
                                        <p class="text-muted">You don't own any games yet.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>



                        <!-- SETTINGS Tab -->
                        <div class="tab-pane fade" id="settings" role="tabpanel">
                            <form role="form" class="text-light">
                                <div class="mb-3">
                                    <label for="FullName" class="form-label">Full Name</label>
                                    <input type="text" value="John Doe" id="FullName" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="Email" class="form-label">Email</label>
                                    <input type="email" value="first.last@example.com" id="Email" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="Username" class="form-label">Username</label>
                                    <input type="text" value="john" id="Username" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="Password" class="form-label">Password</label>
                                    <input type="password" placeholder="6 - 15 Characters" id="Password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="RePassword" class="form-label">Re-Password</label>
                                    <input type="password" placeholder="6 - 15 Characters" id="RePassword" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="AboutMe" class="form-label">About Me</label>
                                    <textarea id="AboutMe" class="form-control" style="height: 125px;">Lorem Ipsum dolor sit amet...</textarea>
                                </div>
                                <button style="background-color: #560bad;border-color: #560bad" class="btn btn-primary font-weight-bold ml-3" type="submit"><i class="fa-solid fa-floppy-disk mr-1"></i>Save</button>
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
                                            <th style="color: white">Subject</th>
                                            <th style="color: white">Status</th>
                                            <th style="color: white">Created At</th>
                                            <th class="text-end" style="color: white">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($tickets as $ticket)
                                            <tr>
                                                <td><span class="text-secondary">#{{ $ticket['id'] }}</span></td>
                                                <td style="color: white">{{ \Illuminate\Support\Str::limit($ticket['subject'], 30) }}</td>
                                                <td>
                                                    @if($ticket['status'] == 2)
                                                        <span class="badge bg-warning" style="color: white;">Open</span>
                                                    @elseif($ticket['status'] == 3)
                                                        <span class="badge bg-primary" style="color: white;">Pending</span>
                                                    @elseif($ticket['status'] == 4)
                                                        <span class="badge bg-success" style="color: white;">Resolved</span>
                                                    @elseif($ticket['status'] == 5)
                                                        <span class="badge bg-danger" style="color: white;">Closed</span>
                                                    @elseif($ticket['status'] == 6 || $ticket['status'] == 7)
                                                        <span class="badge bg-secondary" style="color: white;">In Progress</span>
                                                    @else
                                                        <span class="badge bg-secondary" style="color: white;">Unknown</span>
                                                    @endif
                                                </td>
                                                <td style="color: white">{{ \Carbon\Carbon::parse($ticket['created_at'])->format('d/m/Y H:i') }}</td>
                                                <td class="text-end">
                                                    <button class="btn btn-info">
                                                        <i class="ti ti-eye"></i> View
                                                    </button>
                                                    @if($ticket['status'] != 4) <!-- Se o ticket ainda não estiver resolvido -->
                                                    <form action="{{ route('support.tickets.resolve', $ticket['id']) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success">
                                                            <i class="ti ti-check"></i> Resolve
                                                        </button>
                                                    </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center text-muted">
                                                    <i class="ti ti-info-circle"></i> You have no tickets yet.
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
