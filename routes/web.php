<?php

use App\Http\Controllers\PaginaController;
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


Route::get('/', function () {
    return view('welcome');
});*/

Route::controller(PaginaController::class)->group(function () {
    // Route::get('FormatoBB/{ciclo_activo}/{nombreSeccion}/{idCarrera}', 'index')->name('indexBB');
    Route::get('/', 'pagina')->name('aseis');
    Route::get('/registro/{idActividad}', 'registrar_actividad')->name('regitro_actividad');
    Route::get('/verificar', 'verificar_inscripcion')->name('verificar_inscripcion');
    Route::get('/inscripcion-general', 'inscripcion_general')->name('inscripcion_general');
    Route::get('/informe/{idActividad}', 'informe_inscritos')->name('informe');

});
