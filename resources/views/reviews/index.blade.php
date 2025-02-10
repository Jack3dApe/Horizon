@extends('layouts.admin.base')
@section('title', 'Reviews List')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col mb-3 d-flex justify-content-end"></div>
        </div>

        <div class="card">
            <div class="card-body border-bottom py-3">
                <div class="d-flex">
                    <div class="ms-auto text-secondary">
                        <form action="{{ route('admin.search.reviews') }}" method="GET" class="d-inline-block">
                            Search:
                            <div class="ms-2 d-inline-block">
                                <input type="text" name="query" value="{{ $query ?? '' }}" class="form-control form-control-sm"
                                       size="30" aria-label="Search review">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                    <tr>
                        <th class="w-1">ID</th>
                        <th>User</th>
                        <th>Game</th>
                        <th>Rating</th>
                        <th>Review Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($reviews as $review)
                        <tr>
                            <td><span class="text-secondary">{{ $review->id_review }}</span></td>
                            <td>{{ $review->user->username ?? 'Deleted User' }}</td>
                            <td>{{ $review->game->name ?? 'Deleted Game' }}</td>
                            <td class="{{ $review->is_positive ? 'text-success' : 'text-danger' }}">
                                {{ $review->is_positive ? 'Positive' : 'Negative' }}
                            </td>
                            <td>{{ \Carbon\Carbon::parse($review->review_date)->format('d/m/Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('reviews.show', $review->id_review) }}" class="btn btn-info"><i class="ti ti-eye"></i></a>
                                <form action="{{ route('reviews.destroy', $review->id_review) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this review?')">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No reviews found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                {{ $reviews->links('layouts.admin.parts.paginationReview', ['reviews' => $reviews]) }}
            </div>
        </div>
    </div>
@endsection
