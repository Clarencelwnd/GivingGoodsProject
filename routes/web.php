<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterDonaturRelawanController;
use App\Http\Controllers\RegisterPantiSosialController;

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

//Login
Route::post('/register-donatur-relawan', [RegisterDonaturRelawanController::class, 'registerUser'])->name('registerUser');
Route::get('/login', [AuthController::class, 'displayLoginView'])->name('login');
Route::get('/home', [AuthController::class, 'displayHomeView']);
Route::get('/logout', [AuthController::class, 'logoutUser']);

Route::post('/login-user', [AuthController::class, 'loginUser'])->name('login-user');

Route::get('/reset_password', [ResetPasswordController::class, 'index'])->name('reset_password');
Route::post('/reset_password', [ResetPasswordController::class, 'checking_email'])->name('checking_email');
Route::get('/input_otp',[ResetPasswordController::class, 'input_otp'])->name('input_otp');
Route::post('/new_password', [ResetPasswordController::class, 'checking_otp'])->name('checking_otp');
Route::get('/new_password', [ResetPasswordController::class, 'new_password'])->name('new_password');
Route::post('/checking_password', [ResetPasswordController::class, 'checking_password'])->name('checking_password');

// dummy
Route::get('/dummy_login', [ResetPasswordController::class, 'dummy_login'])->name('dummy_login');
Route::get('/dummy_register', [ResetPasswordController::class, 'dummy_register'])->name('dummy_register');
