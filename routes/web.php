<?php

use App\Http\Controllers\ArtikelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/daftarArtikel', [ArtikelController::class, 'displayDaftarArtikel']);


