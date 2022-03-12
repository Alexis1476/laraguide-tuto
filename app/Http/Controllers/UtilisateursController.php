<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur; // Use récupère de manière absolue

class UtilisateursController extends Controller
{
    //
    public function liste()
    {
        // Récupère toutes les données d'une table
        $utilisateurs = Utilisateur::all(); // \(Racine)

        return view('utilisateurs', [
            'utilisateurs' => $utilisateurs
        ]);
    }
}
