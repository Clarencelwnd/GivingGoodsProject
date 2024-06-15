<?php

use App\Http\Controllers\buatKegiatanController;
use App\Http\Controllers\generalPageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/templatePage', [generalPageController::class, 'displayTemplatePage']);

Route::get('/generalPage/viewAllKegiatan/{id}', [generalPageController::class, 'displayGeneralPage'])->name('viewAllKegiatan');
Route::get('/generalPage/viewAllKegiatanDonasi', [generalPageController::class, 'viewAllKegiatanDonasi'])->name('viewAllKegiatanDonasi');
Route::get('/generalPage/viewAllKegiatanRelawan', [generalPageController::class, 'viewAllKegiatanRelawan'])->name('viewAllKegiatanRelawan');

//SEARCH
Route::get('/search', [generalPageController::class, 'search'])->name('search');

// DUMMY PAGES
Route::get('/dummyProfile', [generalPageController::class, 'displayDummyProfilePage'])->name('dummyProfile');
Route::get('/dummyBuatKegiatanRelawan', [buatKegiatanController::class, 'displayDummyBuatRelawanPage'])->name('dummyBuatRelawan');
Route::get('/dummyBuatKegiatanDonasi', [buatKegiatanController::class, 'displayDummyBuatDonasiPage'])->name('dummyBuatDonasi');

//FILTER
Route::get('/filter', [generalPageController::class, 'filterStatusKegiatan'])->name('filterStatus');
Route::get('/profile/panti_sosial/{id}', [ProfileController::class, 'index'])->name('profile.panti_sosial');
Route::get('/edit_profile/panti_sosial/{id}', [ProfileController::class, 'edit_view'])->name('edit_profile.panti_sosial');
Route::post('/edit_schedule/panti_sosial/{id}', [ProfileController::class, 'edit_schedule_logic'])->name('edit_schedule_logic.panti_sosial');
Route::post('/edit_photo/panti_sosial/{id}', [ProfileController::class, 'edit_photo_logic'])->name('edit_photo_logic.panti_sosial');
Route::get('/change_password/panti_sosial/{id}', [ProfileController::class, 'change_password_view'])->name('change_password.panti_sosial');
Route::post('/change_password/panti_sosial/{id}', [ProfileController::class, 'change_password_logic'])->name('change_password_logic.panti_sosial');
Route::get('/logout/panti_sosial', [ProfileController::class, 'logout'])->name('logout.panti_sosial');


// DUMMY
Route::get('/home_page', [ProfileController::class, 'home_page'])->name('home_page');
