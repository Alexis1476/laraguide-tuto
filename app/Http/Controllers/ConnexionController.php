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
        // Laravel utilise par défaut class User.php, referencer dans auth.php!

        // Valider les champs
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Authentification de laravel
        $resultat = auth()->attempt([
            // 'clé' correspand à la colonne dans la table
            'email' => request('email'),
            'password' => request('password')  // Password mot clé pour laravel
        ]);

        // redirection
        if ($resultat) {
            return redirect('/account');
        }
        // Retourne page précedente avec les données écris dans le formulaire + erreurs
        return back()->withInput()->withErrors([
            'email' => 'Vos idéntifiants sont incorrects'
        ]);
    }
}
