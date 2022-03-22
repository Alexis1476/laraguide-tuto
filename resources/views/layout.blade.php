<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
<nav class="navbar is-light">
    <div class="navbar-menu">
        <div class="navbar-start">
            {{-- Laravel utilise des points pour séparer les dossiers des fichiers --}}
            @include('partials.navbar-item', ['lien' => '/', 'texte' => 'Accueil'])
            @auth() {{--Remplace le if(auth()->check()gi)--}}
                @include('partials.navbar-item', ['lien' => auth()->user()->email, 'texte' => auth()->user()->email])
            @endauth
        </div>
        <div class="navbar-end">
            @if(auth()->check())
                @include('partials.navbar-item', ['lien' => 'account', 'texte' => 'Mon compte'])
                @include('partials.navbar-item', ['lien' => 'deconnexion', 'texte' => 'Se déconnecter'])
            @else
                @include('partials.navbar-item', ['lien' => 'connexion', 'texte' => 'Se connecter'])
                @include('partials.navbar-item', ['lien' => 'inscription', 'texte' => 'S\'inscrire'])
            @endif
        </div>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
</body>
</html>
