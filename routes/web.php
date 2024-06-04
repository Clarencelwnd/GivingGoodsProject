<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile/panti_sosial/{id}', [ProfileController::class, 'index'])->name('profile.panti_sosial');
Route::get('/edit_profile/panti_sosial/{id}', [ProfileController::class, 'edit_view'])->name('edit_profile.panti_sosial');
Route::post('/edit_profile/panti_sosial/{id}', [ProfileController::class, 'edit_profile_logic'])->name('edit_profile_logic.panti_sosial');
Route::post('/edit_schedule/panti_sosial/{id}', [ProfileController::class, 'edit_schedule_logic'])->name('edit_schedule_logic.panti_sosial');
Route::post('/edit_photo/panti_sosial/{id}', [ProfileController::class, 'edit_photo_logic'])->name('edit_photo_logic.panti_sosial');
Route::get('/change_password/panti_sosial/{id}', [ProfileController::class, 'change_password_view'])->name('change_password.panti_sosial');
Route::post('/change_password/panti_sosial/{id}', [ProfileController::class, 'change_password_logic'])->name('change_password_logic.panti_sosial');
Route::get('/logout/panti_sosial', [ProfileController::class, 'logout'])->name('logout.panti_sosial');


// DUMMY
Route::get('/home_page', [ProfileController::class, 'home_page'])->name('home_page');
