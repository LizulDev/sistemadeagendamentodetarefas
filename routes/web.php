<?php

use App\Http\Controllers\AppointmentController;
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

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users/store', [UserController::class, 'store']);
Route::get('/users/{user}', [UserController::class, 'edit']);
Route::put('/users/{user}', [UserController::class, 'update']);
Route::get('/users/{user}/delete', [UserController::class, 'confirmDelete']);
Route::delete('/users/{user}', [UserController::class, 'delete']);


Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/create', [ServiceController::class, 'create']);
Route::post('/services/store', [ServiceController::class, 'store']);

Route::get('/appointments', [AppointmentController::class, 'index']);
Route::get('/appointments/create', [AppointmentController::class, 'create']);
Route::post('/appointments/store', [AppointmentController::class, 'store']);
Route::get('/appointments/{appointment}/edit', [AppointmentController::class, 'edit']);
Route::put('/appointments/{appointment}', [AppointmentController::class, 'update']);


//Route::get('/users/{user}/phone', [UserController::class, 'createPhone']);
//Route::post('/users/{user}/phone', [UserController::class, 'storePhone']);
//Route::delete('/users/{user}/phone/{phone}', [UserController::class, 'deletePhone']);

//Route::get('/unoesc', [UnoescController::class, 'index']);
//Route::post('/unoesc', [UnoescController::class, 'login']);