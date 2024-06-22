<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class forumController extends Controller
{
    public function displayDaftarForum($id){
        // $daftarForum = Forum::with('donaturRelawan')->get();
        $daftarForum = Forum::with('donaturRelawan')->paginate(5);
        $bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];
        foreach ($daftarForum as $forum) {
            $partitionTanggalBuatForum = explode('-', $forum->TanggalBuatForum);
            $forum->setAttribute('FormatTanggalBuatForum', $partitionTanggalBuatForum[2] . ' ' . $bulan[$partitionTanggalBuatForum[1]] . ' ' . $partitionTanggalBuatForum[0]);
        }
        return view('Forum.daftarForum', ['daftarForum' => $daftarForum, 'id' => $id]);
    }

    public function buatForum(Request $request, $id){
        $request->validate([
            'JudulForum' => 'required|string|max:255',
            'DeskripsiForum' => 'required|string|max:255'
        ]);

        Forum::create([
            'IDDonaturRelawanPembuatForum' => $id,
            'JudulForum' => $request->JudulForum,
            'DeskripsiForum' => $request->DeskripsiForum,
            'TanggalBuatForum' => now()
        ]);

        return redirect()->route('displayDaftarForum', compact('id'))->with('success', 'Forum post created successfully');
    }

    public function displayDetailForum($idDonaturRelawan, $idForum){
        $forum = Forum::with(['donaturRelawan', 'pantiSosial', 'komentarForum.donaturRelawan', 'komentarForum.pantiSosial'])->findOrFail($idForum);

        $bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];

        $partitionTanggalBuatForum = explode('-', $forum->TanggalBuatForum);
        $forum->setAttribute('FormatTanggalBuatForum', $partitionTanggalBuatForum[2] . ' ' . $bulan[$partitionTanggalBuatForum[1]] . ' ' . $partitionTanggalBuatForum[0]);

        foreach ($forum->komentarForum as $komentar) {
            $partitionTanggalKomentarForum = explode('-', $komentar->TanggalKomentarForum);
            $komentar->setAttribute('FormatTanggalKomentarForum', $partitionTanggalKomentarForum[2] . ' ' . $bulan[$partitionTanggalKomentarForum[1]] . ' ' . $partitionTanggalKomentarForum[0]);
        }

        return view('Forum.detailForum',['id' => $idDonaturRelawan, 'forum' => $forum, 'idForum' => $idForum]);
    }

}
