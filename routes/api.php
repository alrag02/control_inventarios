<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;

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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Route::apiResource('revision/{id_user}','Revision\revisionApi');

//Route::post('login', 'movil\ApiRest@login');
//Route::apiResource('articulo','Inmobiliario\articuloController');

//Route::apiResource('departamento','Inmobiliario\departamentoController');

Route::get('articles', [Api\articuloApiController::class, 'index']);
Route::get('articles/{article}', [Api\articuloApiController::class, 'show']);
Route::post('articles', [Api\articuloApiController::class, 'store']);
Route::put('articles/{article}', [Api\articuloApiController::class, 'update']);

