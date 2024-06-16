<?php

namespace App\Http\Controllers;

use App\Models\KomentarForum;
use Illuminate\Http\Request;
use Carbon\Carbon;

class KomentarForumController extends Controller
{
    public function storeKomentar(Request $request){
        $request->validate([
            'IDForum' => 'required|exists:forum,IDForum',
            'KomentarForum' => 'required|string|max:255'
        ]);

         // Create a new comment entry
         KomentarForum::create([
            'IDForum' => $request->IDForum,
            'IDDonaturRelawanPengomentarForum' => 1, // Dummy pengomentar forum
            'KomentarForum' => $request->KomentarForum,
            'TanggalKomentarForum' => now(), // or another date format you prefer
        ]);

        // Redirect back to the forum details
        return redirect()->route('displayDetailForum', $request->IDForum)->with('success', 'Comment added successfully.');
    }
}