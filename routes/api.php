<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// mostrar todos los registros
Route::get('/articulos', 'App\Http\Controllers\ArticulosController@index'); 
// crear un articulo
Route::post('/articulos', 'App\Http\Controllers\ArticulosController@store');
// actualizar un registro
Route::put('/articulos/{id}', 'App\Http\Controllers\ArticulosController@update');
// eliminar un registro
Route::delete('/articulos/{id}', 'App\Http\Controllers\ArticulosController@destroy');

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
    Route::post('register', 'App\Http\Controllers\AuthController@register');

});