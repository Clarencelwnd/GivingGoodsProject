<?php

use App\Http\Controllers\generalPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/generalPage', [generalPageController::class, 'displayTemplatePage']);

Route::get('/testPage', [generalPageController::class, 'displayGeneralPage']);

