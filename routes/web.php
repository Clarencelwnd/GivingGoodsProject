<?php

use App\Http\Controllers\buatKegiatanController;
use App\Http\Controllers\forumController;
use App\Http\Controllers\generalPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KomentarForumController;
use App\Models\KomentarForum;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailKegiatanDonasiController;
use App\Http\Controllers\DetailKegiatanRelawanController;
use App\Http\Controllers\RiwayatDonaturController;
use App\Http\Controllers\RiwayatRelawanController;

use App\Http\Controllers\BuatKegiatanDonasiController;
use App\Http\Controllers\BuatKegiatanRelawanController;

Route::get('/', function () {
    return view('welcome');
});

// ===== GENERAL PAGE =====
Route::get('/generalPage/viewAllKegiatan/{id}', [generalPageController::class, 'displayGeneralPage'])->name('viewAllKegiatan');
Route::get('/generalPage/viewAllKegiatanDonasi/{id}', [generalPageController::class, 'viewAllKegiatanDonasi'])->name('viewAllKegiatanDonasi');
Route::get('/generalPage/viewAllKegiatanRelawan/{id}', [generalPageController::class, 'viewAllKegiatanRelawan'])->name('viewAllKegiatanRelawan');

// ===== SEARCH =====
Route::get('/search/{id}', [generalPageController::class, 'search'])->name('search');

// ===== FILTER =====
Route::get('/filter/{id}', [generalPageController::class, 'filterStatusKegiatan'])->name('filterStatus');

// ===== PROFILE =====
Route::get('/profile/panti_sosial/{id}', [ProfileController::class, 'index'])->name('profile.panti_sosial');
Route::get('/edit_profile/panti_sosial/{id}', [ProfileController::class, 'edit_view'])->name('edit_profile.panti_sosial');
Route::post('/edit_profile/panti_sosial/{id}', [ProfileController::class, 'edit_profile_logic'])->name('edit_profile_logic.panti_sosial');
Route::post('/edit_schedule/panti_sosial/{id}', [ProfileController::class, 'edit_schedule_logic'])->name('edit_schedule_logic.panti_sosial');
Route::post('/edit_photo/panti_sosial/{id}', [ProfileController::class, 'edit_photo_logic'])->name('edit_photo_logic.panti_sosial');
Route::get('/change_password/panti_sosial/{id}', [ProfileController::class, 'change_password_view'])->name('change_password.panti_sosial');
Route::post('/change_password/panti_sosial/{id}', [ProfileController::class, 'change_password_logic'])->name('change_password_logic.panti_sosial');
Route::get('/logout/panti_sosial', [ProfileController::class, 'logout'])->name('logout.panti_sosial');

// DETAIL KEGIATAN DONASI
// Route::get('/DetailKegiatanDonasi', function () {
//     return view('DetailKegiatanDonasi');
// });


// ===== DETAIL KEGIATAN DONASI =====
Route::get('/kegiatan-donasi/{id}', [DetailKegiatanDonasiController::class, 'show'])->name('kegiatan-donasi.show');
Route::get('/ubah-kegiatan-donasi/{id}', [DetailKegiatanDonasiController::class, 'showEdit'])->name('ubah-kegiatan-donasi.show');
Route::delete('/delete-kegiatan-donasi/{id}', [DetailKegiatanDonasiController::class, 'destroy'])->name('delete-kegiatan-donasi.destroy');
Route::put('/update-kegiatan-donasi/{id}', [DetailKegiatanDonasiController::class, 'update'])->name('ubah-kegiatan-donasi.update');

// ===== BUAT KEGIATAN DONASI =====
Route::get('/buat-kegiatan-donasi/{id}', [BuatKegiatanDonasiController::class, 'show'])->name('buat_kegiatan_donasi.show');
Route::post('/simpan-kegiatan-donasi', [BuatKegiatanDonasiController::class, 'store'])->name('buat_kegiatan_donasi.store');

// ===== RIWAYAT DONASI =====
Route::get('/riwayat-donatur/{id}', [RiwayatDonaturController::class, 'index'])->name('riwayat-donatur.index');
Route::post('/update-status/{IDRegistrasiDonatur}', [RiwayatDonaturController::class, 'updateStatus'])->name('update-status');
Route::post('/update-status-checkbox-donatur/{IDRegistrasiDonatur}', [RiwayatDonaturController::class, 'updateStatusCheckbox'])->name('update-status-checkbox-donatur');

// ===== DETAIL KEGIATAN RELAWAN =====
Route::get('/kegiatan-relawan/{id}', [DetailKegiatanRelawanController::class, 'show'])->name('kegiatan-relawan.show');
Route::get('/ubah-kegiatan-relawan/{id}', [DetailKegiatanRelawanController::class, 'showEdit'])->name('ubah-kegiatan-relawan.show');
Route::delete('/delete-kegiatan-relawan/{id}', [DetailKegiatanRelawanController::class, 'destroy'])->name('delete-kegiatan-relawan.destroy');
Route::put('/update-kegiatan-relawan/{id}', [DetailKegiatanRelawanController::class, 'update'])->name('ubah-kegiatan-relawan.update');

// ===== BUAT KEGIATAN RELAWAN =====
Route::get('/buat-kegiatan-relawan/{id}', [BuatKegiatanRelawanController::class, 'show'])->name('buat_kegiatan_relawan.show');
Route::post('/simpan-kegiatan-relawan', [BuatKegiatanRelawanController::class, 'store'])->name('buat_kegiatan_relawan.store');

// ===== RIWAYAT RELAWAN =====
Route::get('/riwayat-relawan/{id}', [RiwayatRelawanController::class, 'index'])->name('riwayat-relawan.index');
Route::post('/update-status-relawan/{IDRegistrasiRelawan}', [RiwayatRelawanController::class, 'updateStatus'])->name('update-status-relawan');
Route::post('/update-status-checkbox-relawan/{IDRegistrasiRelawan}', [RiwayatRelawanController::class, 'updateStatusCheckbox'])->name('update-status-checkbox-relawan');

// ===== FORUM =====
Route::get('/daftarForum/{id}', [forumController::class, 'displayDaftarForum'])->name('displayDaftarForum');
Route::post('/daftarForum/{id}', [forumController::class, 'buatForum'])->name('buatForum');
Route::get('/forum/{idDonaturRelawan}/{idForum}', [forumController::class, 'displayDetailForum'])->name('displayDetailForum');
Route::post('/komentar/{idDonaturRelawan}', [KomentarForumController::class, 'storeKomentar'])->name('simpanKomentar');

// === FAQ ===
Route::get('/faq/{id}', [generalPageController::class, 'faq'])->name('faq');

// ===== DUMMY PAGES =====
Route::get('/dummyProfile', [generalPageController::class, 'displayDummyProfilePage'])->name('dummyProfile');
Route::get('/dummyBuatKegiatanRelawan', [buatKegiatanController::class, 'displayDummyBuatRelawanPage'])->name('dummyBuatRelawan');
Route::get('/dummyBuatKegiatanDonasi', [buatKegiatanController::class, 'displayDummyBuatDonasiPage'])->name('dummyBuatDonasi');
Route::get('/home_page', [ProfileController::class, 'home_page'])->name('home_page');
