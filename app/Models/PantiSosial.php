<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PantiSosial extends Model
{
    protected $table = 'panti_sosial';
    protected $primaryKey = 'IDPantiSosial';
    protected $fillable = [
        'IDUser', 'NamaPantiSosial', 'NomorRegistrasiPantiSosial', 'DokumenValiditasPantiSosial', 'DeskripsiPantiSosial', 'NomorTeleponPantiSosial', 'WebsitePantiSosial', 'AlamatPantiSosial', 'LinkGoogleMapsPantiSosial', 'MediaSosialPantiSosial', 'LogoPantiSosial',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'IDUser', 'id');
    }

    public function forum(){
        return $this->hasMany(Forum::class, 'IDPantiSosialPembuatForum', 'IDPantiSosial');
    }

    public function komentarForum(){
        return $this->hasMany(KomentarForum::class, 'IDPantiSosialPengomentarForum', 'IDPantiSosial');
    }

    public function kegiatanDonasi(){
        return $this->hasMany(KegiatanDonasi::class, 'IDPantiSosial', 'IDPantiSosial');
    }

    public function kegiatanRelawan(){
        return $this->hasMany(KegiatanRelawan::class, 'IDPantiSosial', 'IDPantiSosial');
    }

    public function jadwalOperasional(){
        return $this->hasMany(JadwalOperasional::class, 'IDPantiSosial', 'IDPantiSosial');
    }
}
