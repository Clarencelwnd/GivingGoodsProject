<?php

use App\Http\Controllers\forumPantiSosialController;
use App\Http\Controllers\generalPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KomentarForumPantiSosialController;
use App\Models\KomentarForum;
use App\Http\Controllers\ProfileDonaturRelawanController;
use App\Http\Controllers\drDetailKegiatanRelawanController;
use App\Http\Controllers\DaftarKegiatanRelawanController;
use App\Http\Controllers\SummaryDaftarRelawanController;
use App\Http\Controllers\drDetailKegiatanDonasiController;
use App\Http\Controllers\DaftarKegiatanDonasiController;
use App\Http\Controllers\SummaryDaftarDonasiController;
use App\Http\Controllers\PagePanSosController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DaftarKegiatanController;
use App\Http\Controllers\PantiSosialController;
use App\Http\Controllers\UserGeneralPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailKegiatanDonasiController;
use App\Http\Controllers\DetailKegiatanRelawanController;
use App\Http\Controllers\RiwayatDonaturController;
use App\Http\Controllers\RiwayatRelawanController;
use App\Http\Controllers\BuatKegiatanDonasiController;
use App\Http\Controllers\BuatKegiatanRelawanController;
use App\Http\Controllers\ForumDonaturRelawanController;
use App\Http\Controllers\KomentarForumDonaturRelawanController;

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
Route::post('/simpan-kegiatan-relawan/{id}', [BuatKegiatanRelawanController::class, 'store'])->name('buat_kegiatan_relawan.store');

// ===== RIWAYAT RELAWAN =====
Route::get('/riwayat-relawan/{id}', [RiwayatRelawanController::class, 'index'])->name('riwayat-relawan.index');
Route::post('/update-status-relawan/{IDRegistrasiRelawan}', [RiwayatRelawanController::class, 'updateStatus'])->name('update-status-relawan');
Route::post('/update-status-checkbox-relawan/{IDRegistrasiRelawan}', [RiwayatRelawanController::class, 'updateStatusCheckbox'])->name('update-status-checkbox-relawan');

// ===== FORUM =====
Route::get('/daftarForumPantiSosial/{id}', [forumPantiSosialController::class, 'displayDaftarForum'])->name('displayDaftarForumPantiSosial');
Route::post('/daftarForumPantiSosial/{id}', [forumPantiSosialController::class, 'buatForum'])->name('buatForumPantiSosial');
Route::get('/forumPantiSosial/{idPantiSosial}/{idForum}', [forumPantiSosialController::class, 'displayDetailForum'])->name('displayDetailForumPantiSosial');
Route::post('/komentarForumPantiSosial/{idPantiSosial}', [KomentarForumPantiSosialController::class, 'storeKomentar'])->name('simpanKomentarForumPantiSosial');

// === FAQ ===
Route::get('/faqPantiSosial/{id}', [generalPageController::class, 'faq'])->name('faqPantiSosial');

//Halaman utama
Route::get('/halaman-utama/{id}', [UserGeneralPageController::class, 'displayUserGeneralPage'])->name('halamanUtama');
Route::get('/faq/{id}', [UserGeneralPageController::class, 'FAQ'])->name('FAQ');

//Daftar Kegiatan
Route::get('/daftar-kegiatan/{id}', [DaftarKegiatanController::class, 'displayDaftarKegiatan'])->name('displayDaftarKegiatan');

// ====== Kegiatan Relawan ======
Route::get('/dr-detail-kegiatan-relawan/{idKegiatanRelawan}/{idDonaturRelawan}/{jarakKm}', [drDetailKegiatanRelawanController::class, 'show'])->name('detailKegiatanRelawan');
Route::get('/daftar-kegiatan-relawan/{idKegiatanRelawan}/{idDonaturRelawan}', [DaftarKegiatanRelawanController::class, 'show'])->name('daftarKegiatanRelawan');
Route::post('/store-daftar-kegiatan-relawan', [DaftarKegiatanRelawanController::class, 'store'])->name('storeDaftarKegiatanRelawan');
Route::get('/summary-daftar-relawan/{idKegiatanRelawan}/{idDonaturRelawan}', [SummaryDaftarRelawanController::class, 'show'])->name('summaryDaftarRelawan');
Route::post('/store-daftar-relawan', [SummaryDaftarRelawanController::class, 'store'])->name('storeSummaryDaftarRelawan');

// ====== Kegiatan Donasi ======
Route::get('/dr-detail-kegiatan-donasi/{idKegiatanDonasi}/{idDonaturRelawan}/{jarakKm}', [drDetailKegiatanDonasiController::class, 'show'])->name('detailKegiatanDonasi');
Route::get('/daftar-kegiatan-donasi/{idKegiatanDonasi}/{idDonaturRelawan}', [DaftarKegiatanDonasiController::class, 'show'])->name('daftarKegiatanDonasi');
Route::post('/store-daftar-kegiatan-donasi', [DaftarKegiatanDonasiController::class, 'store'])->name('storeDaftarKegiatanDonasi');
Route::get('/summary-daftar-donasi/{idKegiatanDonasi}/{idDonaturRelawan}', [SummaryDaftarDonasiController::class, 'show'])->name('summaryDaftarDonasi');
Route::post('/store-daftar-donasi', [SummaryDaftarDonasiController::class, 'store'])->name('storeSummaryDaftarDonasi');

// ====== Page Detail Panti Sosial ======
Route::get('/panti-sosial/{idPantiSosial}/{idDonaturRelawan}', [PagePanSosController::class, 'show'])->name('panti_sosial.show');

//Search
Route::get('/search/{id}', [DaftarKegiatanController::class, 'search'])->name('daftarKegiatan.search');

//Side bar
Route::get('/sidebar', [DaftarKegiatanController::class, 'displaySideBar'])->name('displaySideBar');

//Search Panti Sosial
// Route::get('/panti-sosial/{id}', [PantiSosialController::class, 'displaySearchResult'])->name('searchPantiSosial');

// ====== Artikel ======
//Daftar Artikel
Route::get('/daftarArtikel/{id}', [ArtikelController::class, 'displayDaftarArtikel'])->name('displayDaftarArtikel');
//Detail Artikel 1
Route::get('/detailArtikel/{id}', [ArtikelController::class, 'displayDetailArtikel'])->name('displayDetailArtikel');
//Detail Artikel 2
Route::get('/daftarArtikel/artikel2/{id}', [ArtikelController::class, 'displayDetailArtikel2'])->name('displayDetailArtikel2');

//FORUM
Route::get('/daftarForum/{id}', [ForumDonaturRelawanController::class, 'displayDaftarForum'])->name('displayDaftarForum');
Route::post('/daftarForum/{id}', [ForumDonaturRelawanController::class, 'buatForum'])->name('buatForum');
Route::get('/forum/{idDonaturRelawan}/{idForum}', [ForumDonaturRelawanController::class, 'displayDetailForum'])->name('displayDetailForum');
Route::post('/komentar/{idDonaturRelawan}', [KomentarForumDonaturRelawanController::class, 'storeKomentar'])->name('simpanKomentar');

// ====== Profile ======
Route::get('/profile/donatur_relawan/{id}', [ProfileDonaturRelawanController::class, 'index'])->name('profile.donatur_relawan');
Route::get('/edit_profile/donatur_relawan/{id}', [ProfileDonaturRelawanController::class, 'edit_view'])->name('edit_profile.donatur_relawan');
Route::post('/edit_profile/donatur_relawan/{id}', [ProfileDonaturRelawanController::class, 'edit_profile_logic'])->name('edit_profile_logic.donatur_relawan');
Route::post('/edit_schedule/donatur_relawan/{id}', [ProfileDonaturRelawanController::class, 'edit_schedule_logic'])->name('edit_schedule_logic.donatur_relawan');
Route::post('/edit_photo/donatur_relawan/{id}', [ProfileDonaturRelawanController::class, 'edit_photo_logic'])->name('edit_photo_logic.donatur_relawan');
Route::get('/change_password/donatur_relawan/{id}', [ProfileDonaturRelawanController::class, 'change_password_view'])->name('change_password.donatur_relawan');
Route::post('/change_password/donatur_relawan/{id}', [ProfileDonaturRelawanController::class, 'change_password_logic'])->name('change_password_logic.donatur_relawan');
Route::get('/riwayat_kegiatan/{id}', [ProfileDonaturRelawanController::class, 'riwayat_kegiatan'])->name('riwayat_kegiatan');
Route::get('/detail_riwayat_kegiatan/donasi/{idDonaturRelawan}/{idRegistrasiDonasi}', [ProfileDonaturRelawanController::class, 'detail_riwayat_kegiatan_donasi'])->name('detail_riwayat_kegiatan_donasi');
Route::get('/detail_riwayat_kegiatan/relawan/{idDonaturRelawan}/{idRegistrasiRelawan}', [ProfileDonaturRelawanController::class, 'detail_riwayat_kegiatan_relawan'])->name('detail_riwayat_kegiatan_relawan');
Route::get('/logout/donatur_relawan', [ProfileDonaturRelawanController::class, 'logout'])->name('logout.donatur_relawan');




