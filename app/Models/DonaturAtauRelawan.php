<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonaturAtauRelawan extends Model
{
    protected $table = 'donatur_atau_relawan';
    protected $primaryKey = 'IDDonaturRelawan';
    protected $fillable = [
        'IDUser', 'NamaDonaturRelawan', 'TanggalLahirDonaturRelawan', 'JenisKelaminDonaturRelawan', 'NomorTeleponDonaturRelawan', 'AlamatDonaturRelawan', 'LinkGoogleMapsDonaturRelawan', 'FotoDonaturRelawan',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'IDUser', 'id');
    }

    public function forum(){
        return $this->hasMany(Forum::class, 'IDDonaturRelawanPembuatForum', 'IDDonaturRelawan');
    }

    public function komentarForum(){
        return $this->hasMany(KomentarForum::class, 'IDDonaturRelawanPengomentarForum', 'IDDonaturRelawan');
    }

    public function registrasiDonatur(){
        return $this->hasMany(RegistrasiDonatur::class, 'IDDonaturRelawan', 'IDDonaturRelawan');
    }

    public function registrasiRelawan(){
        return $this->hasMany(RegistrasiRelawan::class, 'IDDonaturRelawan', 'IDDonaturRelawan');
    }
}
