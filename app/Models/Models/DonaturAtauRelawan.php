<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonaturAtauRelawan extends Model
{
    protected $table = 'donatur_atau_relawan';
    protected $primaryKey = 'IDDonaturRelawan';
    protected $fillable = [
        'EmailDonaturRelawan', 'PasswordDonaturRelawan', 'NamaDonaturRelawan', 'TanggalLahirDoanturRelawan', 'JenisKelaminDonaturRelawan', 'NomorTeleponDonaturRelawan', 'AlamatDonaturRelawan', 'LinkGoogleMapsDonaturRelawan', 'FotoDonaturRelawan',
    ];
}
