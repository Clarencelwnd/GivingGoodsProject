<?php
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
use App\Http\Controllers\UserGeneralPage;
use App\Http\Controllers\UserGeneralPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//=== HALAMAN UTAMA ====
Route::get('/halaman-utama', [UserGeneralPageController::class, 'displayUserGeneralPage']);

//FAQ
Route::get('/FAQ', function () {
    return view('FAQ.FAQ');
});

// ====== KEGIATAN RELAWAN ======
Route::get('/dr-detail-kegiatan-relawan/{idKegiatanRelawan}/{idDonaturRelawan}', [drDetailKegiatanRelawanController::class, 'show']);

Route::get('/daftar-kegiatan-relawan/{idKegiatanRelawan}/{idDonaturRelawan}', [DaftarKegiatanRelawanController::class, 'show'])->name('daftarKegiatanRelawan');
Route::post('/store-daftar-kegiatan-relawan', [DaftarKegiatanRelawanController::class, 'store'])->name('storeDaftarKegiatanRelawan');

Route::get('/summary-daftar-relawan/{idKegiatanRelawan}/{idDonaturRelawan}', [SummaryDaftarRelawanController::class, 'show'])->name('summaryDaftarRelawan');
Route::post('/store-daftar-relawan', [SummaryDaftarRelawanController::class, 'store'])->name('storeSummaryDaftarRelawan');


// ====== Kegiatan Donasi ======
Route::get('/dr-detail-kegiatan-donasi/{idKegiatanDonasi}/{idDonaturRelawan}', [drDetailKegiatanDonasiController::class, 'show']);

Route::get('/daftar-kegiatan-donasi/{idKegiatanDonasi}/{idDonaturRelawan}', [DaftarKegiatanDonasiController::class, 'show'])->name('daftarKegiatanDonasi');
Route::post('/store-daftar-kegiatan-donasi', [DaftarKegiatanDonasiController::class, 'store'])->name('storeDaftarKegiatanDonasi');

Route::get('/summary-daftar-donasi/{idKegiatanDonasi}/{idDonaturRelawan}', [SummaryDaftarDonasiController::class, 'show'])->name('summaryDaftarDonasi');
Route::post('/store-daftar-donasi', [SummaryDaftarDonasiController::class, 'store'])->name('storeSummaryDaftarDonasi');


// ====== Page Panti Sosial ======
Route::get('/panti-sosial/{IDPantiSosial}/{IDDonaturRelawan}', [PagePanSosController::class, 'show'])->name('panti_sosial.show');


// ====== Artikel ======
//Daftar Artikel
Route::get('/daftarArtikel', [ArtikelController::class, 'displayDaftarArtikel'])->name('displayDaftarArtikel');
//Detail Artikel 1
Route::get('/detailArtikel', [ArtikelController::class, 'displayDetailArtikel'])->name('displayDetailArtikel');
//Detail Artikel 2
Route::get('/daftarArtikel/artikel2', [ArtikelController::class, 'displayDetailArtikel2'])->name('displayDetailArtikel2');

//Daftar Kegiatan
Route::get('/daftar-kegiatan', [DaftarKegiatanController::class, 'displayDaftarKegiatan'])->name('displayDaftarKegiatan');

//Search
Route::get('/search', [DaftarKegiatanController::class, 'search'])->name('daftarKegiatan.search');

//Side bar
Route::get('/sidebar', [DaftarKegiatanController::class, 'displaySideBar'])->name('displaySideBar');

//Search Panti Sosial
// Route::get('/panti-sosial/{id}', [PantiSosialController::class, 'displaySearchResult'])->name('searchPantiSosial');

// ====== Profile ======
Route::get('/profile/donatur_relawan/{id}', [ProfileDonaturRelawanController::class, 'index'])->name('profile.donatur_relawan');
Route::get('/edit_profile/donatur_relawan/{id}', [ProfileDonaturRelawanController::class, 'edit_view'])->name('edit_profile.donatur_relawan');
Route::post('/edit_profile/donatur_relawan/{id}', [ProfileDonaturRelawanController::class, 'edit_profile_logic'])->name('edit_profile_logic.donatur_relawan');
Route::post('/edit_schedule/donatur_relawan/{id}', [ProfileDonaturRelawanController::class, 'edit_schedule_logic'])->name('edit_schedule_logic.donatur_relawan');
Route::post('/edit_photo/donatur_relawan/{id}', [ProfileDonaturRelawanController::class, 'edit_photo_logic'])->name('edit_photo_logic.donatur_relawan');
Route::get('/change_password/donatur_relawan/{id}', [ProfileDonaturRelawanController::class, 'change_password_view'])->name('change_password.donatur_relawan');
Route::post('/change_password/donatur_relawan/{id}', [ProfileDonaturRelawanController::class, 'change_password_logic'])->name('change_password_logic.donatur_relawan');
Route::get('/riwayat_kegiatan/{id}', [ProfileDonaturRelawanController::class, 'riwayat_kegiatan'])->name('riwayat_kegiatan');
Route::get('/detail_riwayat_kegiatan/donasi/{id1}/{id2}', [ProfileDonaturRelawanController::class, 'detail_riwayat_kegiatan_donasi'])->name('detail_riwayat_kegiatan_donasi');
Route::get('/detail_riwayat_kegiatan/relawan/{id1}/{id2}', [ProfileDonaturRelawanController::class, 'detail_riwayat_kegiatan_relawan'])->name('detail_riwayat_kegiatan_relawan');
Route::get('/logout/donatur_relawan', [ProfileDonaturRelawanController::class, 'logout'])->name('logout.donatur_relawan');


// DUMMY
Route::get('/home_page', [ProfileDonaturRelawanController::class, 'home_page'])->name('home_page');

