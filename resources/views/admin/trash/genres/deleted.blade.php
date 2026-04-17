@extends('layouts.admin.base')

@section('title', 'Deleted Genres')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col mb-3 d-flex justify-content-end">
                <a href="{{ route('genres.index') }}" class="btn btn-primary">Back to Genres</a>
            </div>
        </div>

        <div class="card">
            <!--<div class="card-body border-bottom py-3">
                <div class="d-flex">
                    <div class="ms-auto text-secondary">-->
                        <!-- Formulário de pesquisa --> <!--
                        <form action="{{ route('deleted.genres.search') }}" method="GET" class="d-inline-block">
                            Search:
                            <div class="ms-2 d-inline-block">
                                <input type="text" name="query" value="{{ $query ?? '' }}" class="form-control form-control-sm"
                                       size="30" aria-label="Search deleted genres">
                            </div>
                        </form>
                    </div>
                </div>
            </div>-->
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                    <tr>
                        <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all"></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Deleted At</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($genres as $genre)
                        @if ($genre->deleted_at)
                            <tr>
                                <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select genre"></td>
                                <td>{{ $genre->id_genre }}</td>
                                <td>{{ $genre->name }}</td>
                                <td>{{ $genre->deleted_at->format('m/d/Y') }}</td>
                                <td class="text-end">
                                    <form action="{{ route('genres.restore', $genre->id_genre) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Restore</button>
                                    </form>
                                    <form action="{{ route('genres.forceDelete', $genre->id_genre) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Permanently delete this genre?')">Force Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex align-items-center">
                {{ $genres->links('layouts.admin.parts.paginationGenre', ['genres' => $genres]) }}
            </div>
        </div>
    </div>
@endsection
