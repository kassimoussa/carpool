<?php

use App\Http\Controllers\TrajetController;
use App\Http\Controllers\UserController;
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
    return view('index');
});

Route::get('test', function () {
    return view('test');
});

 
Route::get('register', function () {
    return view('inscription');
});

Route::get('login', [UserController::class, 'login']);

Route::post('user_login', [UserController::class, 'check']);
Route::get('logout', [UserController::class, 'logout']);

Route::group(['middleware' => ['logged']], function () {
    Route::get('new-trajet', function () {
        return view('new_trajet');
    });

    Route::get('vos_trajets', function(){
        return view('logged.mes_trajets');
    });

    Route::get('profil', [UserController::class, 'profil']);

    //Route::get('achat_trajet/{id}', [TrajetController::class, 'achat_trajet']);
    Route::get('achat_trajet/{id}/{count}', [TrajetController::class, 'achat_trajet']);
    Route::get('trajet_achete/{t_id}/{v_id}', [TrajetController::class, 'trajet_achete']);

    Route::get('user/profil/{id}', [UserController::class, 'user_show']);
    Route::get('profil/photo', [UserController::class, 'photo_view']);
    Route::get('profil/infos_perso', [UserController::class, 'infos_perso']); //preferences
    Route::get('profil/preferences', [UserController::class, 'preferences']); 
    Route::get('profil/new_voiture', [UserController::class, 'new_voiture']); 
    Route::get('profil/voiture_infos/{voiture}', [UserController::class, 'voiture_infos']); 


});



