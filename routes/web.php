<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrasiDonaturController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/RiwayatDonatur', function () {
    return view('RiwayatDonatur');
});

Route::get('/registrasi-donatur', [RegistrasiDonaturController::class, 'index']);
