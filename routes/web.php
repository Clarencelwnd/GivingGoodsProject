<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'displayLoginView']);
Route::get('/home', [AuthController::class, 'displayHomeView']);
Route::get('/logout', [AuthController::class, 'logoutUser']);

Route::post('/login-user', [AuthController::class, 'loginUser'])->name('login-user');
