<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
//here we define the routes for our application, linking them to the appropriate controller methods. The routes include the login page, login handling, dashboard access, and logout functionality. The dashboard route is protected by the 'auth' middleware to ensure only authenticated users can access it.
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout']);
