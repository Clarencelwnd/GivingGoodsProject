<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistrasiDonatur;


class RiwayatDonaturController extends Controller{

    public function index($idKegiatanDonasi, $idPantiSosial){

    // Ambil data registrasi donatur beserta informasi donatur berdasarkan ID
    $registrasiDonatur = RegistrasiDonatur::with('donaturRelawan')->where('IDKegiatanDonasi', $idKegiatanDonasi)->get();

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

    // Format tanggal dan jam menjadi satu string
    foreach ($registrasiDonatur as $registrasi) {
        $partitionTanggalDonasi = explode('-', $registrasi->TanggalDonasi);
        $tanggalDonasi = $partitionTanggalDonasi[2] . ' ' . $bulan[$partitionTanggalDonasi[1]] . ' ' . $partitionTanggalDonasi[0];
        $jamDonasi = date('H:i', strtotime($registrasi->JamDonasi));
        $registrasi->setAttribute('jamTanggalDonasi', $tanggalDonasi . ' ' . $jamDonasi);
    }

    // Hitung jumlah donatur dengan status "Konfirmasi Diterima"
    $jumlahKonfirmasiDiterima = RegistrasiDonatur::where('StatusRegistrasiDonatur', 'Konfirmasi Diterima')->where('IDKegiatanDonasi', $idKegiatanDonasi)->count();

    $id = $idPantiSosial;

    // Kirim data ke view beserta jumlah donatur yang telah dikonfirmasi
    return view('RiwayatKegiatanPantiSosial.RiwayatDonatur', compact('registrasiDonatur', 'jumlahKonfirmasiDiterima', 'idKegiatanDonasi', 'id'));
}

    public function updateStatus($idRegistrasiDonatur)
    {
        $registrasi = RegistrasiDonatur::find($idRegistrasiDonatur);
        if ($registrasi) {
            $registrasi->StatusRegistrasiDonatur = 'Konfirmasi Diterima'; // Ubah status di sini
            $registrasi->save();

            return redirect()->back()->with('success', 'Status berhasil diperbarui');
        }

        return redirect()->back()->with('error', 'Registrasi tidak ditemukan');
    }


    public function updateStatusCheckbox(Request $request, $idRegistrasiDonatur)
    {
        $registrasi = RegistrasiDonatur::find($idRegistrasiDonatur);
        if ($registrasi) {
            // Periksa apakah checkbox sudah dicentang atau tidak
            $isChecked = $request->has('sudah_dihubungi');
            $status = $isChecked ? 'Sudah' : 'Belum';
            $registrasi->StatusDihubungi = $status;
            $registrasi->save();

            return redirect()->back()->with('success', 'Status berhasil diperbarui');
        }

        return redirect()->back()->with('error', 'Registrasi tidak ditemukan');
    }

}
