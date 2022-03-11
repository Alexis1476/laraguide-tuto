@extends('layout')

@section('content')
    <h1>Utilisateurs</h1>
    @foreach($utilisateurs as $utilisateur)
        <li>{{$utilisateur->email}}</li>
    @endforeach
@endsection
