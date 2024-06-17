<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalOperasional extends Model
{
    protected $table = 'jadwal_operasional';
    protected $primaryKey = 'IDJadwalOperasional';
    protected $fillable = [
        'IDPantiSosial', 'Hari', 'JamBukaPantiSosial', 'JamTutupPantiSosial',
    ];

    public function pantiSosial(){
        return $this->belongsTo(PantiSosial::class, 'IDPantiSosial', 'IDPantiSosial');
    }

    public function jadwalKegiatanDonasi(){
        return $this->hasMany(JadwalKegiatanDonasi::class, 'IDJadwalOperasional', 'IDJadwalOperasional');
    }
}
