@extends('layouts.admin.base')

@section('title','Detalhes do Tipo de Obra')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <!-- Alerta para mensagem de sucesso -->
                        @if(session('success'))
                            <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                                {{session('success')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <h3>[#{{$tipo->id}}] {{$tipo->nome}}</h3>
                        <p>{{$tipo->descricao}}</p>
                    </div>
                </div>
                <a href="{{route('tipos.index')}}" class="btn btn-secondary mt-3">Listar todos os Tipos de Obras</a>
                <a href="{{route('tipos.edit',$tipo)}}" class="btn btn-warning mt-3"><i class="fa fa-pencil" aria-hidden="true"></i>Editar</a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successAlert = document.getElementById('success-alert');//
            if (successAlert) {
                setTimeout(function() {
                    // Adiciona a classe 'fade' e remove a classe 'show' para iniciar a transição de fechamento
                    successAlert.classList.remove('show');
                    successAlert.classList.add('fade');

                    // Remove o elemento do DOM depois da transição
                    setTimeout(function() {
                        successAlert.remove();
                    }, 500); // Ajuste o tempo conforme o efeito 'fade'
                }, 3000); // Fecha o alerta após 3 segundos
            }
        });
    </script>
@endpush
