<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKegiatanDonasi extends Model
{
    protected $table = 'jadwal_kegiatan_donasi';
    protected $primaryKey = 'IDJadwalKegiatanDonasi';
    protected $fillable = [
        'IDJadwalOperasional', 'IDKegiatanDonasi',
    ];

    public function kegiatanDonasi(){
        return $this->belongsTo(KegiatanDonasi::class, 'IDKegiatanDonasi', 'IDKegiatanDonasi');
    }

    public function jadwalOperasional(){
        return $this->belongsTo(JadwalOperasional::class, 'IDJadwalOperasional', 'IDJadwalOperasional');
    }
}
