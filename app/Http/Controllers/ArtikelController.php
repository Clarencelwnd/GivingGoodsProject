<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function displayDaftarArtikel(){
        return view('Artikel.daftarArtikel');
    }

    public function displayDetailArtikel(){
        return view('Artikel.detailArtikel');
    }

    public function displayDetailArtikel2(){
        return view('Artikel.detailArtikel2');
    }
}
