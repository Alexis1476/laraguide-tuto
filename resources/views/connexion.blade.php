@extends('layout')

@section('content')
    <form action="/connexion" method="post" class="section">
        {{--Dire que c'est bien nous qui avons effectué l'inscription--}}
        {{ csrf_field() }}

        <div class="field">
            <label for="email" class="label">Email</label>
            <div class="control">
                <input class="input" id="email" type="email" name="email" placeholder="Email" value="{{old('email')}}">
            </div>
            @if ($errors->has('email'))
                <p class="help is-danger">{{$errors->first('email')}}</p>
            @endif
        </div>

        <div class="field">
            <label for="password" class="label">Password</label>
            <div class="control">
                <input class="input" id="password" type="password" name="password" placeholder="Password">
            </div>
            @if ($errors->has('password'))
                <p class="help is-danger">{{$errors->first('password')}}</p>
            @endif
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Se connecter</button>
            </div>
        </div>
    </form>
@endsection
