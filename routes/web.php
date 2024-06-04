<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailKegiatanDonasiController;
use App\Http\Controllers\DetailKegiatanRelawanController;
use App\Http\Controllers\RiwayatDonaturController;
use App\Http\Controllers\RiwayatRelawanController;

use App\Http\Controllers\BuatKegiatanDonasiController;
use App\Http\Controllers\BuatKegiatanRelawanController;




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



Route::get('/registrasi-donatur/{id}', [RiwayatDonaturController::class, 'index'])->name('riwayat-donatur.index');

Route::post('/update-status/{IDRegistrasiDonatur}', [RiwayatDonaturController::class, 'updateStatus'])->name('update-status');





Route::get('/kegiatan-relawan/{id}', [DetailKegiatanRelawanController::class, 'show'])->name('kegiatan-relawan.show');

Route::get('/ubah-kegiatan-relawan/{id}', [DetailKegiatanRelawanController::class, 'showEdit'])->name('ubah-kegiatan-relawan.show');

Route::delete('/delete-kegiatan-relawan/{id}', [DetailKegiatanRelawanController::class, 'destroy'])->name('delete-kegiatan-relawan.destroy');

Route::put('/update-kegiatan-relawan/{id}', [DetailKegiatanRelawanController::class, 'update'])->name('ubah-kegiatan-relawan.update');




Route::get('/registrasi-relawan/{id}', [RiwayatRelawanController::class, 'index'])->name('riwayat-relawan.index');

Route::post('/update-status-relawan/{IDRegistrasiRelawan}', [RiwayatRelawanController::class, 'updateStatus'])->name('update-status-relawan');


Route::post('/update-status-checkbox/{IDRegistrasiRelawan}', [RiwayatRelawanController::class, 'updateStatusCheckbox'])->name('update-status-checkbox');






// Route untuk menampilkan form buat kegiatan donasi
Route::get('/buat-kegiatan-donasi/{id}', [BuatKegiatanDonasiController::class, 'show'])->name('buat_kegiatan_donasi.show');

// Route untuk menyimpan data kegiatan donasi
Route::post('/simpan-kegiatan-donasi', [BuatKegiatanDonasiController::class, 'store'])->name('buat_kegiatan_donasi.store');




// Route untuk menampilkan form buat kegiatan donasi
Route::get('/buat-kegiatan-relawan/{id}', [BuatKegiatanRelawanController::class, 'show'])->name('buat_kegiatan_relawan.show');

// Route untuk menyimpan data kegiatan donasi
Route::post('/simpan-kegiatan-relawan', [BuatKegiatanRelawanController::class, 'store'])->name('buat_kegiatan_relawan.store');

