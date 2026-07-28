<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
//here we define the routes for our application, linking them to the appropriate controller methods.

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
// Registration routes
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout']);
// profile routes
Route::middleware(['auth'])->group(function () {
Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::get('/profile', [ProfileController::class, 'show'])
    ->name('profile.show');

Route::get('/profile/edit', [ProfileController::class, 'edit'])
    ->name('profile.edit');

Route::put('/profile/update', [ProfileController::class, 'update'])
    ->name('profile.update');

Route::get('/profile/password', [ProfileController::class, 'editPassword'])
    ->name('profile.password');

Route::put('/profile/password', [ProfileController::class, 'updatePassword'])
    ->name('profile.password.update');

Route::middleware(['role:admin'])->group(function () {
Route::resource('users', UserController::class);
Route::resource('categories', CategoryController::class); 
Route::resource('products', ProductController::class);
// Resourceful routes for categories
});
});

Route::get('/', function () {
    return redirect()->route('login');
});