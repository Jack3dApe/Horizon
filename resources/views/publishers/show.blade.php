@extends('layouts.admin.base')
@section('title','Mostrar Autor')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Detalhes do Autor</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">ID:</label>
                            <p>{{ $autor->id }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nome do Autor:</label>
                            <p>{{ $autor->nome }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Biografia:</label>
                            <p>{{ $autor->biografia ?? 'N/A' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto:</label>
                            <div>

                                <img src="{{$autor->foto ? asset('storage/'.$autor->foto) : asset('imgs/no-image.png')}}" alt="Foto do Autor" width="150">
                            </div>
                        </div>
                        <div class="text-end">
                            <a href="{{ route('publishers.index') }}" class="btn btn-secondary">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
