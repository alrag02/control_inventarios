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

//Ruta de Welcome
Route::get('/', function () {
    return view('welcome');
});

//Invoca todas las rutas de auth
Auth::routes();


//Todas las rutas dentro del grupo están protegidas con el 'auth'
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::namespace('usuarios')->prefix('usuarios')->name('usuarios.')->group(function (){
        Route::resource('/registrados','UsersController', ['except' =>['show','create', 'store']]);

    });

    Route::namespace('Inmobiliario')->prefix('inmobiliario')->name('inmobiliario.') ->group(function (){
        Route::view('/', 'inmobiliario.index');

        Route::resource('/area', 'areaController');
        Route::resource('/articulo', 'articuloController');
        Route::resource('/departamento', 'departamentoController');
        Route::resource('/edificio', 'edificioController');
        Route::resource('/empleado', 'empleadoController');
        Route::resource('/encargo', 'encargoController');
        Route::resource('/estado', 'estadoController');
        Route::resource('/familia', 'familiaController');
        Route::resource('/foto', 'estadoController');
        Route::resource('/oficina', 'oficinaController');
        Route::resource('/tipo_compra', 'tipo_compraController');
        Route::resource('/tipo_equipo', 'tipo_equipoController');
    });

    Route::namespace('revision')->prefix('revision')->name('revision.')->group(function (){
       // Route::resource('/registrados','UsersController', ['except' =>['show','create', 'store']]);
        Route::view('/','revision.index');
    });
});

