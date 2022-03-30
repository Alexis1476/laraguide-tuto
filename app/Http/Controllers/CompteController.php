<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CompteController extends Controller
{
    public function changeAvatar()
    {
        request()->validate([
            'avatar' => ['required','image']
        ]);

        $path = request('avatar')->store('avatars'); // Stock image dans dossier avatar
        return $path;
    }

    public function changePassword()
    {
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
        return View('account');
    }

    public function deconnexion()
    {
        auth()->logout();
        return redirect('/');
    }
}
