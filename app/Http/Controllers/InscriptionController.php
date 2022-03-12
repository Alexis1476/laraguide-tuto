<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Utilisateur;

class InscriptionController extends Controller
{
    //
    public function formulaire()
    {
        return View('inscription');
    }

    public function traitement()
    {
        // valider le formulaire [Array de règles]
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required']
        ], [ // Array de messages d'erreur spécifiques
            'password.min' => 'Pour de raisons de sécurité, votre mot de passe doit faire :min caractères'
        ]);

        // $utilisateur = new App\Models\Utilisateur([...])
        // Insert en base de données
        $utilisateur = Utilisateur::create([
                'email' => request('email'),
                'password' => bcrypt(request('password'))
            ]
        );

        // Ajouter CSRF pour valider la demande
        return "Email : " . request('email') . "<br> Mot de passe : " . request('password');
    }
}
