<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanRelawan;
use App\Models\DonaturAtauRelawan;
use App\Models\RegistrasiRelawan;


class SummaryDaftarRelawanController extends Controller
{
    public function show(Request $request, $idKegiatanRelawan, $idDonaturRelawan)
    {
        // Cari data kegiatan relawan berdasarkan ID
        $kegiatanRelawan = KegiatanRelawan::find($idKegiatanRelawan);

        // Cari data donatur relawan berdasarkan ID
        $donaturRelawan = DonaturAtauRelawan::find($idDonaturRelawan);

        // Jika data kegiatan atau donatur tidak ditemukan, redirect kembali dengan pesan error
        if (!$kegiatanRelawan || !$donaturRelawan) {
            return redirect()->back()->with('error', 'Kegiatan atau Donatur tidak ditemukan');
        }

        // Ambil data dari session jika ada
        $data = $request->session()->get('daftar_relawan');

        // Kirim data ke view SummaryDaftarRelawan
        return view('SummaryDaftarRelawan', compact('kegiatanRelawan', 'donaturRelawan', 'data'));
    }



public function store(Request $request)
{
    // Ambil data 'alasan_relawan' dan 'tanggal_kegiatan' dari session
    $alasanRelawan = $request->session()->get('daftar_relawan.alasan_relawan');
    $tanggalKegiatan = $request->session()->get('daftar_relawan.tanggal_kegiatan');

    // Ambil ID kegiatan relawan dan ID donatur relawan dari input hidden
    $idKegiatanRelawan = $request->input('idKegiatanRelawan');
    $idDonaturRelawan = $request->input('idDonaturRelawan');

    $kegiatanRelawan = KegiatanRelawan::find($idKegiatanRelawan);

    if (!$kegiatanRelawan) {
        return redirect()->back()->with('error', 'Kegiatan tidak ditemukan');
    }

    // Simpan data registrasi relawan
    RegistrasiRelawan::create([
        'IDDonaturRelawan' => $idDonaturRelawan,
        'IDKegiatanRelawan' => $idKegiatanRelawan,
        'StatusRegistrasiRelawan' => 'Menunggu Konfirmasi', // Default status
        'AlasanRegistrasiRelawan' => $alasanRelawan,
        'TanggalKehadiranRelawan' => $tanggalKegiatan,
        'JamMulaiRelawan' => $kegiatanRelawan->JamMulaiKegiatanRelawan,
        'JamSelesaiRelawan' => $kegiatanRelawan->JamSelesaiKegiatanRelawan,
    ]);

    // Hapus data dari session
    // $request->session()->forget(['daftar_relawan']);

    // return redirect()->route('halaman-tertentu')->with('success', 'Registrasi berhasil disimpan');
    return redirect()->back()->with('success', 'Registrasi berhasil disimpan');

}



}
