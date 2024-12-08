@extends('layouts.admin.base')

@section('title','Genres list')

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
                            @foreach($genres as $genre)
                                <tr>
                                    <td>{{$genre->id_genres}}</td>
                                    <td>{{$genre->name}}</td>
                                    <td class="text-end">

                                        <a href="{{ route('genres.edit',$genre)}}" class="btn btn-warning"><i class="ti ti-pencil" aria-hidden="true"></i></a>
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
        <div class="card-footer d-flex align-items-center">
            {{$genres->links('layouts.admin.parts.paginationGenre',['genres'=>$genres])}}
        </div>
        </div>
    </div>
@endsection
