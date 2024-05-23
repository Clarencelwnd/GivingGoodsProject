<?php

use App\Http\Controllers\ResetPasswordController;
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

Route::get('/reset_password', [ResetPasswordController::class, 'index'])->name('reset_password');
Route::post('/reset_password', [ResetPasswordController::class, 'checking_email'])->name('checking_email');
Route::get('/input_otp',[ResetPasswordController::class, 'input_otp'])->name('input_otp');
Route::post('/new_password', [ResetPasswordController::class, 'checking_otp'])->name('checking_otp');
Route::get('/new_password', [ResetPasswordController::class, 'new_password'])->name('new_password');
Route::post('/checking_password', [ResetPasswordController::class, 'checking_password'])->name('checking_password');

// dummy
Route::get('/dummy_login', [ResetPasswordController::class, 'dummy_login'])->name('dummy_login');
Route::get('/dummy_register', [ResetPasswordController::class, 'dummy_register'])->name('dummy_register');
