<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function displayDaftarArtikel(){
        return view('daftarArtikel');
    }

    public function displayDetailArtikel(){
        return view('detailArtikel');
    }

    public function displayDetailArtikel2(){
        return view('detailArtikel2');
    }
}
