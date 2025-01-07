@extends('layouts.admin.base')

@section('title', 'Create New Game')

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
                        <form action="{{route('games.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Imagens -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="icon" class="form-label">Game Icon</label>
                                        <input type="file" id="icon" name="icon" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="banner" class="form-label">Game Banner</label>
                                        <input type="file" id="banner" name="banner" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="screenshot_1" class="form-label">Screenshot 1</label>
                                        <input type="file" id="screenshot_1" name="screenshot_1" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="screenshot_2" class="form-label">Screenshot 2</label>
                                        <input type="file" id="screenshot_2" name="screenshot_2" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="screenshot_3" class="form-label">Screenshot 3</label>
                                        <input type="file" id="screenshot_3" name="screenshot_3" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="screenshot_4" class="form-label">Screenshot 4</label>
                                        <input type="file" id="screenshot_4" name="screenshot_4" class="form-control">
                                    </div>
                                </div>

                                <!-- Inputs de texto-->
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Game Name</label>
                                        <input type="text" id="name" name="name" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="id_publisher" class="form-label">Publisher</label>
                                        <select id="id_publisher" name="id_publisher" class="form-control" required>
                                            @foreach($publishers as $publisher)
                                                <option value="{{ $publisher->id_publisher }}">{{ $publisher->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="genres" class="form-label">Genres</label>
                                        <div id="genres-container">

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
                                        <input type="number" step="0.01" id="price" name="price" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="release_date" class="form-label">Release Date</label>
                                        <input type="date" id="release_date" name="release_date" class="form-control" required>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
