@extends('layouts.admin.base')
@section('title','Lista de publishers')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col mb-3 d-flex justify-content-end">
                <a href="{{route('publishers.create')}}" class="btn btn-primary">Criar Novo Autor</a>
            </div>

        </div>

        <div class="card">
            <div class="card-body border-bottom py-3">
                <div class="d-flex">
                    <div class="text-secondary">
                        Mostrar
                        <div class="mx-2 d-inline-block">
                            <input type="text" class="form-control form-control-sm" value="10" size="3"
                                   aria-label="Quantidade de entradas">
                        </div>
                        Registos
                    </div>
                    <div class="ms-auto text-secondary">
                        Procurar:
                        <div class="ms-2 d-inline-block">
                            <input type="text" class="form-control form-control-sm" size="30" aria-label="Procurar autor">
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                    <tr>
                        <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox"
                                               aria-label="Selecionar todos"></th>
                        <th class="w-1">ID</th>
                        <th>Nome</th>
                        <th>Biografia</th>
                        <th class="text-end">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($autores as $autor)
                        <tr>
                            <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                       aria-label="Selecionar autor"></td>
                            <td><span class="text-secondary">{{ $autor->id }}</span></td>
                            <td><a href="{{ route('publishers.show', $autor->id) }}" class="text-reset"
                                   tabindex="-1">{{ $autor->nome }}</a></td>
                            <td>{{ Str::limit($autor->biografia, 50) }}</td>
                            <td class="text-end">
                                <a href="{{ route('publishers.show', $autor->id) }}" class="btn btn-info"><i
                                        class="ti ti-eye"></i></a>
                                <a href="{{ route('publishers.edit', $autor->id) }}" class="btn btn-warning"><i
                                        class="fa fa-pencil" aria-hidden="true"></i></a>
                                <form action="{{ route('publishers.destroy', $autor->id) }}" method="POST"
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="ti ti-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                {{$autores->links('layouts.admin.parts.pagination',['publishers'=>$autores])}}
            </div>
        </div>
    </div>
@endsection
