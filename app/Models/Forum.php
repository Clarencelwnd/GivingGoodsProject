<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 'forum';
    protected $primaryKey = 'IDForum';
    protected $fillable = [
        'IDDonaturRelawanPembuatForum', 'IDPantiSosialPembuatForum', 'JudulForum', 'DeskripsiForum', 'TanggalBuatForum',
    ];
}

