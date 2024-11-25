@extends('layouts.admin.base')

@section('title', 'Editar o Tipo de Obra')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Tipo de Obra</h4>
                    </div>
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

                        <form action="{{ route('tipos.update', $tipo->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="id" class="form-label required">ID</label>
                                <input type="text" id="id" name="id" class="form-control bg-light" value="{{ $tipo->id }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="nome" class="form-label required">Nome do Tipo de Obra</label>
                                <input type="text" id="nome" name="nome" class="form-control @error('nome') is-invalid @enderror" value="{{ old('nome', $tipo->nome) }}" required>
                                @error('nome')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="descricao" class="form-label">Descrição</label>
                                <textarea id="descricao" name="descricao" class="form-control @error('descricao') is-invalid @enderror" rows="4" required>{{ old('descricao', $tipo->descricao) }}</textarea>
                                @error('descricao')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                                <a href="{{ url()->previous()}}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Scripts específicos para a página -->
@endpush
