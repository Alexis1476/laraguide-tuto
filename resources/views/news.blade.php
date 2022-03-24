@extends('layout')

@section('content')
    <div class="section">
        <h1 class="title is-1">Actualités</h1>

        @foreach($messages as $message)
            <hr>
            <p>
                <strong>{{$message->created_at}}</strong>
                {{$message->contenu}}
            </p>
        @endforeach
    </div>
@endsection
