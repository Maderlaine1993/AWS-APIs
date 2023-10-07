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
Route:: view('/','auth.login');

route::get("/LISTADO",[\App\Http\Controllers\EmpleadoController::class,'listado'])->name('Listar')->middleware('auth');
route::get("/CREAR",[\App\Http\Controllers\EmpleadoController::class,'crear'])->middleware('auth');
route::get("/GUARDAR",[\App\Http\Controllers\EmpleadoController::class,'save'])->name("save")->middleware('auth');
route::get("/EDITAR/{id}",[\App\Http\Controllers\EmpleadoController::class,'modificar'])->name('modificar')->middleware('auth');
route::get("/edita/{id}",[\App\Http\Controllers\EmpleadoController::class,'edit'])->name('edit')->middleware('auth');
route::get("/info/{id}",[\App\Http\Controllers\EmpleadoController::class,'show'])->name('show')->middleware('auth');
route::delete("/delete/{id}",[\App\Http\Controllers\EmpleadoController::class,'delete'])->name('delete')->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
