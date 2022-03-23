@extends('layout')

@section('content')
    <div class="section">
        @auth
            <section class="section">
                <h2 class="title is-2">Utilisateurs suivis</h2>
                @forelse(auth()->user()->suivis as $utilisateur)
                    <ul>
                        @foreach(auth()->user()->suivis as $utilisateur)
                            <li>
                                <a href="/{{$utilisateur->email}}">{{$utilisateur->email}}</a>
                            </li>
                        @endforeach
                    </ul>
                @empty
                    Vous ne suivez aucun utilisateur
                @endforelse
            </section>
        @endauth

        <section class="section">
            <h2 class="title is-2">Utilisateurs</h2>
            <ul>
                @foreach($utilisateurs as $utilisateur)
                    <li>
                        <a href="/{{$utilisateur->email}}">{{$utilisateur->email}}</a>
                    </li>
                @endforeach
            </ul>
        </section>
    </div>
@endsection
