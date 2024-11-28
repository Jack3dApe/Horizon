@extends('layouts.admin.base')
@section('title','User Details')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">ID:</label>
                            <p>{{ $user->id_user }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username:</label>
                            <p>{{ $user->username }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email:</label>
                            <p>{{ $user->email }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone:</label>
                            <p>{{ $user->phone ?? 'Not Available' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Number of Purchases:</label>
                            <p>{{ $user->purchases }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role:</label>
                            <p>{{ ucfirst($user->role) }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">2FA Enabled:</label>
                            <p>{{ $user->is_2fa_enabled ? 'Yes' : 'No' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Profile Picture:</label>
                            <div>
                                <img src="{{ $user->profile_pic ? asset('storage/' . $user->profile_pic) : asset('imgs/noProfilePic.jpg') }}" alt="User Profile Picture" width="150">
                            </div>
                        </div>
                        <div class="text-end">
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
