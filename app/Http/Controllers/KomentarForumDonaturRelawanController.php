<?php

namespace App\Http\Controllers;

use App\Models\KomentarForum;
use Illuminate\Http\Request;
use Carbon\Carbon;

class KomentarForumDonaturRelawanController extends Controller
{
    public function storeKomentar(Request $request, $idDonaturRelawan){
        $request->validate([
            'IDForum' => 'required|exists:forum,IDForum',
            'KomentarForum' => 'required|string|max:255'
        ]);

         KomentarForum::create([
            'IDForum' => $request->IDForum,
            'IDDonaturRelawanPengomentarForum' => $idDonaturRelawan,
            'KomentarForum' => $request->KomentarForum,
            'TanggalKomentarForum' => now(),
        ]);

        return redirect()->route('displayDetailForum', ['idDonaturRelawan' => $idDonaturRelawan, 'idForum' => $request->IDForum])->with('success', 'Comment added successfully.');
    }
}
