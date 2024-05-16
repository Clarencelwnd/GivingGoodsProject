<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanDonasi extends Model
{
    protected $table = 'kegiatan_donasi';
    protected $primaryKey = 'IDKegiatanDonasi';
    protected $fillable = [
        'IDPantiSosial', 'GambarKegiatanDonasi', 'NamaKegiatanDonasi', 'DeskripsiKegiatanDonasi', ' JenisDonasiDibutuhkan', 'TanggalKegiatanDonasiMulai', 'TanggalKegiatanDonasiSelesai', 'LokasiKegiatanDonasi', 'LinkGoogleMapsLokasiKegiatanDonasi'
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
