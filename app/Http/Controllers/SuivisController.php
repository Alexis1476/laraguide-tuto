<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class SuivisController extends Controller
{
    public function enlever()
    {
        $currentUser = auth()->user();
        $userSuivi = Utilisateur::where('email', request('email'))->firstOrFail();

        // Détacher
        $currentUser->suivis()->detach($userSuivi);
        return back();
    }

    //
    public function nouveau()
    {
        $currentUser = auth()->user();
        $userASuivre = Utilisateur::where('email', request('email'))->firstOrFail();

        // Attacher
        $currentUser->suivis()->attach($userASuivre);
        return back();
    }
}
