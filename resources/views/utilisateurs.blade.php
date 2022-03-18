@extends('layout')

@section('content')
    <div class="section">
        <h1 class="title is-1">Utilisateurs</h1>
        <ul>
            @foreach($utilisateurs as $utilisateur)
                <li>
                    <a href="/{{$utilisateur->email}}">{{$utilisateur->email}}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
