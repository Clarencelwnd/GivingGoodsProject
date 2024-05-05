<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailJenisBarangDidonasikan extends Model
{
    protected $table = 'detail_jenis_barang_didonasikan';
    protected $fillable = [
        'IDRegistrasiDonatur', 'IDJenisDonasi',
    ];
}
