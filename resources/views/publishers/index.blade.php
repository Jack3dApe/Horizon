@extends('layouts.admin.base')
@section('title', 'Publishers List')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col mb-3 d-flex justify-content-end">
                <a href="{{ route('publishers.create') }}" class="btn btn-primary">Create New Publisher</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body border-bottom py-3">
                <div class="d-flex">
                    <div class="ms-auto text-secondary">
                        <form action="{{ route('admin.search.publishers') }}" method="GET" class="d-inline-block">
                            Search:
                            <div class="ms-2 d-inline-block">
                                <input type="text" name="query" value="{{ $query ?? '' }}" class="form-control form-control-sm"
                                       size="30" aria-label="Search publisher">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                    <tr>
                        <th class="w-1"></th>
                        <th class="w-1">ID</th>
                        <th>Name</th>
                        <th>Number of Games</th>
                        <th>Email</th>
                        <th>Date of Establishment</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($publishers as $publisher)
                        <tr>
                            <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                       aria-label="Select publisher"></td>
                            <td><span class="text-secondary">{{ $publisher->id_publisher }}</span></td>
                            <td><a href="{{ route('publishers.show', $publisher->id_publisher) }}" class="text-reset"
                                   tabindex="-1">{{ $publisher->name }}</a></td>
                            <td>{{ $publisher->games_count }}</td>
                            <td>{{ $publisher->email }}</td>
                            <td>
                                @if ($publisher->dateOfEstablishment)
                                    {{ \Carbon\Carbon::parse($publisher->dateOfEstablishment)->format('d/m/Y') }}
                                @else
                                    Not available
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('publishers.show', $publisher) }}" class="btn btn-info">
                                    <i class="ti ti-eye"></i>
                                </a>
                                <a href="{{ route('publishers.edit', $publisher->id_publisher) }}" class="btn btn-warning">
                                    <i class="ti ti-pencil" aria-hidden="true"></i>
                                </a>
                                <form action="{{ route('publishers.destroy', $publisher->id_publisher) }}" method="POST"
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this publisher?')">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No publishers found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                {{ $publishers->links('layouts.admin.parts.paginationPublisher', ['publishers' => $publishers]) }}
            </div>
        </div>
    </div>
@endsection
