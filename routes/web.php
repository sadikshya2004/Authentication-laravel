<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
//here we define the routes for our application, linking them to the appropriate controller methods.
Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout']);
