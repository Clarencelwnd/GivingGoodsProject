<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanDonasi extends Model
{
    protected $table = 'kegiatan_donasi';
    protected $primaryKey = 'IDKegiatanDonasi';
    protected $fillable = [
<<<<<<< HEAD
        'IDPantiSosial', 'GambarKegiatanDonasi', 'NamaKegiatanDonasi', 'DeskripsiKegiatanDonasi', 'TanggalKegiatanDonasiMulai', 'TanggalKegiatanDonasiSelesai', 'LokasiKegiatanDonasi', 'LinkGoogleMapsLokasiKegiatanDonasi', 'StatusKegiatanDonasi', ' JenisDonasiDibutuhkan', 'DeskripsiJenisDonasi'
=======
        'IDPantiSosial', 'GambarKegiatanDonasi', 'NamaKegiatanDonasi', 'DeskripsiKegiatanDonasi', ' JenisDonasiDibutuhkan', 'TanggalKegiatanDonasiMulai', 'TanggalKegiatanDonasiSelesai', 'LokasiKegiatanDonasi', 'LinkGoogleMapsLokasiKegiatanDonasi'
>>>>>>> f/riwayatRelawanDonatur2
    ];

    public function registrasiDonatur(){
        return $this->hasMany(RegistrasiDonatur::class, 'IDKegiatanDonasi', 'IDKegiatanDonasi');
    }

    public function pantiSosial(){
        return $this->belongsTo(PantiSosial::class, 'IDPantiSosial', 'IDPantiSosial');
    }

    public function jadwalKegiatanDonasi(){
        return $this->hasMany(JadwalKegiatanDonasi::class, 'IDKegiatanDonasi', 'IDKegiatanDonasi');
    }
}
