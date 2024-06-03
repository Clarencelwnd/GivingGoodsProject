<?php

use App\Http\Controllers\ArtikelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Daftar Artikel
Route::get('/daftarArtikel', [ArtikelController::class, 'displayDaftarArtikel'])->name('displayDaftarArtikel');

//Detail Artikel
Route::get('/detailArtikel', [ArtikelController::class, 'displayDetailArtikel'])->name('displayDetailArtikel');
