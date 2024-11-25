@extends('layouts.admin.base')

@section('title','Criar autor')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Criar Novo Autor</h4>
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
                        <form action="{{route('publishers.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome do Autor</label>
                                <input type="text" id="nome" name="nome" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="biografia" class="form-label">Biografia</label>
                                <textarea id="biografia" name="biografia" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" id="foto" name="foto" class="form-control">
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <a href="{{route('publishers.index')}}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
