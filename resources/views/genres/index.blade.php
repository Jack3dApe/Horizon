@extends('layouts.admin.base')

@section('title','Lista de tipo de Obras')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{route('tipos.create')}}" class="btn btn-primary">Criar Novo Tipo</a>
                <div class="card mt-4">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="">ID</th>
                                <th>Nome</th>
                                <th class="d-none d-md-table-cell">Descrição</th>
                                <th class="w-auto text-end">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Aqui, o loop deve ser substituído por uma lista de elementos gerada dinamicamente -->
                            @foreach($tipos as $tipo)
                                <tr>
                                    <td>{{$tipo->id}}</td>
                                    <td>{{$tipo->nome}}</td>
                                    <td class="d-none d-md-table-cell">{{str($tipo->descricao)->limit(25)}}</td>
                                    <td class="text-end">

                                        <a href="{{route('tipos.show',$tipo)}}" class="btn btn-info "><i class="ti ti-eye"></i></a>
                                        <a href="{{route('tipos.edit',$tipo)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <form action="{{route('tipos.destroy',$tipo)}}" method="POST" style="display: inline" >
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"><i class="ti ti-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
