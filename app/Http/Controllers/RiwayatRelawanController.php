<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistrasiRelawan;


class RiwayatRelawanController extends Controller
{
    public function index($idKegiatanRelawan, $idPantiSosial)
    {
        // Ambil data registrasi relawan beserta informasi relawan berdasarkan IDKegiatanRelawan
        $registrasiRelawan = RegistrasiRelawan::with('donaturRelawan', 'kegiatanRelawan')->where('IDKegiatanRelawan', $idKegiatanRelawan)->get();

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

        // Format tanggal dan jam menjadi satu string dan tambahkan ke variabel baru
        foreach ($registrasiRelawan as $registrasi) {
            $partitionTanggalKegiatan = explode('-', $registrasi->TanggalKehadiranRelawan);
            $tanggalKegiatan = $partitionTanggalKegiatan[2] . ' ' . $bulan[$partitionTanggalKegiatan[1]] . ' ' . $partitionTanggalKegiatan[0];
            $waktuKegiatan = date('H:i', strtotime($registrasi->kegiatanRelawan->JamMulaiKegiatanRelawan)) . ' - '. date('H:i', strtotime($registrasi->kegiatanRelawan->JamSelesaiKegiatanRelawan));
            $registrasi->setAttribute('tanggalKegiatan', $tanggalKegiatan);
            $registrasi->setAttribute('waktuKegiatan', $waktuKegiatan);
        }

        // Hitung jumlah relawan dengan status "Konfirmasi Diterima"
        $jumlahKonfirmasiDiterima = RegistrasiRelawan::where('StatusRegistrasiRelawan', 'Terima')->where('IDKegiatanRelawan', $idKegiatanRelawan)->count();

        $id = $idPantiSosial;
        // Kirim data ke view beserta jumlah relawan yang telah dikonfirmasi
        return view('RiwayatKegiatanPantiSosial.RiwayatRelawan', compact('registrasiRelawan', 'jumlahKonfirmasiDiterima', 'idKegiatanRelawan', 'id'));
    }

    public function updateStatus(Request $request, $idRegistrasiRelawan)
    {
        $registrasi = RegistrasiRelawan::find($idRegistrasiRelawan);
        if ($registrasi) {
            // Ubah status berdasarkan tombol yang diklik
            if ($request->has('terima')) {
                $registrasi->StatusRegistrasiRelawan = 'Terima';
            } elseif ($request->has('tolak')) {
                $registrasi->StatusRegistrasiRelawan = 'Tolak';
            }
            $registrasi->save();

            return redirect()->back()->with('success', 'Status berhasil diperbarui');
        }

        return redirect()->back()->with('error', 'Registrasi tidak ditemukan');
    }


    public function updateStatusCheckbox(Request $request, $idRegistrasiRelawan)
{
    $registrasi = RegistrasiRelawan::find($idRegistrasiRelawan);
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
