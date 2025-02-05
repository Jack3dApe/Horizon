@extends('layouts.admin.base')
@section('title','Show Publisher')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Publisher Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">ID:</label>
                            <p>{{ $publisher->id_publisher }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Publisher Name:</label>
                            <p>{{ $publisher->name }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Number of Games:</label>
                            <p>{{ $publisher->games_count ?? 'N/A' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email:</label>
                            <p>{{ $publisher->email }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date of Establishment:</label>
                            <p>{{ $publisher->dateOfEstablishment ? \Carbon\Carbon::parse($publisher->dateOfEstablishment)->format('m/d/Y') : 'N/A' }}</p>
                        </div>
                        <div class="text-end">
                            <a href="{{ route('publishers.index') }}" class="btn btn-secondary mt-3">Show all publishers</a>
                            <a href="{{ route('publishers.edit', $publisher) }}" class="btn btn-warning mt-3"><i class="ti ti-pencil" aria-hidden="true"></i> Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
