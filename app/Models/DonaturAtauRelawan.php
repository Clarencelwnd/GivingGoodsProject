<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonaturAtauRelawan extends Model
{
    protected $table = 'donatur_atau_relawan';
    protected $primaryKey = 'IDDonaturRelawan';
    protected $fillable = [
        'EmailDonaturRelawan', 'PasswordDonaturRelawan', 'NamaDonaturRelawan', 'TanggalLahirDoanturRelawan', 'JenisKelaminDonaturRelawan', 'NomorTeleponDonaturRelawan', 'AlamatDonaturRelawan', 'LinkGoogleMapsDonaturRelawan', 'FotoDonaturRelawan',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'IDUser', 'id');
    }
}
