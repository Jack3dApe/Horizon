@extends('layouts.admin.base')

@section('title','Lista de genre de Obras')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{route('genres.create')}}" class="btn btn-primary">Create new genre</a>
                <div class="card mt-4">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="">ID</th>
                                <th>Name</th>
                                <th class="w-auto text-end">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Aqui, o loop deve ser substituído por uma lista de elementos gerada dinamicamente -->
                            @foreach($genres as $genre)
                                <tr>
                                    <td>{{$genre->id}}</td>
                                    <td>{{$genre->nome}}</td>
                                    <td class="text-end">

                                        <a href="{{route('genres.show',$genre)}}" class="btn btn-info "><i class="ti ti-eye"></i></a>
                                        <a href="{{route('genres.edit',$genre)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <form action="{{route('genres.destroy',$genre)}}" method="POST" style="display: inline" >
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
