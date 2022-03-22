<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\Utilisateur;

// Use récupère de manière absolue

class UtilisateursController extends Controller
{
    public function voir()
    {
        $email = request('email');
        $user = Utilisateur::where('email', $email)->firstOrFail();
        //$messages = Message::where('idUtilisateur', $user->id)->latest()->get(); // Get retourne tous les résultats
        //$messages = $user->messages; // Laravel check si méthode messages existe

        return View('utilisateur', ['utilisateur' => $user]);
    }

    //
    public function liste()
    {
        // Récupère toutes les données d'une table
        $utilisateurs = Utilisateur::all(); // \(Racine)

        return view('utilisateurs', [
            'utilisateurs' => $utilisateurs,

        ]);
    }
}
