<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanDonasi extends Model
{
    protected $table = 'kegiatan_donasi';
    protected $primaryKey = 'IDKegiatanDonasi';
    protected $fillable = [
        'IDPantiSosial', 'GambarKegiatanDonasi', 'NamaKegiatanDonasi', 'DeskripsiKegiatanDonasi', 'TanggalKegiatanDonasiMulai', 'TanggalKegiatanDonasiSelesai', 'LokasiKegiatanDonasi', 'LinkGoogleMapsLokasiKegiatanDonasi', 'StatusKegiatanDonasi', ' JenisDonasiDibutuhkan'
    ];
}
