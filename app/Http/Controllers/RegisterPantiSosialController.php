<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterPantiSosialController extends Controller
{
    // Untuk register panti sosial halaman pertama
    public function registerPantiSosial1(Request $request){
        $request->validate([
            'organization-name' => 'required | min:2 |max:255',
            'email' => 'required|email|unique:panti_sosial, EmailPantiSosial',
            'phone' => 'required |min:7 |max:13',
            'password' => 'required | min:8| max:15'
        ]);

        return back()->withInput();
    }
}
