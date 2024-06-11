<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanDonasi;
use App\Models\DonaturAtauRelawan;
use App\Models\RegistrasiDonatur;


class SummaryDaftarDonasiController extends Controller
{
    public function show(Request $request, $idKegiatanDonasi, $idDonaturRelawan)
    {
        // Cari data kegiatan relawan berdasarkan ID
        $kegiatanDonasi = KegiatanDonasi::find($idKegiatanDonasi);

        // Cari data donatur relawan berdasarkan ID
        $donaturRelawan = DonaturAtauRelawan::find($idDonaturRelawan);

        // Jika data kegiatan atau donatur tidak ditemukan, redirect kembali dengan pesan error
        if (!$kegiatanDonasi || !$donaturRelawan) {
            return redirect()->back()->with('error', 'Kegiatan atau Donatur tidak ditemukan');
        }

        // Ambil data dari session jika ada
        $data = $request->session()->get('daftar_donasi');

        // Kirim data ke view SummaryDaftarRelawan
        return view('SummaryDaftarDonasi', compact('kegiatanDonasi', 'donaturRelawan', 'data'));
    }


public function store(Request $request)
{
    // Ambil data dari session
    $data = $request->session()->get('daftar_donasi');

    // Ambil ID kegiatan donasi dan ID donatur relawan dari input hidden
    $idKegiatanDonasi = $request->input('idKegiatanRelawan');
    $idDonaturRelawan = $request->input('idDonaturRelawan');

    // Ambil data kegiatan donasi dari database
    $kegiatanDonasi = KegiatanDonasi::find($idKegiatanDonasi);

    // Jika data kegiatan donasi tidak ditemukan, redirect kembali dengan pesan error
    if (!$kegiatanDonasi) {
        return redirect()->back()->with('error', 'Kegiatan tidak ditemukan');
    }

    // Simpan data registrasi donatur
    RegistrasiDonatur::create([
        'IDDonaturRelawan' => $idDonaturRelawan,
        'IDKegiatanDonasi' => $idKegiatanDonasi,
        'StatusRegistrasiDonatur' => 'Menunggu Konfirmasi', // Default status
        'JenisDonasiDidonasikan' => $data['jenis_donasi'],
        'DeskripsiBarangDonasi' => $data['deskripsi_barang'],
        'TanggalDonasi' => $data['tanggal_kegiatan'],
        'JamDonasi' => $data['jam_mulai_kegiatan'], // Assuming jam mulai kegiatan is the jam donasi
        'PengirimanBarang' => $data['pengiriman_barang'],
    ]);

    // Hapus data dari session
    // $request->session()->forget('daftar_donasi');


    return redirect()->back()->with('success', 'Registrasi berhasil disimpan');
}



}
