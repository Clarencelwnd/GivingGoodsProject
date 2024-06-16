<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class forumController extends Controller
{
    public function displayDaftarForum(){
        $daftarForum = Forum::with('donaturRelawan')->get();
        return view('daftarForum', ['daftarForum' => $daftarForum]);
    }

    public function buatForum(Request $request){
        $request->validate([
            'JudulForum' => 'required|string|max:255',
            'DeskripsiForum' => 'required|string|max:255'
        ]);

        Forum::create([
            'IDDonaturRelawanPembuatForum' => '1',
            'JudulForum' => $request->JudulForum,
            'DeskripsiForum' => $request->DeskripsiForum,
            'TanggalBuatForum' => now()
        ]);

        return redirect()->route('displayDaftarForum')->with('success', 'Forum post created successfully');
    }

    public function displayDetailForum($id){
        $forum = Forum::with(['donaturRelawan', 'pantiSosial', 'komentarForum.donaturRelawan', 'komentarForum.pantiSosial'])->findOrFail($id);
        return view('detailForum',['forum' => $forum]);
    }

}
