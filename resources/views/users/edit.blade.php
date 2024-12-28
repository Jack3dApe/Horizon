@extends('layouts.admin.base')

@section('title','Edit User')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-body">
                        <!-- Alerta -->
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

                        <form action="{{ route('users.update', $user->id_user) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $user->username) }}" required>
                                @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $user->phone) }}">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="purchases" class="form-label">Purchases</label>
                                <input type="number" id="purchases" name="purchases" class="form-control @error('purchases') is-invalid @enderror" value="{{ old('purchases', $user->purchases) }}" min="0">
                                @error('purchases')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select id="role" name="role" class="form-control @error('role') is-invalid @enderror">
                                    <option value="clients" {{ $user->hasRole('clients') ? 'selected' : '' }}>Client</option>
                                    <option value="admin" {{ $user->hasRole('admin') ? 'selected' : '' }}>Admin</option>
                                </select>
                                @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="is_2fa_enabled" class="form-label">2FA Enabled</label>
                                <select id="is_2fa_enabled" name="is_2fa_enabled" class="form-control @error('is_2fa_enabled') is-invalid @enderror">
                                    <option value="0" {{ !$user->is_2fa_enabled ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ $user->is_2fa_enabled ? 'selected' : '' }}>Yes</option>
                                </select>
                                @error('is_2fa_enabled')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="Active" {{ $user->status === 'Active' ? 'selected' : '' }}>Active</option>
                                    <option value="Suspended" {{ $user->status === 'Suspended' ? 'selected' : '' }}>Suspended</option>
                                    <option value="Banned" {{ $user->status === 'Banned' ? 'selected' : '' }}>Banned</option>
                                </select>
                                @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="profile_pic" class="form-label">Profile Picture</label>
                                <input type="file" id="profile_pic" name="profile_pic" class="form-control @error('profile_pic') is-invalid @enderror">
                                @if($user->profile_pic)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/'.$user->profile_pic) }}" alt="User Profile Picture" width="100">
                                    </div>
                                @endif
                                @error('profile_pic')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Apply Changes</button>
                                <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
