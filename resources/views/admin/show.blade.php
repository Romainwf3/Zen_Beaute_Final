@extends('layouts.app')

@section('content')
<div class="container mw-100">
    <div class="row justify-content-center">
            @if (session()->has('message'))
                <div class="col-6 mx-auto text-center alert @if (session()->has('status')) {{ session()->get('status') }} @else alert-success @endif mt-5" role="alert">
                    {{ session()->get('message') }}
                </div>
            @endif
        <div class="col-md-12 text-center policesnippet">
            <h2 class="container mx-auto">Edition catégorie: {{$categorie->nom}}</h2>
                <table class="table table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th>Nom</th>
                            <th>Description </th>
                            <th>Prix</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tr>
                        @foreach ($services as $service)
                            <td>{{$service->nom}}</td>
                            <td>{{$service->description}}</td>
                            <td>{{$service->prix}}€</td>
                            <td class="w-9 mx-auto">
                                <a href="/admin/{{$service->id}}/edit">
                                    <button class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </a>
                                <a class="btn btn-danger my-2" href="{{ route('admin.destroy', ['id' => $service->id] ) }}">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                    </tr>
                @endforeach
            </table>
            <br>
            <div class="col-md-6 mx-auto">
                    <a class="btn btn-block btn-warning"
                        href="{{ route('admin.index') }}">
                        Retourner à la liste des services
                    </a>
                </div>
        </div>
    </div>
</div>
@endsection
