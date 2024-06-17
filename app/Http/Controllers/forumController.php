<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class forumController extends Controller
{
    public function displayDaftarForum($id){
        $daftarForum = Forum::with('donaturRelawan')->get();
        return view('daftarForum', ['daftarForum' => $daftarForum, 'id' => $id]);
    }

    public function buatForum(Request $request, $id){
        $request->validate([
            'JudulForum' => 'required|string|max:255',
            'DeskripsiForum' => 'required|string|max:255'
        ]);

        Forum::create([
            'IDPantiSosialPembuatForum' => $id,
            'JudulForum' => $request->JudulForum,
            'DeskripsiForum' => $request->DeskripsiForum,
            'TanggalBuatForum' => now()
        ]);

        return redirect()->route('displayDaftarForum', compact('id'))->with('success', 'Forum post created successfully');
    }

    public function displayDetailForum($idDonaturRelawan, $idForum){
        $forum = Forum::with(['donaturRelawan', 'pantiSosial', 'komentarForum.donaturRelawan', 'komentarForum.pantiSosial'])->findOrFail($idForum);
        return view('detailForum',['id' => $idDonaturRelawan, 'forum' => $forum, 'idForum' => $idForum]);
    }

}
