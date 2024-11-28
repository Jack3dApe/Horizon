@extends('layouts.admin.base')
@section('title', 'Create Review')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Create New Review</h4>
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

                        <form action="{{ route('reviews.store') }}" method="POST">
                            @csrf

                            {{--}}<div class="mb-3">
                                <label for="id_user" class="form-label required">User ID</label>
                                <input type="number" id="id_user" name="id_user" class="form-control @error('id_user') is-invalid @enderror" value="{{ old('id_user') }}" required>
                                @error('id_user')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="id_game" class="form-label required">Game ID</label>
                                <input type="number" id="id_game" name="id_game" class="form-control @error('id_game') is-invalid @enderror" value="{{ old('id_game') }}" required>
                                @error('id_game')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>{{--}}

                            <div class="mb-3">
                                <label for="is_positive" class="form-label required">What was the user rating?</label>
                                <select id="is_positive" name="is_positive" class="form-select @error('is_positive') is-invalid @enderror" required>
                                    <option value="1" {{ old('is_positive') == '1' ? 'selected' : '' }}>Positive</option>
                                    <option value="0" {{ old('is_positive') == '0' ? 'selected' : '' }}>Negative</option>
                                </select>
                                @error('is_positive')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="review_date" class="form-label required">Review Date</label>
                                <input type="date" id="review_date" name="review_date" class="form-control @error('review_date') is-invalid @enderror" value="{{ old('review_date') }}" required>
                                @error('review_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Create Review</button>
                                <a href="{{ route('reviews.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
