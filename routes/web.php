<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/RegisterPantiSosial', function () {
    return view('RegisterPantiSosial');
});

Route::get('/RegisterPantiSosial-2', function () {
    return view('RegisterPantiSosial-2');
});


Route::get('/RegisterSelected', function () {
    return view('RegisterSelected');
});

Route::get('/RegisterDonaturRelawan', function () {
    return view('RegisterDonaturRelawan');
});

