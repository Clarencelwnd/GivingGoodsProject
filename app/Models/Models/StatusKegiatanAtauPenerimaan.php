<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusKegiatanAtauPenerimaan extends Model
{
    protected $table = 'status_kegiatan_atau_penerimaan';
    protected $primaryKey = 'IDStatus';
    protected $fillable = [
        'NamaStatus',
    ];
}
