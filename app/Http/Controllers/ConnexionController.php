<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnexionController extends Controller
{
    //
    public function formulaire()
    {
        return View('connexion');
    }

    public function traitement()
    {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Authentification de laravel
        $resultat = auth()->attempt([
            'email' => request('email'),
            'password' => request('password')  // Password mot clé pour laravel
        ]);

        var_dump($resultat);
        // Laravel utilise par défaut class User.php, referencer dans auth.php
        return 'Traiter formulaire connexion';
    }
}
