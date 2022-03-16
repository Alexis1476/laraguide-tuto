<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CompteController extends Controller
{
    //
    function accueil()
    {
        // auth()->check(); -> Dit si un utilisateur est connecté
        // auth()->guest() -> Si l'utilsiateur est un invité
        if (auth()->guest()) {
            return redirect('/connexion')->withErrors([
                'email' => 'Vous devez vous connecter pour voir cette page'
            ]);
        }
        return View('account');
    }
}
