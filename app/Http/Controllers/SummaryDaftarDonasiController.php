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
        $kegiatanDonasi = KegiatanDonasi::find($idKegiatanDonasi);

        $donaturRelawan = DonaturAtauRelawan::find($idDonaturRelawan);

        if (!$kegiatanDonasi || !$donaturRelawan) {
            return redirect()->back()->with('error', 'Kegiatan atau Donatur tidak ditemukan');
        }

        $id = $idDonaturRelawan;

        // Ambil data dari session
        $data = $request->session()->get('daftar_donasi');

        return view('DetailKegiatanDonasi.SummaryDaftarDonasi', compact('kegiatanDonasi', 'donaturRelawan', 'data', 'id'));
    }


public function store(Request $request)
{
    // Ambil data dari session
    $data = $request->session()->get('daftar_donasi');

    // Ambil ID kegiatan donasi dan ID donatur relawan dari input hidden
    $idKegiatanDonasi = $request->input('idKegiatanRelawan');
    $idDonaturRelawan = $request->input('idDonaturRelawan');

    $kegiatanDonasi = KegiatanDonasi::find($idKegiatanDonasi);

    if (!$kegiatanDonasi) {
        return redirect()->back()->with('error', 'Kegiatan tidak ditemukan');
    }

    // Simpan data registrasi donatur
    RegistrasiDonatur::create([
        'IDDonaturRelawan' => $idDonaturRelawan,
        'IDKegiatanDonasi' => $idKegiatanDonasi,
        'StatusRegistrasiDonatur' => 'Menunggu Konfirmasi',
        'JenisDonasiDidonasikan' => $data['jenis_donasi'],
        'DeskripsiBarangDonasi' => $data['deskripsi_barang'],
        'TanggalDonasi' => $data['tanggal_kegiatan'],
        'JamDonasi' => $data['jam_mulai_kegiatan'],
        'PengirimanBarang' => $data['pengiriman_barang'],
        'StatusDihubungi' => 'Belum'
    ]);

    return redirect()->back()->with('success', 'Registrasi berhasil disimpan');
}



}
