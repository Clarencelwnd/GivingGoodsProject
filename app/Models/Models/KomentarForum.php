<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarForum extends Model
{
    protected $table = 'komentar_forum';
    protected $primaryKey = 'IDKomentarForum';
    protected $fillable = [
        'IDPengomentarDonatur', 'IDPengomentarPantiSosial', 'KomentarForum', 'TanggalKomentarForum',
    ];
}
