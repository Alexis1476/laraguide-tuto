@extends('layout')

@section('content')
    <form action="/inscription" method="post">
        {{--Dire que c'est bien nous qui avons effectué l'inscription--}}
        {{ csrf_field() }}
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" value="S'inscrire">
    </form>
@endsection
