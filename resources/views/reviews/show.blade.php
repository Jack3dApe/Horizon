@extends('layouts.admin.base')
@section('title', 'Show Review')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Review Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Review ID:</label>
                            <p>{{ $review->id_review }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">User:</label>
                            <p>{{ $review->user->username ?? 'N/A' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Game:</label>
                            <p>{{ $review->game->name ?? 'N/A' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Rating:</label>
                            <p>{{ $review->is_positive ? 'Positive' : 'Negative' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description:</label>
                            <p>{{ $review->description ?? 'N/A' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Review Date:</label>
                            <p>{{ $review->review_date ?? 'N/A' }}</p>
                        </div>
                        <div class="text-end">
                            <a href="{{ route('reviews.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
