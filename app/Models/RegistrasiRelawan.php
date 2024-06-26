<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrasiRelawan extends Model
{
    protected $table = 'registrasi_relawan';
    protected $primaryKey = 'IDRegistrasiRelawan';
    protected $fillable = [
        'IDDonaturRelawan', 'IDKegiatanRelawan','StatusRegistrasiRelawan', 'AlasanRegistrasiRelawan', 'TanggalKehadiranRelawan', 'StatusDihubungi'
    ];

    public function donaturRelawan(){
        return $this->belongsTo(DonaturAtauRelawan::class, 'IDDonaturRelawan', 'IDDonaturRelawan');
    }

    public function kegiatanRelawan(){
        return $this->belongsTo(KegiatanRelawan::class, 'IDKegiatanRelawan', 'IDKegiatanRelawan');
    }
}
