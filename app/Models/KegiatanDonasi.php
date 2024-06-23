<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanDonasi extends Model
{
    protected $table = 'kegiatan_donasi';
    protected $primaryKey = 'IDKegiatanDonasi';
    protected $fillable = [
        'IDPantiSosial', 'GambarKegiatanDonasi', 'NamaKegiatanDonasi', 'DeskripsiKegiatanDonasi', 'JenisDonasiDibutuhkan', 'DeskripsiJenisDonasi', 'TanggalKegiatanDonasiMulai', 'TanggalKegiatanDonasiSelesai', 'LokasiKegiatanDonasi', 'LinkGoogleMapsLokasiKegiatanDonasi', 'JasaPickup'
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
