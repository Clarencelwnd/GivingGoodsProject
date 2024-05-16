<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PantiSosial extends Model
{
    protected $table = 'panti_sosial';
    protected $primaryKey = 'IDPantiSosial';
    protected $fillable = [
        'NamaPantiSosial', 'NomorRegistrasiPantiSosial', 'DokumenValiditasPantiSosial', 'DeskripsiPantiSosial', 'NomorTeleponPantiSosial', 'WebsitePantiSosial', 'AlamatPantiSosial', 'LinkGoogleMapsPantiSosial', 'MediaSosialPantiSosial', 'LogoPantiSosial',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'IDUser', 'id');
    }
}
