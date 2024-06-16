<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 'forum';
    protected $primaryKey = 'IDForum';
    protected $fillable = [
        'IDDonaturRelawanPembuatForum', 'IDPantiSosialPembuatForum', 'JudulForum', 'DeskripsiForum', 'TanggalBuatForum',
    ];

    public function donaturRelawan(){
        return $this->belongsTo(DonaturAtauRelawan::class, 'IDDonaturRelawanPembuatForum', 'IDDonaturRelawan');
    }

    public function pantiSosial(){
        return $this->belongsTo(PantiSosial::class, 'IDPantiSosialPembuatForum', 'IDPantiSosial');
    }

    public function komentarForum(){
        return $this->hasMany(KomentarForum::class, 'IDForum', 'IDForum');
    }
}

