<?php
$tit = "Formulaire de contact : Zen et Beaut&eacute;";
$des = "Selon la disponibilit&eacute; Zen et Beaut&eacute; s'engage &agrave; r&eacute;pondre dans les plus brefs d&eacute;lais.";
?>
@extends('layouts.app')
@section('content')
<div class="col-12 col-sm-12 mx-auto card text-center mt-5 border-primary  policesnippet">
    <div class="col-12 card-body mx-auto">
        <h3 class="card-title mb-2">Panel d'administration</h3>
        <a href="{{ route('livredor.create') }}" class="btn btn-success col-4 mt-2">Validation Livre d'or</a>
        <a href="{{ route('admin.index') }}" class="btn btn-primary col-4 mt-2">Gestion des services</a>
        <a href="{{ route('home') }}" class="btn btn-warning col-4 mt-2">Retourner sur le site</a>
        <a href="{{ url('/logout') }}" class="col-3 btn btn-danger mt-2 col-4">Se déconnecter</a>
    </div>
</div>
@endsection
