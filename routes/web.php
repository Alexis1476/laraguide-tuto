<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route avec un paramètre get
Route::get('/test/{name}', function () {

    return view('test', [
        'name' => request('name')
    ]);
});

Route::get('/inscription', function () {
    return view('inscription');
});

Route::post('/inscription', function () {
    // valider le formulaire [Array de règles]
    request()->validate([
        'email' => ['required', 'email'],
        'password' => ['required', 'confirmed', 'min:8'],
        'password_confirmation' => ['required']
    ]);

    // $utilisateur = new App\Models\Utilisateur([...])
    // Insert en base de données
    $utilisateur = App\Models\Utilisateur::create([
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]
    );

    // Ajouter CSRF pour valider la demande
    return "Email : " . request('email') . "<br> Mot de passe : " . request('password');
});

Route::get('/utilisateurs', function () {
    // Récupère toutes les données d'une table
    $utilisateurs = App\Models\Utilisateur::all();

    return view('utilisateurs', [
        'utilisateurs' => $utilisateurs
    ]);
});
