<?php

use App\Http\Controllers\ArtikelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Daftar Artikel
Route::get('/daftarArtikel', [ArtikelController::class, 'displayDaftarArtikel'])->name('displayDaftarArtikel');

//Detail Artikel 1
Route::get('/detailArtikel', [ArtikelController::class, 'displayDetailArtikel'])->name('displayDetailArtikel');
//Detail Artikel 2
Route::get('/detailArtikel2', [ArtikelController::class, 'displayDetailArtikel2'])->name('displayDetailArtikel2');


