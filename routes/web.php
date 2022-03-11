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

    return view('test',[
        'name' => request('name')
    ]);
});

Route::get('/inscription', function () {
    return view('inscription');
});

Route::post('/inscription', function () {
    $utilisateur = new App\Models\Utilisateur();
    $utilisateur->email = request('email');
    $utilisateur->password = bcrypt(request('password'));

    // Insert en base de données
    $utilisateur->save();

    // Ajouter CSRF pour valider la demande
    return "Email : ". request('email') . "<br> Mot de passe : " . request('password');
});

