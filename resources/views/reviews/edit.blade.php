@extends('layouts.admin.base')
@section('title', 'Edit Review')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
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

                        <form action="{{ route('reviews.update', $review->id_review) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="is_positive" class="form-label">Rating</label>
                                <select id="is_positive" name="is_positive" class="form-control @error('is_positive') is-invalid @enderror" required>
                                    <option value="1" {{ $review->is_positive ? 'selected' : '' }}>Positive</option>
                                    <option value="0" {{ !$review->is_positive ? 'selected' : '' }}>Negative</option>
                                </select>
                                @error('is_positive')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description', $review->description) }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="review_date" class="form-label">Review Date</label>
                                <input type="date" id="review_date" name="review_date" class="form-control @error('review_date') is-invalid @enderror" value="{{ old('review_date', $review->review_date) }}" required>
                                @error('review_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <a href="{{ route('reviews.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
