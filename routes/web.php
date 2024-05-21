<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RiwayatDonaturController;
use App\Http\Controllers\RiwayatRelawanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/RiwayatDonatur', function () {
    return view('RiwayatDonatur');
});

Route::get('/registrasi-donatur', [RiwayatDonaturController::class, 'index']);

Route::post('/update-status/{IDRegistrasiDonatur}', [RiwayatDonaturController::class, 'updateStatus'])->name('update-status');




Route::get('/registrasi-relawan', [RiwayatRelawanController::class, 'index']);

Route::post('/update-status-relawan/{IDRegistrasiRelawan}', [RiwayatRelawanController::class, 'updateStatus'])->name('update-status-relawan');


Route::post('/update-status-checkbox/{IDRegistrasiRelawan}', [RiwayatRelawanController::class, 'updateStatusCheckbox'])->name('update-status-checkbox');



