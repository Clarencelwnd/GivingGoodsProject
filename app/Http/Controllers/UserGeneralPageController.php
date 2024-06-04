<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserGeneralPageController extends Controller
{
    public function displayUserGeneralPage(){
        return view('userGeneralPage');
    }
}
