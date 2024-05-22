<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('profile');
Route::get('/edit_profile/{id}', [ProfileController::class, 'edit_view'])->name('edit_profile');
Route::get('/edit_profile/{id', [ProfileController::class, 'edit_logic'])->name('edit_logic');
