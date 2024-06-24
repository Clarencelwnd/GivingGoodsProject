<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanRelawan;
use App\Models\DonaturAtauRelawan;
use App\Models\RegistrasiRelawan;
use GuzzleHttp\Client;


class drDetailKegiatanRelawanController extends Controller
{

    public function show($idKegiatanRelawan, $idDonaturRelawan, $jarakKm)
    {
        // Ambil data kegiatan relawan berdasarkan ID
        $kegiatanRelawan = KegiatanRelawan::find($idKegiatanRelawan);
        $registrasiRelawan = RegistrasiRelawan::where('IDKegiatanRelawan', $idKegiatanRelawan)
                                               ->where('IDDonaturRelawan', $idDonaturRelawan)
                                               ->first();

        // Jika kegiatan relawan tidak ditemukan, kembalikan ke halaman sebelumnya
        if (!$kegiatanRelawan) {
            return redirect()->back()->with('error', 'Kegiatan tidak ditemukan');
        }

        // Ambil data donatur/relawan berdasarkan ID
        $donaturRelawan = DonaturAtauRelawan::find($idDonaturRelawan);

        // Jika donatur/relawan tidak ditemukan, kembalikan ke halaman sebelumnya
        if (!$donaturRelawan) {
            return redirect()->back()->with('error', 'Donatur/relawan tidak ditemukan');
        }

        // Variabel $id untuk keperluan customisasi di view
        $id = $idDonaturRelawan;

        $bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];
        $partitionTanggalKegiatanRelawanMulai = explode('-', $kegiatanRelawan->TanggalKegiatanRelawanMulai);
        $partitionTanggalKegiatanRelawanSelesai = explode('-', $kegiatanRelawan->TanggalKegiatanRelawanSelesai);
        $kegiatanRelawan->setAttribute('FormatTanggalRelawan', $partitionTanggalKegiatanRelawanMulai[2] . ' ' . $bulan[$partitionTanggalKegiatanRelawanMulai[1]] . ' ' . $partitionTanggalKegiatanRelawanMulai[0] . ' - ' .
        $partitionTanggalKegiatanRelawanSelesai[2] . ' ' . $bulan[$partitionTanggalKegiatanRelawanSelesai[1]] . ' ' . $partitionTanggalKegiatanRelawanSelesai[0]);
        $kegiatanRelawan->setAttribute('FormatJamRelawan', date('H:i', strtotime($kegiatanRelawan->JamMulaiKegiatanRelawan)) . ' - '. date('H:i', strtotime($kegiatanRelawan->JamSelesaiKegiatanRelawan)));
        $partitionTanggalPendaftaranKegiatanDitutup = explode('-', $kegiatanRelawan->TanggalPendaftaranKegiatanDitutup);
        $kegiatanRelawan->setAttribute('FormatTanggalPendaftaranKegiatanDitutup', $partitionTanggalPendaftaranKegiatanDitutup[2] . ' ' . $bulan[$partitionTanggalPendaftaranKegiatanDitutup[1]] . ' ' . $partitionTanggalPendaftaranKegiatanDitutup[0]);

        if($registrasiRelawan){
            $kegiatanRelawan->setAttribute('Disable', 'True');
        }
        else{
            $kegiatanRelawan->setAttribute('Disable', 'False');
        }

        // Mengirimkan data ke view beserta jarakKm jika ada
        return view('DetailKegiatanRelawan.drDetailKegiatanRelawan', compact('kegiatanRelawan', 'donaturRelawan', 'id', 'jarakKm'));
    }


}
