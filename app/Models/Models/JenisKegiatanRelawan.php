<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKegiatanRelawan extends Model
{
    protected $table = 'jenis_kegiatan_relawan';
    protected $primaryKey = 'IDJenisKegiatanRelawan';
    protected $fillable = [
        'JenisKegiatanRelawan',
    ];
}
