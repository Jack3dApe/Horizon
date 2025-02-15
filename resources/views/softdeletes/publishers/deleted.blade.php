@extends('layouts.admin.base')

@section('title', 'Deleted Publishers')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col mb-3 d-flex justify-content-end">
                <a href="{{ route('publishers.index') }}" class="btn btn-primary">Back to Publishers</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body border-bottom py-3">
                <div class="d-flex">
                    <div class="ms-auto text-secondary">
                        <!-- Formulário de pesquisa -->
                        <form action="{{ route('deleted.publishers.search') }}" method="GET" class="d-inline-block">
                            Search:
                            <div class="ms-2 d-inline-block">
                                <input type="text" name="query" value="{{ $query ?? '' }}" class="form-control form-control-sm"
                                       size="30" aria-label="Search deleted publishers">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                    <tr>
                        <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox"
                                               aria-label="Select all"></th>
                        <th class="w-1">ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Deleted At</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($publishers as $publisher)
                        @if ($publisher->deleted_at)
                            <tr>
                                <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                           aria-label="Select publisher"></td>
                                <td>{{ $publisher->id_publisher }}</td>
                                <td>{{ $publisher->name }}</td>
                                <td>{{ $publisher->email ?? 'N/A' }}</td>
                                <td>{{ $publisher->deleted_at ? $publisher->deleted_at->format('m/d/Y') : 'N/A' }}</td>
                                <td class="text-end">
                                    {{-- Restore Button --}}
                                    <form action="{{ route('publishers.restore', $publisher->id_publisher) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Restore</button>
                                    </form>

                                    {{-- Force Delete Button --}}
                                    <form action="{{ route('publishers.forceDelete', $publisher->id_publisher) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Permanently delete this publisher?')">Force Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                {{ $publishers->links('layouts.admin.parts.paginationPublisher', ['publishers' => $publishers]) }}
            </div>
        </div>
    </div>
@endsection
