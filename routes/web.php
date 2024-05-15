<?php

use App\Http\Controllers\generalPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/templatePage', [generalPageController::class, 'displayTemplatePage']);

Route::get('/generalPage', [generalPageController::class, 'displayGeneralPage']);

Route::get('/dummyProfile', [generalPageController::class, 'displayDummyProfilePage'])->name('dummyProfile');

