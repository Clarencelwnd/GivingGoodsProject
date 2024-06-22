<<<<<<<< HEAD:resources/views/ForumDonaturRelawan/detailForum.blade.php
@extends('GeneralPageDonaturRelawan/templateDonaturRelawan')
========
@extends('GeneralPagePantiSosial.templatePage')
>>>>>>>> PantiSosial:resources/views/ForumPantiSosial/detailForum.blade.php

@section('title', 'Detail Forum')

@section('stylesheets')
    @parent
<<<<<<<< HEAD:resources/views/ForumDonaturRelawan/detailForum.blade.php
    <link rel="stylesheet" href="{{ asset('css/ForumDonaturRelawan/detailForumPage.css') }}">
    <script src="{{ asset('js/ForumDonaturRelawan/forumPage.js') }}"></script>
========
    <link rel="stylesheet" href="{{ asset('css/ForumPantiSosial/detailForumPage.css') }}">
    <script src="{{ asset('js/forumPage.js') }}"></script>
>>>>>>>> PantiSosial:resources/views/ForumPantiSosial/detailForum.blade.php
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
<<<<<<<< HEAD:resources/views/ForumDonaturRelawan/detailForum.blade.php
                {{-- <h6 class="tanggalBuatForum">{{ \Carbon\Carbon::parse($forum->TanggalBuatForum)->format('d M Y') }}</h6> --}}
========
>>>>>>>> PantiSosial:resources/views/ForumPantiSosial/detailForum.blade.php
            </div>
                <h6 class="card-info namaPembuatForum">Diposting oleh: {{ $forum->donaturRelawan->NamaDonaturRelawan ?? $forum->pantiSosial->NamaPantiSosial}}</h6>
                <p class="card-text">{{ $forum->DeskripsiForum }}</p>
        </div>
    </div>

    {{-- Reply text area --}}
    <div class="replyTextArea">
<<<<<<<< HEAD:resources/views/ForumDonaturRelawan/detailForum.blade.php
        <form action="{{ route('simpanKomentar', ['idDonaturRelawan' => $id]) }}" method="POST">
========
        <form action="{{ route('simpanKomentar', ['idPantiSosial' => $id]) }}" method="POST">
>>>>>>>> PantiSosial:resources/views/ForumPantiSosial/detailForum.blade.php
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
<<<<<<<< HEAD:resources/views/ForumDonaturRelawan/detailForum.blade.php
                            <h5 class="card-info namaPembuatKomentar">{{ $komentar->donaturRelawan->NamaDonaturRelawan }}</h5>
                        @elseif ($komentar->pantiSosial)
                            <h5 class="card-info namaPembuatKomentar">{{ $komentar->pantiSosial->NamaPantiSosial }}</h5>
========
                            <h6 class="card-info namaPembuatKomentar">{{ $komentar->donaturRelawan->NamaDonaturRelawan }}</h6>
                        @elseif ($komentar->pantiSosial)
                            <h6 class="card-info namaPembuatKomentar">{{ $komentar->pantiSosial->NamaPantiSosial }}</h6>
>>>>>>>> PantiSosial:resources/views/ForumPantiSosial/detailForum.blade.php
                        @endif
                        <h6 class="tanggalBuatForum">{{ $komentar->FormatTanggalKomentarForum }}</h6>
                    </div>
                    <p class="card-text">{{ $komentar->KomentarForum }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
