@extends('layouts.admin.base')
@section('title', 'Show Review')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-header bg-primary text-white d-flex align-items-center">
                        <h4 class="mb-0"><i class="ti ti-message-circle"></i> Review Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="ti ti-key"></i> ID:</label>
                            <p class="text-muted">{{ $review->id_review }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="ti ti-user"></i> User:</label>
                            <p class="text-muted">{{ $review->user->username ?? 'N/A' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="ti ti-device-gamepad"></i> Game:</label>
                            <p class="text-muted">{{ $review->game->name ?? 'N/A' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="ti ti-star"></i> Rating:</label>
                            <p class="text-muted">
                                @if($review->is_positive)
                                    <span class="text-success">Positive</span>
                                @else
                                    <span class="text-danger">Negative</span>
                                @endif
                            </p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="ti ti-file-text"></i> Description:</label>
                            <p class="text-muted">{{ $review->description ?? 'N/A' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="ti ti-calendar"></i> Review Date:</label>
                            <p class="text-muted">
                                {{ $review->review_date ? \Carbon\Carbon::parse($review->review_date)->format('Y-m-d') : 'N/A' }}
                            </p>
                        </div>

                        <!-- Botões -->
                        <div class="text-end mt-4">
                            <a href="{{ route('reviews.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                                <i class="ti ti-list"></i> Show all reviews
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
