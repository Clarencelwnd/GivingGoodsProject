<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrasiDonatur extends Model
{
    protected $table = 'registrasi_donatur';
    protected $primaryKey = 'IDRegistrasiDonatur';
    protected $fillable = [
        'IDDonaturRelawan', 'IDKegiatanDonasi', 'StatusRegistrasiDonatur', 'JenisDonasiDidonasikan', 'DeskripsiBarangDonasi', 'PengirimanBarang', 'TanggalDonasi', 'JamDonasi', 'StatusDihubungi'
    ];

    public function donaturRelawan(){
        return $this->belongsTo(DonaturAtauRelawan::class, 'IDDonaturRelawan', 'IDDonaturRelawan');
    }

    public function kegiatanDonasi(){
        return $this->belongsTo(KegiatanDonasi::class, 'IDKegiatanDonasi', 'IDKegiatanDonasi');
    }
}
