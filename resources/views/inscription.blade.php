@extends('layout')

@section('content')
    <form action="/inscription" method="post">
        {{--Dire que c'est bien nous qui avons effectué l'inscription--}}
        {{ csrf_field() }}
        <p><input type="email" name="email" placeholder="Email" value="{{old('email')}}"></p>
        @if ($errors->has('email'))
            <p>{{$errors->first('email')}}</p>
        @endif

        <p><input type="password" name="password" placeholder="Password"></p>
        @if ($errors->has('password'))
            <p>{{$errors->first('password')}}</p>
        @endif

        <p><input type="password" name="password_confirmation" placeholder="Password (Confirmation)"></p>
        @if ($errors->has('password_confirmation'))
            <p>{{$errors->first('password_confirmation')}}</p>
        @endif

        <input type="submit" value="S'inscrire">
    </form>
@endsection
