<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterDonaturRelawanController;
use App\Http\Controllers\RegisterPantiSosialController;

Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
Route::get('/RegisterPantiSosial', function () {
    return view('RegisterPantiSosial');
});

Route::get('/RegisterPantiSosial-2', function () {
    return view('RegisterPantiSosial-2');
})->name('registerPantiSosialNext');


Route::get('/RegisterSelected', function () {
    return view('RegisterSelected');
})->name('registerSelected');

Route::get('/RegisterDonaturRelawan', function () {
    return view('RegisterDonaturRelawan');
})->name('registerDonaturRelawan');


// Route::post('/check-email', [RegisterDonaturRelawanController::class, 'checkEmail'])->name('register.checkEmail');
// Route::post('/store', [RegisterDonaturRelawanController::class, 'store'])->name('register.store');

// REGISTER PANTI SOSIAL
Route::post('/register-pantisosial', [RegisterPantiSosialController::class, 'registerPantiSosial1'])->name('registerPantiSosial1');

// REGISTER PANTI SOSIAL 2
Route::post('/register-pantisosial2', [RegisterPantiSosialController::class, 'registerPantiSosial2'])->name('registerPantiSosial2');

//REGISTER DONATUR RELAWAN
Route::post('/register-donatur-relawan', [RegisterDonaturRelawanController::class, 'registerUser'])->name('registerUser');
=======
Route::get('/login', [AuthController::class, 'displayLoginView']);
Route::get('/home', [AuthController::class, 'displayHomeView']);
Route::get('/logout', [AuthController::class, 'logoutUser']);

Route::post('/login-user', [AuthController::class, 'loginUser'])->name('login-user');
>>>>>>> f/login
