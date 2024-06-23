@extends('GeneralPagePantiSosial.templatePage')

@section('title', 'Detail Forum')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{ asset('css/ForumPantiSosial/detailForumPage.css') }}">
    <script src="{{ asset('js/forumPage.js') }}"></script>
@endsection

@section('content')
    <div class="btn-forumBack">
        <a href="{{ route('displayDaftarForum', ['id' => $id]) }}" class="back-link">
            <img src="{{ asset('Image/general/back.png') }}" alt="back button" class="back-img">
            <p id="back-text">Kembali ke Daftar Forum</p>
        </a>
    </div>

    {{-- DISKUSI UTAMA --}}
    <div class="card">
        <div class="card-body">
            <div class="card-top">
                <h5 class="card-title" id="judulForum">{{ $forum->JudulForum }}</h5>
                <h6 class="tanggalBuatForum">{{ $forum->FormatTanggalBuatForum }}</h6>
            </div>
                <h6 class="card-info namaPembuatForum">Diposting oleh: {{ $forum->donaturRelawan->NamaDonaturRelawan ?? $forum->pantiSosial->NamaPantiSosial}}</h6>
                <p class="card-text">{{ $forum->DeskripsiForum }}</p>
        </div>
    </div>

    {{-- Reply text area --}}
    <div class="replyTextArea">
        <form action="{{ route('simpanKomentar', ['idPantiSosial' => $id]) }}" method="POST">
            @csrf
            <input type="hidden" name="IDForum" value="{{ $forum->IDForum }}">
            <textarea class="w-100 form-control" name="KomentarForum" rows="4" placeholder="Bagikan pendapatmu..." required></textarea>
            <button type="submit" class="btn">
                <img src="{{ asset('Image/general/send.png') }}" alt="Kirim">
            </button>
        </form>
    </div>

    {{-- REPLIES --}}
    <div class="mt-4">
        <h5 id="balasanTitle">Semua Balasan</h5>
        @foreach ($forum->komentarForum as $komentar)
            <div class="card">
                <div class="card-body">
                    <div class="card-top">
                        @if ($komentar->donaturRelawan)
                            <h6 class="card-info namaPembuatKomentar">{{ $komentar->donaturRelawan->NamaDonaturRelawan }}</h6>
                        @elseif ($komentar->pantiSosial)
                            <h6 class="card-info namaPembuatKomentar">{{ $komentar->pantiSosial->NamaPantiSosial }}</h6>
                        @endif
                        <h6 class="tanggalBuatForum">{{ $komentar->FormatTanggalKomentarForum }}</h6>
                    </div>
                    <p class="card-text">{{ $komentar->KomentarForum }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection