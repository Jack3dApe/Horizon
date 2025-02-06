@extends('layouts.admin.base')
@section('title','Show Publisher')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-header bg-primary text-white d-flex align-items-center">
                        <h4 class="mb-0"><i class="ti ti-building"></i> Publisher Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="ti ti-key"></i> ID:</label>
                            <p class="text-muted">{{ $publisher->id_publisher }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="ti ti-user"></i> Publisher Name:</label>
                            <p class="text-muted">{{ $publisher->name }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="ti ti-gamepad"></i> Number of Games:</label>
                            <p class="text-muted">{{ $publisher->games_count ?? 'N/A' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="ti ti-mail"></i> Email:</label>
                            <p class="text-muted">{{ $publisher->email }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="ti ti-calendar"></i> Date of Establishment:</label>
                            <p class="text-muted">
                                {{ $publisher->dateOfEstablishment ? \Carbon\Carbon::parse($publisher->dateOfEstablishment)->format('m/d/Y') : 'N/A' }}
                            </p>
                        </div>
                        <div class="text-end mt-4">
                            <a href="{{ route('publishers.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                                <i class="ti ti-list"></i> Show all publishers
                            </a>
                            <a href="{{ route('publishers.edit', $publisher) }}" class="btn btn-warning text-white rounded-pill px-4 py-2">
                                <i class="ti ti-pencil"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
