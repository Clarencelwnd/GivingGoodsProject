<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Models\DonaturAtauRelawan;

class RegistrasiDonatur extends Model
{
    protected $table = 'registrasi_donatur';
    protected $primaryKey = 'IDRegistrasiDonatur';
    protected $fillable = [
        'IDDonaturRelawan', 'IDKegiatanDonasi', 'StatusKegiatanRelawan', 'JenisDonasiDidonasikan', 'DeskripsiBarangDonasi', 'TanggalDonasi', 'JamDonasi',
    ];

     // Definisikan relasi dengan model DonaturAtauRelawan
     public function donaturRelawan()
     {
         return $this->belongsTo(DonaturAtauRelawan::class, 'IDDonaturRelawan', 'IDDonaturRelawan');
     }
}

