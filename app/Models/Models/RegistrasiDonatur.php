<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Models\DonaturAtauRelawan;
use App\Models\Models\KegiatanDonasi;

class RegistrasiDonatur extends Model
{
    protected $table = 'registrasi_donatur';
    protected $primaryKey = 'IDRegistrasiDonatur';
    protected $fillable = [
        'IDDonaturRelawan', 'IDKegiatanDonasi', 'StatusRegistrasiDonatur', 'JenisDonasiDidonasikan', 'DeskripsiBarangDonasi', 'TanggalDonasi', 'JamDonasi', 'StatusDihubungi'
    ];

    public function donaturRelawan(){
        return $this->belongsTo(DonaturAtauRelawan::class, 'IDDonaturRelawan', 'IDDonaturRelawan');
    }

    public function kegiatanDonasi(){
        return $this->belongsTo(KegiatanDonasi::class, 'IDKegiatanDonasi', 'IDKegiatanDonasi');
    }
}
