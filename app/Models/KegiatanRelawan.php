<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanRelawan extends Model
{
    protected $table = 'kegiatan_relawan';
    protected $primaryKey = 'IDKegiatanRelawan';
    protected $fillable = [
        'IDPantiSosial', 'GambarKegiatanRelawan', 'NamaKegiatanRelawan', 'DeskripsiKegiatanRelawan', 'JenisKegiatanRelawan', 'TanggalKegiatanRelawanMulai', 'TanggalKegiatanRelawanSelesai', 'TanggalPendaftaranKegiatanDitutup', 'JamMulaiKegiatanRelawan', 'JamSelesaiKegiatanRelawan', 'JumlahRelawanDibutuhkan', 'LokasiKegiatanRelawan', 'LinkGoogleMapsLokasiKegiatanRelawan', 'KriteriaRelawan', 'SyaratDanInstruksiKegiatanRelawan', 'KontakKegiatanRelawan',
    ];

    public function registrasiRelawan(){
        return $this->hasMany(RegistrasiRelawan::class, 'IDKegiatanRelawan', 'IDKegiatanRelawan');
    }

    public function pantiSosial(){
        return $this->belongsTo(PantiSosial::class, 'IDPantiSosial', 'IDPantiSosial');
    }
}
