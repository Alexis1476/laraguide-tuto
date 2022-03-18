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

        Message::create([
            'idUtilisateur' => auth()->user()->id,
            'contenu' => \request('message')
        ]);

        return back();
    }
}
