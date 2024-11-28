@extends('layouts.admin.base')
@section('title', 'Reviews List')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col mb-3 d-flex justify-content-end">
                <a href="{{ route('reviews.create') }}" class="btn btn-primary">Create New Review</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body border-bottom py-3">
                <div class="d-flex">
                    <div class="text-secondary">
                        Show
                        <div class="mx-2 d-inline-block">
                            <input type="text" class="form-control form-control-sm" value="10" size="3" aria-label="Number of entries">
                        </div>
                        Records
                    </div>
                    <div class="ms-auto text-secondary">
                        Search:
                        <div class="ms-2 d-inline-block">
                            <input type="text" class="form-control form-control-sm" size="30" aria-label="Search review">
                        </div>
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
                        <th>Review Description</th>
                        <th>Rating</th>
                        <th>Review Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reviews as $review)
                        <tr>
                            <td><span class="text-secondary">{{ $review->id_review }}</span></td>
                            {{--}}<td>{{ $review->user->username }}</td> {{--}}
                            {{--}}<td>{{ $review->game->title }}</td> {{--}}
                            <td>{{ $review->id_user }}</td>
                            <td>{{ $review->id_game }}</td>
                            <td>{{ Str::limit($review->description, 50) }}</td>
                            <td>{{ $review->is_positive ? 'Positive' : 'Negative' }}</td>
                            <td>{{ \Carbon\Carbon::parse($review->review_date)->format('d/m/Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('reviews.show', $review->id_review) }}" class="btn btn-info"><i class="ti ti-eye"></i></a>
                                <a href="{{ route('reviews.edit', $review->id_review) }}" class="btn btn-warning"><i class="ti ti-pencil" aria-hidden="true"></i></a>
                                <form action="{{ route('reviews.destroy', $review->id_review) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this review?')">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                {{$reviews->links('layouts.admin.parts.paginationReview', ['reviews' => $reviews])}}
            </div>
        </div>
    </div>
@endsection
