<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('profile');
Route::get('/edit_profile/{id}', [ProfileController::class, 'edit_view'])->name('edit_profile');
Route::post('/edit_profile/{id}', [ProfileController::class, 'edit_profile_logic'])->name('edit_profile_logic');
Route::post('/edit_schedule/{id}', [ProfileController::class, 'edit_schedule_logic'])->name('edit_schedule_logic');
Route::post('/edit_photo/{id}', [ProfileController::class, 'edit_photo_logic'])->name('edit_photo_logic');
