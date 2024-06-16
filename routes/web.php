<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DaftarKegiatanController;
use App\Http\Controllers\PantiSosialController;
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
Route::get('daftarArtikel/artikel1', [ArtikelController::class, 'displayDetailArtikel'])->name('displayDetailArtikel');
//Detail Artikel 2
Route::get('/daftarArtikel/artikel2', [ArtikelController::class, 'displayDetailArtikel2'])->name('displayDetailArtikel2');

//Daftar Kegiatan
Route::get('/daftar-kegiatan', [DaftarKegiatanController::class, 'displayDaftarKegiatan'])->name('displayDaftarKegiatan');

//Search
Route::get('/search', [DaftarKegiatanController::class, 'search'])->name('daftarKegiatan.search');

//Side bar
Route::get('/sidebar', [DaftarKegiatanController::class, 'displaySideBar'])->name('displaySideBar');

//Search Panti Sosial
Route::get('/panti-sosial/{id}', [PantiSosialController::class, 'displaySearchResult'])->name('searchPantiSosial');
