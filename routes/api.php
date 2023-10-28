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

Route::get('get-empleados', [\App\Http\Controllers\EmpleadoController::class, 'getAll'])->name('api-getAll');
Route::put('save-empleados', [\App\Http\Controllers\EmpleadoController::class, 'save'])->name('api-save');
Route::delete('delete-empleados/{id}', [\App\Http\Controllers\EmpleadoController::class, 'deleteEmpleado'])->name('api-deleteEmpleado');
Route::post('edit-empleados/{id}', [\App\Http\Controllers\EmpleadoController::class, 'editEmpleado'])->name('api-editEmpleado');
Route::get('get-empleados/{id}', [\App\Http\Controllers\EmpleadoController::class, 'getEmpleado'])->name('getEmpleado');

Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);