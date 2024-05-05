<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarangDonasi extends Model
{
    protected $table = 'jenis_barang_donasi';
    protected $primaryKey = 'IDJenisDonasi';
    protected $fillable = [
        'JenisDonasi',
    ];
}
