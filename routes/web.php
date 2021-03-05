<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Inmobiliario\articuloController;
use App\Http\Controllers\inmobiliario\barcodeController;
use App\Http\Controllers\Inmobiliario\fotoController;
use App\Http\Controllers\Revision\corteController;
use App\Http\Controllers\Revision\revisionController;
use App\Http\Controllers\Ayuda\ayudaController;
use App\Http\Controllers\Usuarios\UsersController;
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
//Auth::routes();

//Invoca solo algunas rutas
Route::get('login',  [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login',  [LoginController::class, 'login']);
Route::post('logout',  [LoginController::class, 'logout'])->name('logout');


//Todas las rutas dentro del grupo están protegidas con 'auth'
Route::group(['middleware' => ['auth']], function () {

    //Ruta de Home
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Espacio para "Ayuda"
    Route::namespace('ayuda')->prefix('ayuda')->name('ayuda.')->group(function (){

        //Indice para "Ayuda"
        Route::get('/', [ayudaController::class, 'index'])->name('index');
        Route::get('/inicio', [ayudaController::class, 'inicio'])->name('inicio');
        Route::get('/usuarios', [ayudaController::class, 'usuarios'])->name('usuarios');
        Route::get('/articulos', [ayudaController::class, 'articulos'])->name('articulos');
        Route::get('/conceptos', [ayudaController::class, 'conceptos'])->name('conceptos');
        Route::get('/cortes', [ayudaController::class, 'cortes'])->name('cortes');
        Route::get('/revisiones', [ayudaController::class, 'revisiones'])->name('revisiones');
        Route::get('/movil', [ayudaController::class, 'movil'])->name('movil');

    });

    //Espacio para "Usuarios"
    Route::namespace('usuarios')->prefix('usuarios')->name('usuarios.')->group(function (){

        //Seccion de "Usuarios Registrados"
        Route::get('/registrados/{id}/edit_password', [usersController::class, 'edit_password'])->name('registrados.edit_password');
        Route::PUT('/registrados/{id}/update_password', [usersController::class, 'update_password'])->name('registrados.update_password');
        Route::resource('/registrados','UsersController');

    });

    //Espacio de "Inmobiliario"
    Route::namespace('Inmobiliario')->prefix('inmobiliario')->name('inmobiliario.') ->group(function (){

        //Pagina Inicial de la sección
        Route::view('/', 'inmobiliario.index');

        //Sección de "area"
        Route::resource('/area', 'areaController');

        //Seccion de "articulo"
         //     Route::get('articulo/search', [articuloController::class, 'search'])->name('articulo.search');
         //     Route::get('articulo/show_search', [articuloController::class, 'show_search'])->name('articulo.show_search');
        Route::get('articulo/{id}/edit_foto', [articuloController::class, 'edit_foto'])->name('articulo.edit_foto');
        Route::patch('articulo/{id}/update_foto', [articuloController::class, 'update_foto'])->name('articulo.update_foto');
        Route::get('articulo/generateBarCode/{id}', [barcodeController::class, 'printBarCode'])->name('articulo.generateBarCode');
        // Route::get('articulo/{id}/printBarCode', [barcodeController::class, 'printBarCode'])->name('articulo.printBarCode');
        Route::resource('/articulo', 'articuloController');

        //Seccion de "departamento"
        Route::resource('/departamento', 'departamentoController');

        //Seccion de "edificio"
        Route::resource('/edificio', 'edificioController');

        //Seccion de "empleado"
        Route::resource('/empleado', 'empleadoController');

        //Seccion de "estado"
        Route::resource('/estado', 'estadoController');

        //Seccion de "familia"
        Route::resource('/familia', 'familiaController');

        //Seccion de "oficina"
        Route::resource('/oficina', 'oficinaController');

        //Seccion de "tipo_compra"
        Route::resource('/tipo_compra', 'tipo_compraController');

        //Seccion de "tipo_equipo"
        Route::resource('/tipo_equipo', 'tipo_equipoController');

        //Seccion de "foto"
        Route::resource('/foto', 'fotoController');

    });

    //Espacio de "Revision"
    Route::namespace('Revision')->prefix('revision')->name('revision.')->group(function (){

        //Pagina Inicial de la sección
        Route::view('/','revision.index');

        //Seccion de "corte"
        Route::resource('/corte','corteController');

        //Seccion de "revision"
        Route::resource('/revision','revisionController');
        Route::get('/revision/{id}/show_details', [revisionController::class, 'show_detalis'])->name('revision.revision.show_details');
        Route::patch('/revision/{id}/cambiar_disponibilidad_articulo', [revisionController::class, 'cambiar_disponibilidad_articulo'])->name('revision.revision.cambiar_disponibilidad_articulo');

        //Seccion de exportación de informe de corte
        Route::get('/corte/{id}/get_excel_corte', [corteController::class, 'get_excel_corte'])->name('revision.corte.get_excel_corte');

        //Seccion de exportación de informe de revision
        Route::get('/revision/{id}/get_excel_revision', [revisionController::class, 'get_excel_revision'])->name('revision.revision.get_excel_revision');
    });
});

