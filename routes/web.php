<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
//here we define the routes for our application, linking them to the appropriate controller methods.

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
// Registration routes
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::get('/profile', [AuthController::class, 'profile'])
->name('profile');
Route::get('/profile/edit', [AuthController::class, 'editProfile'])->name('profile.edit'); 
Route::put('/profile', [AuthController::class, 'updateProfile'])
->name('profile.update');

Route::middleware(['role:admin'])->group(function () {
Route::resource('users', UserController::class);
    });
});

Route::get('/', function () {
    return redirect()->route('login');
});