<?php

use App\Http\Controllers\buatKegiatanController;
use App\Http\Controllers\forumController;
use App\Http\Controllers\generalPageController;
use App\Http\Controllers\KomentarForumController;
use App\Models\KomentarForum;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//FORUM
Route::get('/daftarForum', [forumController::class, 'displayDaftarForum'])->name('displayDaftarForum');
Route::post('/daftarForum', [forumController::class, 'buatForum'])->name('buatForum');
Route::get('/forum/{id}', [forumController::class, 'displayDetailForum'])->name('displayDetailForum');
Route::post('/komentar', [KomentarForumController::class, 'storeKomentar'])->name('simpanKomentar');
