<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrasiRelawan extends Model
{
    protected $table = 'registrasi_relawan';
    protected $primaryKey = 'IDRegistrasiRelawan';
    protected $fillable = [
        'IDDonaturRelawan', 'IDKegiatanRelawan', 'IDStatus', 'AlasanRegistrasiRelawan',
    ];
}
