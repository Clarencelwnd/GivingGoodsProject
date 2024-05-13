<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterDonaturRelawanController;
use App\Http\Controllers\RegisterPantiSosialController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/RegisterPantiSosial', function () {
    return view('RegisterPantiSosial');
});

Route::get('/RegisterPantiSosial-2', function () {
    return view('RegisterPantiSosial-2');
});


Route::get('/RegisterSelected', function () {
    return view('RegisterSelected');
});

Route::get('/RegisterDonaturRelawan', function () {
    return view('RegisterDonaturRelawan');
});


// Route::post('/check-email', [RegisterDonaturRelawanController::class, 'checkEmail'])->name('register.checkEmail');
// Route::post('/store', [RegisterDonaturRelawanController::class, 'store'])->name('register.store');

// REGISTER PANTI SOSIAL
Route::post('/register-pantisosial', [RegisterPantiSosialController::class, 'registerPantiSosial1'])->name('registerPantiSosial1');

//REGISTER DONATUR RELAWAN
Route::post('/register-donatur-relawan', [RegisterDonaturRelawanController::class, 'registerUser'])->name('registerUser');
