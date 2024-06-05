<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\drDetailKegiatanRelawanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dr-detail-kegiatan-relawan', [drDetailKegiatanRelawanController::class, 'show']);
