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

        /*$messages = auth()->user()
            ->suivis
            ->map(function ($user) {
                return $user->messages;
            })->flatten()
            ->sortByDesc(function ($message) {
                return $message->created_at;
            });*/

        //$usersSuivis->load('messages'); // Une seule requête SQL pour charger les messages

        /* $messages = auth()->user()
             ->suivis->flatMap->messages // Appel function map -> retourne messages orderProxy
             ->sortByDesc->created_at;*/ // Methode sortBy created_at
        $messages = auth()->user()
            ->suivis->load('messages')->flatMap
            ->messages->sortByDesc->create_at;

        return View('news', [
            'messages' => $messages
        ]);
    }
}
