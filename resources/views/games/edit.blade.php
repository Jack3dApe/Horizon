@extends('layouts.admin.base')

@section('title', 'Edit Game')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-body">
                        <!-- General Alert -->
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <form action="{{ route('games.update', $game->id_game) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <!-- Imagens -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="icon" class="form-label">Game Icon</label>
                                        <input type="file" id="icon" name="icon" class="form-control">
                                        @if($game->icon)
                                            <img src="{{ asset('icons/' . $game->icon) }}" alt="Icon" class="img-thumbnail mt-2" width="100">
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="banner" class="form-label">Game Banner</label>
                                        <input type="file" id="banner" name="banner" class="form-control">
                                        @if($game->banner)
                                            <img src="{{ asset('imgs/banners/' . $game->banner) }}" alt="Banner" class="img-thumbnail mt-2" width="300">
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="grid" class="form-label">Grid</label>
                                        <input type="file" id="grid" name="grid" class="form-control">
                                        @if($game->grid)
                                            <img src="{{ asset('imgs/grids/' . $game->grid) }}" alt="Grid" class="img-thumbnail mt-2" width="200">
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="logo" class="form-label">Logo</label>
                                        <input type="file" id="logo" name="logo" class="form-control">
                                        @if($game->grid)
                                            <img src="{{ asset('imgs/logos/' . $game->logo) }}" alt="Logo" class="img-thumbnail mt-2" width="200">
                                        @endif
                                    </div>

                                </div>

                                <!-- Inputs de texto-->
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Game Name</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $game->name) }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="id_publisher" class="form-label">Publisher</label>
                                        <select id="id_publisher" name="id_publisher" class="form-control" required>
                                            @foreach($publishers as $publisher)
                                                <option value="{{ $publisher->id_publisher }}" {{ $publisher->id_publisher == $game->id_publisher ? 'selected' : '' }}>
                                                    {{ $publisher->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="genres" class="form-label">Genres</label>
                                        <div id="genres-container">
                                            @foreach($game->genres as $genre)
                                                <div class="input-group mb-2 genre-group">
                                                    <input type="text" class="form-control" value="{{ $genre->name }}" readonly>
                                                    <input type="hidden" name="genres[]" value="{{ $genre->id_genre }}">
                                                    <button type="button" class="btn btn-danger remove-genre">
                                                        <i class="ti ti-minus"></i>
                                                    </button>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="input-group mb-3">
                                            <select id="genre-selector" class="form-control">
                                                <option value="" selected disabled>-- Select Genre --</option>
                                                @foreach($genres as $genre)
                                                    <option value="{{ $genre->id_genre }}" data-name="{{ $genre->name }}">{{ $genre->name }}</option>
                                                @endforeach
                                            </select>
                                            <button type="button" id="add-genre" class="btn btn-success">
                                                <i class="ti ti-plus"></i> Add Genre
                                            </button>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="number" step="0.01" id="price" name="price" class="form-control" value="{{ old('price', $game->price) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description_en" class="form-label">Description (English)</label>
                                        <textarea id="description_en" name="description_en" class="form-control" rows="5" placeholder="Enter game description in English"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description_pt" class="form-label">Description (Portuguese)</label>
                                        <textarea id="description_pt" name="description_pt" class="form-control" rows="5" placeholder="Enter game description in Portuguese"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="release_date" class="form-label">Release Date</label>
                                        <input type="date" id="release_date" name="release_date" class="form-control" value="{{ old('release_date', $game->release_date ? $game->release_date->format('Y-m-d') : '' ) }}" required>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="{{route('games.index')}}" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
