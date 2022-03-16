<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CompteController extends Controller
{
    public function changePassword()
    {
        if (auth()->guest()) {
            return redirect('/connexion')->withErrors([
                'email' => 'Vous devez vous connecter pour voir cette page'
            ]);
        }

        request()->validate([
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required']
        ]);

        // Récupère l'utilisateur connecté et modifie son mot de passe
        auth()->user()->update([
            'password' => bcrypt(request('password')),
        ]);
        /*$user = auth()->user();
        $user->password = bcrypt(request('password'));
        $user->save();*/

        return redirect('/account');

    }

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

    public function deconnexion()
    {
        auth()->logout();
        return redirect('/');
    }
}
