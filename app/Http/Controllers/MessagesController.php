<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessagesController extends Controller
{
    //
    public function nouveau()
    {
        if (auth()->guest()) {
            return redirect('/connexion')->withErrors([
                'email' => 'Vous devez vous connecter pour voir cette page'
            ]);
        }

        \request()->validate(['message' => ['required']]);

        Message::create([
            'idUtilisateur' => auth()->user()->id,
            'contenu' => \request('message')
        ]);

        return back();
    }
}
