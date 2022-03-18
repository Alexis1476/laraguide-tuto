<?php

use App\Http\Controllers\ConnexionController;
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
/*Route::view('/', 'welcome');*/

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

Route::get('/', [UtilisateursController::class, 'liste']);

Route::group([
    // Middleware pour vérifier si l'utilisateur est connecté (Toutes les routes dans le groupe ont ce middleware)
    'middleware' => 'App\Http\Middleware\Auth'
], function () {
    // Vérifier si un user est connecté
    Route::get('/account', [\App\Http\Controllers\CompteController::class, 'accueil']);
    Route::get('/deconnexion', [\App\Http\Controllers\CompteController::class, 'deconnexion']);

    Route::post('/change-password', [\App\Http\Controllers\CompteController::class, 'changePassword']);

    Route::post('/messages', [\App\Http\Controllers\MessagesController::class, 'nouveau']);
});
Route::get('/connexion', [ConnexionController::class, 'formulaire']);
Route::post('/connexion', [ConnexionController::class, 'traitement']);


/* ! Vu qu'on crée una variable get, ça va prendre le pas de chaque route,
 donc il faut la mettre après les routes ou modifier la route */
Route::get('/{email}', [UtilisateursController::class, 'voir']);
