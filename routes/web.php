<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\drDetailKegiatanRelawanController;
use App\Http\Controllers\DaftarKegiatanRelawanController;
use App\Http\Controllers\SummaryDaftarRelawanController;



Route::get('/', function () {
    return view('welcome');
});

// Route
Route::get('/dr-detail-kegiatan-relawan/{idKegiatanRelawan}/{idDonaturRelawan}', [drDetailKegiatanRelawanController::class, 'show']);


// Route
Route::get('/daftar-kegiatan-relawan/{idKegiatanRelawan}/{idDonaturRelawan}', [DaftarKegiatanRelawanController::class, 'show'])->name('daftarKegiatanRelawan');
Route::post('/store-daftar-kegiatan-relawan', [DaftarKegiatanRelawanController::class, 'store'])->name('storeDaftarKegiatanRelawan');


Route::get('/summary-daftar-relawan/{idKegiatanRelawan}/{idDonaturRelawan}', [SummaryDaftarRelawanController::class, 'show'])->name('summaryDaftarRelawan');
Route::post('/store-daftar-relawan', [SummaryDaftarRelawanController::class, 'store'])->name('storeSummaryDaftarRelawan');



