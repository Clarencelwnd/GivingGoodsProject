<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\drDetailKegiatanRelawanController;
use App\Http\Controllers\DaftarKegiatanRelawanController;
use App\Http\Controllers\SummaryDaftarRelawanController;

use App\Http\Controllers\drDetailKegiatanDonasiController;
use App\Http\Controllers\DaftarKegiatanDonasiController;
use App\Http\Controllers\SummaryDaftarDonasiController;


use App\Http\Controllers\PagePanSosController;





Route::get('/', function () {
    return view('welcome');
});

// ====== Kegiatan Relawan ======
Route::get('/dr-detail-kegiatan-relawan/{idKegiatanRelawan}/{idDonaturRelawan}', [drDetailKegiatanRelawanController::class, 'show']);

Route::get('/daftar-kegiatan-relawan/{idKegiatanRelawan}/{idDonaturRelawan}', [DaftarKegiatanRelawanController::class, 'show'])->name('daftarKegiatanRelawan');
Route::post('/store-daftar-kegiatan-relawan', [DaftarKegiatanRelawanController::class, 'store'])->name('storeDaftarKegiatanRelawan');


Route::get('/summary-daftar-relawan/{idKegiatanRelawan}/{idDonaturRelawan}', [SummaryDaftarRelawanController::class, 'show'])->name('summaryDaftarRelawan');
Route::post('/store-daftar-relawan', [SummaryDaftarRelawanController::class, 'store'])->name('storeSummaryDaftarRelawan');



// ====== Kegiatan Donasi ======
Route::get('/dr-detail-kegiatan-donasi/{idKegiatanDonasi}/{idDonaturRelawan}', [drDetailKegiatanDonasiController::class, 'show']);

Route::get('/daftar-kegiatan-donasi/{idKegiatanDonasi}/{idDonaturRelawan}', [DaftarKegiatanDonasiController::class, 'show'])->name('daftarKegiatanDonasi');
Route::post('/store-daftar-kegiatan-donasi', [DaftarKegiatanDonasiController::class, 'store'])->name('storeDaftarKegiatanDonasi');

Route::get('/summary-daftar-donasi/{idKegiatanDonasi}/{idDonaturRelawan}', [SummaryDaftarDonasiController::class, 'show'])->name('summaryDaftarDonasi');
Route::post('/store-daftar-donasi', [SummaryDaftarDonasiController::class, 'store'])->name('storeSummaryDaftarDonasi');


Route::get('/panti-sosial/{IDPantiSosial}/{IDDonaturRelawan}', [PagePanSosController::class, 'show'])->name('panti_sosial.show');



