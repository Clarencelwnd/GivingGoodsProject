<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class generalPageController extends Controller
{
    public function displayTemplatePage(){
        return view('templatePage');
    }

    public function displayGeneralPage(){
        return view('generalPage');
    }

}
