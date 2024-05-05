<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailJenisBarangDibutuhkan extends Model
{
    protected $table = 'detail_jenis_barang_dibutuhkan';
    protected $fillable = [
        'IDKegiatanDonasi', 'IDJenisDonasi',
    ];
}
