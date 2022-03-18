@extends('layout')

@section('content')
    <div class="section">
        <h1 class="title is-1">{{$utilisateur->email}}</h1>
        @if(auth()->check() AND auth()->user()->id === $utilisateur->id)
            <form action="/messages" method="post">
                {{csrf_field()}}
                <div class="section">
                    <label class="label" for="message">Message</label>
                    <div class="control">
                        <textarea class="textarea" id="message" name="message"
                                  placeholder="Tapez votre message"></textarea>
                    </div>
                    @if($errors->has('message'))
                        <p class="help is-danger">{{$errors->first('message')}}</p>
                    @endif
                </div>

                <div class="field">
                    <div class="control">
                        <button class="button is-link" type="submit">Publier</button>
                    </div>
                </div>
            </form>
        @endif
    </div>
@endsection
