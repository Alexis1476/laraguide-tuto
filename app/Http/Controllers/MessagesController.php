<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessagesController extends Controller
{
    //
    public function nouveau()
    {
        \request()->validate(['message' => ['required']]);

        /* Crée un nouveau message sur l'utilisateur connecté
        Met l'id user automatiquement
        */
        auth()->user()->messages()->create(['contenu' => \request('message')]);
       /* Message::create([
            'idUtilisateur' => auth()->user()->id,
            'contenu' => \request('message')
        ]);*/

        return back();
    }
}
