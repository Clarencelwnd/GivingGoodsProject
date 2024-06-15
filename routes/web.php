<?php

use App\Http\Controllers\buatKegiatanController;
use App\Http\Controllers\forumController;
use App\Http\Controllers\generalPageController;
use App\Http\Controllers\KomentarForumController;
use App\Models\KomentarForum;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/templatePage', [generalPageController::class, 'displayTemplatePage']);

// GENERAL PAGES
Route::get('/generalPage/viewAllKegiatan', [generalPageController::class, 'displayGeneralPage'])->name('viewAllKegiatan');
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

//FORUM
Route::get('/daftarForum', [forumController::class, 'displayDaftarForum'])->name('displayDaftarForum');
Route::post('/daftarForum', [forumController::class, 'buatForum'])->name('buatForum');
Route::get('/forum/{id}', [forumController::class, 'displayDetailForum'])->name('displayDetailForum');
Route::post('/komentar', [KomentarForumController::class, 'storeKomentar'])->name('simpanKomentar');
