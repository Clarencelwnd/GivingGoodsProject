<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\UserGeneralPage;
use App\Http\Controllers\UserGeneralPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Halaman utama
Route::get('/halaman-utama', [UserGeneralPageController::class, 'displayUserGeneralPage']);

//Daftar Artikel
Route::get('/daftarArtikel', [ArtikelController::class, 'displayDaftarArtikel'])->name('displayDaftarArtikel');
//Detail Artikel
Route::get('/daftarArtikel/artikel1', [ArtikelController::class, 'displayDetailArtikel'])->name('displayDetailArtikel');
//Detail Artikel 2
Route::get('/daftarArtikel/artikel2', [ArtikelController::class, 'displayDetailArtikel2'])->name('displayDetailArtikel2');


