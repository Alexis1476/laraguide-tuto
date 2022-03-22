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
            <a href="/" class="navbar-item {{ request()->is('/') ? 'is-active' : "" }}">Accueil</a>
        </div>
        <div class="navbar-end">
            @if(auth()->check())
                <a href="/account" class="navbar-item {{ request()->is('account') ? 'is-active' : '' }}">Mon compte</a>
                <a href="/deconnexion" class="navbar-item">Se déconnecter</a>
            @else
                <a href="/connexion" class="navbar-item {{ request()->is('connexion') ? 'is-active' : '' }}">Se connecter</a>
                <a href="/inscription" class="navbar-item {{ request()->is('inscription') ? 'is-active' : '' }}">S'inscrire</a>
            @endif
            <a></a>
        </div>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
</body>
</html>
