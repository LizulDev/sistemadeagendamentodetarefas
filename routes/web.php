<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Rotas para views de USUARIOS
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users/store', [UserController::class, 'store']);
Route::get('/users/{user}', [UserController::class, 'edit']);
Route::put('/users/{user}', [UserController::class, 'update']);
Route::get('/users/{user}/delete', [UserController::class, 'confirmDelete']);
Route::delete('/users/{user}', [UserController::class, 'delete']);

//Rotas para views de SERVICOS
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/create', [ServiceController::class, 'create']);
Route::post('/services/store', [ServiceController::class, 'store']);
Route::get('/services/{service}/edit', [ServiceController::class, 'edit']);
Route::put('/services/{service}', [ServiceController::class, 'update']);
Route::get('/services/{service}/delete', [ServiceController::class, 'confirmDelete']);
Route::delete('/services/{service}', [ServiceController::class, 'delete']);

//Rotas para views de AGENDAMENTOS
Route::get('/appointments', [AppointmentController::class, 'index']);
Route::get('/appointments/create', [AppointmentController::class, 'create']);
Route::post('/appointments/store', [AppointmentController::class, 'store']);
Route::get('/appointments/{appointment}/edit', [AppointmentController::class, 'edit']);
Route::put('/appointments/{appointment}', [AppointmentController::class, 'update']);
Route::get('/appointments/{appointment}/delete', [AppointmentController::class, 'confirmDelete']);
Route::delete('/appointments/{appointment}', [AppointmentController::class, 'delete']);

Route::get('/dashboard', [DashboardController::class, 'index']);

?>