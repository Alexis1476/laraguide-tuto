<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    //
    public function liste()
    {
        // dd() > Dump and die
        // Map() > Crée une nouvelle collection de données
        // Flatten() > Met une collection multi dans un array d'une seule dimension
        $messages = auth()->user()
            ->suivis
            ->map(function ($user) {
                return $user->messages;
            })->flatten();

        return View('news', [
            'messages' => $messages
        ]);
    }
}
