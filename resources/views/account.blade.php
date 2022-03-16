@extends('layout')

@section('content')
    <div class="section">
        <h1 class="title is-1">Account</h1>
        <p>Bienvenue</p>
        <a class="button" href="/deconnexion">Se deconnecter</a>
    </div>
    <form class="section" action="/change-password" method="post">
        {{csrf_field()}}
        <div class="field">
            <label for="password" class="label">New password</label>
            <div class="control">
                <input class="input" id="password" type="password" name="password" placeholder="Password">
            </div>
            @if ($errors->has('password'))
                <p class="help is-danger">{{$errors->first('password')}}</p>
            @endif
        </div>

        <div class="field">
            <label for="password_confirmation" class="label">Password confirmation</label>
            <div class="control">
                <input class="input" id="password_confirmation" type="password" name="password_confirmation"
                       placeholder="Password (Confirmation)">
            </div>
            @if ($errors->has('password_confirmation'))
                <p class="help is-danger">{{$errors->first('password_confirmation')}}</p>
            @endif
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Modifier mot de passe</button>
            </div>
        </div>
    </form>
@endsection
