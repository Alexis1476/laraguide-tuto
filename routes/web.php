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

/*Route::get('/', function () {
    return view('welcome');
});*/
// Raccourci pour la page d'accueil
Route::view('/', 'welcome');

// Route avec un paramètre get
Route::get('/test/{name}', function () {

    return view('test', [
        'name' => request('name')
    ]);
});

// 1 Syntaxe : NomController@Function
Route::get('/inscription', 'App\Http\Controllers\InscriptionController@formulaire');

Route::post('/inscription', 'App\Http\Controllers\InscriptionController@traitement');

// 2 Syntaxe :
use App\Http\Controllers\UtilisateursController;

Route::get('/utilisateurs', [UtilisateursController::class, 'liste']);

Route::get('/connexion', [\App\Http\Controllers\ConnexionController::class, 'formulaire']);
Route::post('/connexion', [\App\Http\Controllers\ConnexionController::class, 'traitement']);
