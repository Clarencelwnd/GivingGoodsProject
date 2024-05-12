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
Route::get('/exit_reset_password', [ResetPasswordController::class, 'exit_reset_password'])->name('exit_reset_password');

// Route::get('/test',[ResetPasswordController::class, 'test'])->name('test');
