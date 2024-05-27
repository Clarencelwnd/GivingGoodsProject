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
Route::get('/ubah-kegiatan-donasi/{id}', [DetailKegiatanDonasiController::class, 'showEdit'])->name('ubah-kegiatan-donasi.show');

Route::delete('/delete-kegiatan-donasi/{id}', [DetailKegiatanDonasiController::class, 'destroy'])->name('delete-kegiatan-donasi.destroy');

Route::put('/update-kegiatan-donasi/{id}', [DetailKegiatanDonasiController::class, 'update'])->name('ubah-kegiatan-donasi.update');





Route::get('/kegiatan-relawan/{id}', [DetailKegiatanRelawanController::class, 'show'])->name('kegiatan-relawan.show');

Route::get('/ubah-kegiatan-relawan/{id}', [DetailKegiatanRelawanController::class, 'showEdit'])->name('ubah-kegiatan-relawan.show');

Route::delete('/delete-kegiatan-relawan/{id}', [DetailKegiatanRelawanController::class, 'destroy'])->name('delete-kegiatan-relawan.destroy');

Route::put('/update-kegiatan-relawan/{id}', [DetailKegiatanRelawanController::class, 'update'])->name('ubah-kegiatan-relawan.update');
