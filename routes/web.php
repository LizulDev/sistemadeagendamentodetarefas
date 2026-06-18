<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
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

// Rotas públicas
Route::middleware('guest')->group( function() {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.send');
    
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.send');
});

//Rotas privadas 
Route::middleware('auth')->group( function() {
    
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
    Route::get('/services/{service}/edit', [ServiceController::class, 'edit']);
    Route::put('/services/{service}', [ServiceController::class, 'update']);
    Route::get('/services/{service}/delete', [ServiceController::class, 'confirmDelete']);
    Route::delete('/services/{service}', [ServiceController::class, 'delete']);

    Route::get('/appointments', [AppointmentController::class, 'index']);
    Route::get('/appointments/create', [AppointmentController::class, 'create']);
    Route::post('/appointments/store', [AppointmentController::class, 'store']);
    Route::get('/appointments/{appointment}/edit', [AppointmentController::class, 'edit']);
    Route::put('/appointments/{appointment}', [AppointmentController::class, 'update']);
    Route::get('/appointments/{appointment}/delete', [AppointmentController::class, 'confirmDelete']);
    Route::delete('/appointments/{appointment}', [AppointmentController::class, 'delete']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout.send');
});
?>