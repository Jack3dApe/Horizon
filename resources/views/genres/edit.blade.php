@extends('layouts.admin.base')

@section('title', 'Edit Genre')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit genre</h4>
                    </div>
                    <div class="card-body">
                        <!-- Alerta para mensagem de erro geral -->
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

                        <form action="{{ route('genres.update', $genre->id_genres) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="id" class="form-label required">ID</label>
                                <input type="text" id="id" name="id" class="form-control bg-light" value="{{ $genre->id_genres }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label required">Name of the genre</label>
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $genre->name) }}" required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Apply changes</button>
                                <a href="{{ url()->previous()}}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Scripts específicos para a página -->
@endpush
