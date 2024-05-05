<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanRelawan extends Model
{
    protected $table = 'kegiatan_relawan';
    protected $primaryKey = 'IDKegiatanRelawan';
    protected $fillable = [
        'IDPantiSosial', 'IDJenisKegiatanRelawan', 'IDStatus', 'GambarKegiatanRelawan', 'NamaKegiatanRelawan', 'DeskripsiKegiatanRelawan', 'TanggalKegiatanRelawanMulai', 'TanggalKegiatanRelawanSelesai', 'TanggalPendaftaranKegiatanDitutup', 'JamMulaiKegiatanRelawan', 'JamSelesaiKegiatanRelawan', 'JumlahRelawanDibutuhkan', 'LokasiKegiatanRelawan', 'LinkGoogleMapsLokasiKegiatanRelawan', 'KriteriaRelawan', 'SyaratDanInstruksiKegiatanRelawan', 'KontakKegiatanRelawan',
    ];
}
