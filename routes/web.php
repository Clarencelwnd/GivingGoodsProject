<?php

use App\Http\Controllers\ProfileDonaturRelawanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile/donatur_relawan/{id}', [ProfileDonaturRelawanController::class, 'index'])->name('profile.donatur_relawan');
Route::get('/edit_profile/donatur_relawan/{id}', [ProfileDonaturRelawanController::class, 'edit_view'])->name('edit_profile.donatur_relawan');
Route::post('/edit_profile/donatur_relawan/{id}', [ProfileDonaturRelawanController::class, 'edit_profile_logic'])->name('edit_profile_logic.donatur_relawan');
Route::post('/edit_schedule/donatur_relawan/{id}', [ProfileDonaturRelawanController::class, 'edit_schedule_logic'])->name('edit_schedule_logic.donatur_relawan');
Route::post('/edit_photo/donatur_relawan/{id}', [ProfileDonaturRelawanController::class, 'edit_photo_logic'])->name('edit_photo_logic.donatur_relawan');
Route::get('/change_password/donatur_relawan/{id}', [ProfileDonaturRelawanController::class, 'change_password_view'])->name('change_password.donatur_relawan');
Route::post('/change_password/donatur_relawan/{id}', [ProfileDonaturRelawanController::class, 'change_password_logic'])->name('change_password_logic.donatur_relawan');
Route::get('/riwayat_kegiatan/{id}', [ProfileDonaturRelawanController::class, 'riwayat_kegiatan_view'])->name('riwayat_kegiatan');
Route::get('/logout/donatur_relawan', [ProfileDonaturRelawanController::class, 'logout'])->name('logout.donatur_relawan');


// DUMMY
Route::get('/home_page', [ProfileDonaturRelawanController::class, 'home_page'])->name('home_page');
