<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inicioController;
use App\Http\Controllers\paginasController;

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

Route::get('/', inicioController::class);

Route::get('/logout', [paginasController::class,'logout']);
Route::post('/validarUsuario', [paginasController::class,'validarUsuario']);
Route::post('/getDataLibros', [paginasController::class,'getDataLibros']);
Route::get('/detalles/{id}', [paginasController::class,'verDetalles']);
Route::post('/reservar', [paginasController::class,'reservar']);
Route::get('/libros', [paginasController::class,'mostrarLibros']);
Route::get('/eliminarLibro/{id}', [paginasController::class,'eliminarLibro']);
Route::get('/eliminarReserva/{id}', [paginasController::class,'eliminarReserva']);