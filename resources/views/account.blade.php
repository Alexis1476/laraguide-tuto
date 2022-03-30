@extends('layout')

@section('content')
    <div class="section">
        <div class="media">
            <div class="media-left">
                <figure class="image is-48x48">
                    <img src="/storage/{{auth()->user()->avatar}}" alt="Avatar">
                </figure>
            </div>
            <div class="media-content">
                <h1 class="title is-1">Account</h1>
            </div>
        </div>
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
    <form class="section" action="/change-avatar" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="field">
            <label for="avatar" class="label">New avatar</label>
            <div class="control">
                <input class="input" id="avatar" type="file" name="avatar" placeholder="Avatar">
            </div>
            @if ($errors->has('avatar'))
                <p class="help is-danger">{{$errors->first('avatar')}}</p>
            @endif
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Modifier avatar</button>
            </div>
        </div>
    </form>
@endsection
