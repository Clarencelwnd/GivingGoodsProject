<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailKegiatanDonasiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/DetailKegiatanDonasi', function () {
    return view('DetailKegiatanDonasi');
});


Route::get('/kegiatan-donasi/{id}', [DetailKegiatanDonasiController::class, 'show'])->name('kegiatan-donasi.show');

Route::delete('/kegiatan-donasi/{id}', [DetailKegiatanDonasiController::class, 'destroy'])->name('kegiatan-donasi.destroy');

