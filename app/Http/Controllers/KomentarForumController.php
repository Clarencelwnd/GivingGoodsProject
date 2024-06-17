<?php

namespace App\Http\Controllers;

use App\Models\KomentarForum;
use Illuminate\Http\Request;
use Carbon\Carbon;

class KomentarForumController extends Controller
{
    public function storeKomentar(Request $request, $idDonaturRelawan){
        $request->validate([
            'IDForum' => 'required|exists:forum,IDForum',
            'KomentarForum' => 'required|string|max:255'
        ]);

        // $idForum = $request->IDForum;

         // Create a new comment entry
         KomentarForum::create([
            'IDForum' => $request->IDForum,
            'IDPantiSosialPembuatForum' => $idDonaturRelawan, // Dummy pengomentar forum
            'KomentarForum' => $request->KomentarForum,
            'TanggalKomentarForum' => now(), // or another date format you prefer
        ]);

        // Redirect back to the forum details
        return redirect()->route('displayDetailForum', ['idDonaturRelawan' => $idDonaturRelawan, 'idForum' => $request->IDForum])->with('success', 'Comment added successfully.');
    }
}
