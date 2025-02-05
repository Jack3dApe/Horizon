@extends('layouts.admin.base')

@section('title', 'Edit Publisher')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">

                    <div class="card-body">
                        <!-- Alerta para mensagem de erro geral -->
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

                        <form action="{{ route('publishers.update', $publisher->id_publisher) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="id" class="form-label required">ID</label>
                                <input type="text" id="id" name="id" class="form-control bg-light" value="{{ $publisher->id_publisher }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label required">Publisher Name</label>
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $publisher->name) }}" required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label required">Email</label>
                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $publisher->email) }}" required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="dateOfEstablishment" class="form-label">Date of Establishment</label>
                                <input type="date" id="dateOfEstablishment" name="dateOfEstablishment" class="form-control @error('dateOfEstablishment') is-invalid @enderror" value="{{ old('dateOfEstablishment', $publisher->dateOfEstablishment) }}">
                                @error('dateOfEstablishment')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Apply changes</button>
                                <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Specific scripts for this page -->
@endpush
