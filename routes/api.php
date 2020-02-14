<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas accesibles para todos. Algunas las hacemos con resource por ahorrar.
Route::resource('personajes', 'PersonajeController');
Route::resource('grupos', 'GrupoController');
Route::post('login', 'UserController@authenticate');

//Rutas accesibles solo para logged (ver peliculas y ver información del usuario)
Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('user', 'UserController@getAuthenticatedUser');
    Route::get('peliculas', 'PeliculaController@index');
    Route::get('peliculas/{pelicula}', 'PeliculaController@show');
});

//Rutas accesibles solo para admin (añadir, borrar y actualizar peliculas)
Route::group(['middleware' => ['jwt.admin']], function () {
    Route::post('peliculas', 'PeliculaController@store');
    Route::patch('peliculas/{pelicula}', 'PeliculaController@update');
    Route::delete('peliculas/{pelicula}', 'PeliculaController@destroy');
});
