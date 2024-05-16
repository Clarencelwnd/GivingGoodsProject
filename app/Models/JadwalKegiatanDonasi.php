<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKegiatanDonasi extends Model
{
    protected $table = 'jadwal_kegiatan_donasi';
    protected $fillable = [
        'IDJadwalOperasional', 'IDKegiatanDonasi',
    ];
}
