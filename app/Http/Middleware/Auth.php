<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $next -> Function qui répresenta la suite de l'application
        // auth()->check(); -> Dit si un utilisateur est connecté
        // auth()->guest() -> Si l'utilsiateur est un invité
        if (auth()->guest()) {
            // On peut rediriger ou pas
            return redirect('/connexion')->withErrors([
                'email' => 'Vous devez vous connecter pour voir cette page'
            ]);
        }
        return $next($request);
    }
}
