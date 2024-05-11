<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register-chooseRole', [RegisterController::class, 'displayRegisterChooseRole']);


