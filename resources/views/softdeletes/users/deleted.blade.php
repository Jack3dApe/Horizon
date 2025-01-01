@extends('layouts.admin.base')

@section('title', 'Deleted Users')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col mb-3 d-flex justify-content-between">
                <h1>Deleted Users</h1>
                <a href="{{ route('users.index') }}" class="btn btn-primary">Back to User List</a>
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
                            <input type="text" class="form-control form-control-sm" size="30" aria-label="Search user">
                        </div>
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
                        <th>Username</th>
                        <th>Email</th>
                        <th>Deleted At</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                       aria-label="Select user"></td>
                            <td>{{ $user->id_user }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->deleted_at->format('m/d/Y') }}</td>
                            <td class="text-end">
                                <form action="{{ route('users.restore', $user->id_user) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Restore</button>
                                </form>

                                <form action="{{ route('users.forceDelete', $user->id_user) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Permanently delete this user?')">Force Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                {{ $users->links('layouts.admin.parts.paginationUser', ['users' => $users]) }}
            </div>
        </div>
    </div>
@endsection
