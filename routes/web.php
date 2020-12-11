<?php


use App\Http\Controllers\Inmobiliario\articuloController;
use App\Http\Controllers\inmobiliario\barcodeController;
use App\Http\Controllers\Inmobiliario\fotoController;
use App\Http\Controllers\Revision\corteController;
use App\Http\Controllers\Revision\revisionController;
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
        Route::resource('/registrados','UsersController');

    });

    Route::namespace('Inmobiliario')->prefix('inmobiliario')->name('inmobiliario.') ->group(function (){
        Route::view('/', 'inmobiliario.index');

        Route::resource('/area', 'areaController');
        Route::get('articulo/search', [articuloController::class, 'search'])->name('articulo.search');
        Route::get('articulo/show_search', [articuloController::class, 'show_search'])->name('articulo.show_search');
        Route::resource('/articulo', 'articuloController');

        Route::resource('/departamento', 'departamentoController');
        Route::resource('/edificio', 'edificioController');
        Route::resource('/empleado', 'empleadoController');
        //Route::resource('/encargo', 'encargoController')->except(['create', 'store', 'destroy']);
        Route::resource('/estado', 'estadoController');
        Route::resource('/familia', 'familiaController');
        // Route::resource('/foto', 'estadoController');
        Route::resource('/oficina', 'oficinaController');
        Route::resource('/tipo_compra', 'tipo_compraController');
        Route::resource('/tipo_equipo', 'tipo_equipoController');


       // Route::get('/foto/index', [fotoController::class, 'index'])->name('foto.index');;
       // Route::get('/foto/resize_image', [fotoController::class, 'resize_image'])->name('foto.resize_image');;

        Route::post('foto/store', [fotoController::class, 'store'])->name('foto.store');
        Route::get('foto/create', [fotoController::class, 'create'])->name('foto.create');

        //Route::resource('/foto', fotoController::class);


        Route::get('articulo/generateBarCode/{id}', [barcodeController::class, 'barcode'])->name('articulo.generateBarCode');
        Route::get('articulo/{id}/printBarCode', [barcodeController::class, 'printBarCode'])->name('articulo.printBarCode');

    });

    Route::namespace('Revision')->prefix('revision')->name('revision.')->group(function (){
       // Route::resource('/registrados','UsersController', ['except' =>['create', 'store']]);
        Route::view('/','revision.index');
        Route::resource('/corte','corteController');
        Route::resource('/revision','revisionController');
        Route::get('/revision/{id}/show_details', [revisionController::class, 'show_detalis'])->name('revision.revision.show_details');
        Route::patch('/revision/{id}/cambiar_disponibilidad_articulo', [revisionController::class, 'cambiar_disponibilidad_articulo'])->name('revision.revision.cambiar_disponibilidad_articulo');

        Route::get('/corte/{id}/get_excel_corte', [corteController::class, 'get_excel_corte'])->name('revision.corte.get_excel_corte');
        Route::get('/revision/{id}/get_excel_revision', [revisionController::class, 'get_excel_revision'])->name('revision.revision.get_excel_revision');
    });
});

