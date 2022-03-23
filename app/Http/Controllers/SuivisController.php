<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class SuivisController extends Controller
{
    //
    public function nouveau()
    {
        $currentUser = auth()->user();
        $userASuivre = Utilisateur::where('email', request('email'))->firstOrFail();
    }
}
