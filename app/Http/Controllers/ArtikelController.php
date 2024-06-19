<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function displayDaftarArtikel($id){
        return view('Artikel.daftarArtikel', compact('id'));
    }

    public function displayDetailArtikel($id){
        return view('Artikel.detailArtikel', compact('id'));
    }

    public function displayDetailArtikel2($id){
        return view('Artikel.detailArtikel2', compact('id'));
    }
}
