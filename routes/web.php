<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('profile');
Route:: get('/test', [ProfileController::class, 'test'])->name('test');
