<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PantiSosial extends Model
{
    protected $table = 'panti_sosial';
    protected $primaryKey = 'IDPantiSosial';
    protected $fillable = [
        'NamaPantiSosial', 'NomorRegistrasiPantiSosial', 'DokumenValiditasPantiSosial', 'DeskripsiPantiSosial', 'NomorTeleponPantiSosial', 'WebsitePantiSosial', 'AlamatPantiSosial', 'LinkGoogleMapsPantiSosial', 'MediaSosialPantiSosial', 'LogoPantiSosial',
    ];
}
