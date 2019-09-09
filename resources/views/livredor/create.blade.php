<?php
$tit = "Les Bons cadeaux Zen et Beaut&eacute;, une id&eacute;e cadeau originale";
$des = "Nous nous chargeons d&#8217;envoyer votre bon cadeau.";
?>
@extends('layouts.app')
@section('content')
    <br>
    @if (session()->has('valide'))
    <div class="col-6 mx-auto text-center alert alert-success mt-5" role="alert">
        {{ session()->get('valide') }}
    </div>
    @endif
    @if (session()->has('supp'))
    <div class="col-6 mx-auto text-center alert alert-danger mt-5" role="alert">
        {{ session()->get('supp') }}
    </div>
    @endif
    <br>
    <h1 class="text-center policesnippet">Modération Commentaires</h1>
    <br>
    {{ $comments->links() }}
    <table class="col-6 mx-auto table table-hover table-bordered policesnippet text-center">
        <thead class="thead-dark">
            <tr>
                <th>Nom/Pseudo</th>
                <th>Commentaire</th>
                <th>Date création</th>
                <th>Modération</th>
            </tr>
        </thead>
        @foreach($comments as $comment)
            <tr>
                <td>{{ $comment->pseudo}}</td>
                <td>{{ $comment->content}}</td>
                <td>{{ $comment->created_at->format('d/m/Y H:i:s') }}</td>
                <td class="text-right w-9">
                    <!-- Formulaire de création -->
                    <form action="{{ route('livredor.showComment', $comment->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        @if($comment->active)
                            <button class="btn btn-warning">
                                <i class="fas fa-check-square"></i>
                            </button>
                        @else
                            <button class="btn btn-success">
                                <i class="fas fa-check-square"></i>
                            </button>
                        @endif
                    </form>
                    <a class="btn btn-danger my-2" href="{{ route('livredor.destroy', ['id' => $comment->id] ) }}">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="container col-md-12 mt-2 mx-auto">
        <a href="{{ route('gate') }}" class="col-2 mt-2 mx-auto btn btn-warning">Retourner sur l'accueil</a>
    </div>
    {{ $comments->links() }}
    <div class="col-md-6 mt-2 mx-auto">
        @if (session()->has('danger'))
        <div class="col-6 mx-auto text-center alert alert-danger mt-5" role="alert">
            {{ session()->get('danger') }}
        </div>
        <br>
    </div>
    @endif
@endsection
