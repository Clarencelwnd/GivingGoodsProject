<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuatKegiatanController extends Controller
{
    public function displayDummyBuatRelawanPage(){
        return view('dummyPages.dummyBuatKegiatanRelawan');
    }

    public function displayDummyBuatDonasiPage(){
        return view('dummyPages.dummyBuatKegiatanDonasi');
    }
}
