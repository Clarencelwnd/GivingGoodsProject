<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarForum extends Model
{
    protected $table = 'komentar_forum';
    protected $primaryKey = 'IDKomentarForum';
    protected $fillable = [
        'IDForum', 'IDDonaturRelawanPengomentarForum', 'IDPantiSosialPengomentarForum', 'KomentarForum', 'TanggalKomentarForum',
    ];

    public function donaturRelawan(){
        return $this->belongsTo(DonaturAtauRelawan::class, 'IDDonaturRelawanPengomentarForum', 'IDDonaturRelawan');
    }

    public function forum(){
        return $this->belongsTo(Forum::class, 'IDForum', 'IDForum');
    }

    public function pantiSosial(){
        return $this->belongsTo(PantiSosial::class, 'IDPantiSosialPengomentarForum', 'IDPantiSosial');
    }
}
