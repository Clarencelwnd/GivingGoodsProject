<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailKegiatanDonasiController;
use App\Http\Controllers\DetailKegiatanRelawanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/DetailKegiatanDonasi', function () {
    return view('DetailKegiatanDonasi');
});


Route::get('/kegiatan-donasi/{id}', [DetailKegiatanDonasiController::class, 'show'])->name('kegiatan-donasi.show');

Route::delete('/delete-kegiatan-donasi/{id}', [DetailKegiatanDonasiController::class, 'destroy'])->name('delete-kegiatan-donasi.destroy');




Route::get('/kegiatan-relawan/{id}', [DetailKegiatanRelawanController::class, 'show'])->name('kegiatan-relawan.show');

Route::delete('/delete-kegiatan-relawan/{id}', [DetailKegiatanRelawanController::class, 'destroy'])->name('delete-kegiatan-relawan.destroy');


