@extends('layouts.admin.base')
@section('title', 'User List')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col mb-3 d-flex justify-content-end">
                <a href="{{ route('users.create') }}" class="btn btn-primary">Create New User</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body border-bottom py-3">
                <div class="d-flex">
                    <div class="ms-auto text-secondary">
                        <!-- Formulário de pesquisa -->
                        <form action="{{ route('admin.search.users') }}" method="GET" class="d-inline-block">
                            Search:
                            <div class="ms-2 d-inline-block">
                                <input type="text" name="query" value="{{ $query ?? '' }}" class="form-control form-control-sm"
                                       size="30" aria-label="Search user">
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
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Purchases</th>
                        <th>Role</th>
                        <th>2FA Enabled</th>
                        <th>Created At</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select user"></td>
                            <td><span class="text-secondary">{{ $user->id_user }}</span></td>
                            <td><a href="{{ route('users.show', $user->id_user) }}" class="text-reset" tabindex="-1">{{ $user->username }}</a></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone ?? 'Not Available' }}</td>
                            <td>{{ $user->purchases }}</td>
                            <td>{{ $user->getRoleNames()->join(', ') }}</td>
                            <td>{{ $user->is_2fa_enabled ? 'Yes' : 'No' }}</td>
                            <td>{{ $user->created_at->format('m/d/Y') }}</td>
                            <td>
                                @if ($user->status === 'Active')
                                    <span class="text-success">{{ $user->status }}</span>
                                @elseif ($user->status === 'Suspended')
                                    <span class="text-warning">{{ $user->status }}</span>
                                @else
                                    <span class="text-danger">{{ $user->status }}</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('users.show', $user->id_user) }}" class="btn btn-info"><i class="ti ti-eye"></i></a>
                                <a href="{{ route('users.edit', $user->id_user) }}" class="btn btn-warning"><i class="ti ti-pencil" aria-hidden="true"></i></a>
                                <form action="{{ route('users.destroy', $user->id_user) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to soft delete this user?')">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center">No users found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                {{ $users->links('layouts.admin.parts.paginationUser', ['users' => $users]) }}
            </div>
        </div>
    </div>
@endsection
