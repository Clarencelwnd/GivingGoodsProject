<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class generalPageController extends Controller
{
    // NOT USED
    // public function displayTemplatePage(){
    //     return view('templatePage');
    // }

    public function displayGeneralPage(){
        return view('generalPage');
    }

    public function displayDummyProfilePage(){
        return view('dummyProfilePage');
    }

}
