<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function displayRegisterChooseRole()
    {
        return view('register-chooseRole');
    }
}
