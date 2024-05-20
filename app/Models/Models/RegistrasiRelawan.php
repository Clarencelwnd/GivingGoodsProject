<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Models\DonaturAtauRelawan;
use App\Models\Models\kegiatanRelawan;

class RegistrasiRelawan extends Model
{
    protected $table = 'registrasi_relawan';
    protected $primaryKey = 'IDRegistrasiRelawan';
    protected $fillable = [
        'IDDonaturRelawan', 'IDKegiatanRelawan','StatusRegistrasiRelawan', 'AlasanRegistrasiRelawan', 'TanggalKegiatanMulaiRelawan', 'TanggalKegiatanSelesaiRelawan', 'JamMulaiRelawan', 'JamSelesaiRelawan'
    ];

    public function donaturRelawan(){
        return $this->belongsTo(DonaturAtauRelawan::class, 'IDDonaturRelawan', 'IDDonaturRelawan');
    }

    public function kegiatanRelawan(){
        return $this->belongsTo(KegiatanRelawan::class, 'IDKegiatanRelawan', 'IDKegiatanRelawan');
    }
}
