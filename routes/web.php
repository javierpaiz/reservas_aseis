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
 });
