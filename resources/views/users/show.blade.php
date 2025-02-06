@extends('layouts.admin.base')
@section('title','User Details')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-header bg-primary text-white d-flex align-items-center">
                        <h4 class="mb-0"><i class="ti ti-user"></i> User Details</h4>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="row align-items-center">
                            <!-- Coluna da Imagem de Perfil (Centralizada verticalmente) -->
                            <div class="col-md-4 d-flex align-items-center justify-content-center text-center">
                                <div>
                                    <img src="{{ $user->profile_pic ? asset($user->profile_pic) : asset('imgs/noProfilePic.jpg') }}"
                                         alt="User Profile Picture"
                                         width="150"
                                         class="img-thumbnail rounded-circle shadow-sm">
                                </div>
                            </div>

                            <!-- Coluna dos Detalhes do Utilizador -->
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label fw-bold"><i class="ti ti-key"></i> ID:</label>
                                    <p class="text-muted">{{ $user->id_user }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold"><i class="ti ti-user"></i> Username:</label>
                                    <p class="text-muted">{{ $user->username }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold"><i class="ti ti-mail"></i> Email:</label>
                                    <p class="text-muted">{{ $user->email }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold"><i class="ti ti-phone"></i> Phone:</label>
                                    <p class="text-muted">{{ $user->phone ?? 'Not Available' }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold"><i class="ti ti-shopping-cart"></i> Number of Purchases:</label>
                                    <p class="text-muted">{{ $user->purchases }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold"><i class="ti ti-id"></i> Role:</label>
                                    <p class="text-muted">{{ $user->getRoleNames()->join(', ') }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold"><i class="ti ti-shield-lock"></i> 2FA Enabled:</label>
                                    <p class="text-muted">{{ $user->is_2fa_enabled ? 'Yes' : 'No' }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold"><i class="ti ti-user-check"></i> Status:</label>
                                    <p>
                                        @if($user->status === 'Active')
                                            <span class="text-success">{{ $user->status }}</span>
                                        @elseif($user->status === 'Suspended')
                                            <span class="text-warning">{{ $user->status }}</span>
                                        @else
                                            <span class="text-danger">{{ $user->status }}</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Botões (Corrigidos e Uniformizados) -->
                        <div class="text-end mt-4">
                            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                                <i class="ti ti-list"></i> Show all users
                            </a>
                            <a href="{{ route('users.edit', $user->id_user) }}" class="btn btn-warning text-white rounded-pill px-4 py-2">
                                <i class="ti ti-pencil"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
