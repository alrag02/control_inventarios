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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/',
    [Api\apiController::class, 'home']);

Route::post('login',
    [Api\apiController::class, 'login']);

Route::post('ConsultarArticulosPorWorkId',
    [Api\articuloApiController::class, 'ConsultarArticulosPorWorkId']);

Route::post('ConsultarDetallesArticuloPorEtiquetaLocal',
    [Api\articuloApiController::class, 'ConsultarDetallesArticuloPorEtiquetaLocal']);

Route::post('ConsultarArticulosPorRevision',
    [Api\articuloApiController::class, 'ConsultarArticulosPorRevision']);

Route::post('ConsultarArticulosPorEtiquetaExterna',
    [Api\articuloApiController::class, 'ConsultarArticulosPorEtiquetaExterna']);

Route::post('ComprobarArticuloExiste',
    [Api\articuloApiController::class, 'ComprobarArticuloExiste']);

Route::post('ObtenerDisponibilidadArticulo',
    [Api\articuloApiController::class, 'ObtenerDisponibilidadArticulo']);

Route::post('ComprobarArticuloPerteneceRevision',
    [Api\articuloApiController::class, 'ComprobarArticuloPerteneceRevision']);

Route::post('EditarDisponblidadArticulo',
    [Api\articuloApiController::class, 'EditarDisponblidadArticulo']);

Route::post('EditarDetallesArticulo',
    [Api\articuloApiController::class, 'EditarDetallesArticulo']);

Route::post('ConsultarRevisionesPorWorkId',
    [Api\revisionApiController::class, 'ConsultarRevisionesPorWorkId']);

Route::post('ObtenerEstados',
    [Api\estadoApiController::class, 'ObtenerEstados']);

Route::post('ObtenerUbicaciones',
    [Api\oficinaApiController::class, 'ObtenerUbicaciones']);


