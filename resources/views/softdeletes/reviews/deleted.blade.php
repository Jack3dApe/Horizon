@extends('layouts.admin.base')

@section('title', 'Deleted Reviews')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col mb-3 d-flex justify-content-between">
                <h1>Deleted Reviews</h1>
                <a href="{{ route('reviews.index') }}" class="btn btn-primary">Back to Reviews</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body border-bottom py-3">
                <div class="d-flex">
                    <div class="text-secondary">
                        Show
                        <div class="mx-2 d-inline-block">
                            <input type="text" class="form-control form-control-sm" value="10" size="3"
                                   aria-label="Number of entries">
                        </div>
                        Records
                    </div>
                    <div class="ms-auto text-secondary">
                        Search:
                        <div class="ms-2 d-inline-block">
                            <input type="text" class="form-control form-control-sm" size="30" aria-label="Search reviews">
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                    <tr>
                        <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all"></th>
                        <th class="w-1">ID</th>
                        <th>User</th>
                        <th>Game</th>
                        <th>Rating</th>
                        <th>Deleted At</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reviews as $review)
                        <tr>
                            <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select review"></td>
                            <td>{{ $review->id_review }}</td>
                            <td>{{ $review->user->username ?? 'Unknown' }}</td> {{-- Nome do usuário --}}
                            <td>{{ $review->game->name ?? 'Unknown Game' }}</td> {{-- Nome do jogo --}}
                            <td class="{{ $review->is_positive ? 'text-success' : 'text-danger' }}">
                                {{ $review->is_positive ? 'Positive' : 'Negative' }}
                            </td>
                            <td>{{ $review->deleted_at->format('d/m/Y') }}</td>
                            <td class="text-end">
                                {{-- Restore Button --}}
                                <form action="{{ route('reviews.restore', $review->id_review) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Restore</button>
                                </form>

                                {{-- Force Delete Button --}}
                                <form action="{{ route('reviews.forceDelete', $review->id_review) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Permanently delete this review?')">Force Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                {{ $reviews->links('layouts.admin.parts.paginationReview', ['reviews' => $reviews]) }}
            </div>
        </div>
    </div>
@endsection
