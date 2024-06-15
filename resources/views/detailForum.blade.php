@extends('templatePage')

@section('title', 'Daftar Forum')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{ asset('css/generalPage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detailForumPage.css') }}">
    <script src="{{ asset('js/generalPage.js') }}"></script>
@endsection


@section('content')

    <div class="btn-forumBack mb-3">
        <a href="{{ route('displayDaftarForum') }}" class="back-link">
            <img src="{{ asset('Image/general/back.png') }}" alt="back button" class="back-img">
            <p id="back-text">Kembali ke Daftar Forum</p>
        </a>
    </div>

    {{-- DISKUSI UTAMA --}}
    <div class="card w-60">
        <div class="card-body">
            <div class="card-top">
                <h5 class="card-title" id="judulForum">{{ $forum->JudulForum }}</h5>
                <h6 class="tanggalBuatForum">{{ \Carbon\Carbon::parse($forum->TanggalBuatForum)->format('d M Y') }}</h6>
            </div>
                <h6 class="card-info namaPembuatForum">Diposting oleh: {{ $forum->donaturRelawan->NamaDonaturRelawan ?? $forum->pantiSosial->NamaPantiSosial}}</h6>
                <p class="card-text">{{ $forum->DeskripsiForum }}</p>
        </div>
    </div>

    {{-- Reply text area --}}
    <div class="mt-4 replyTextArea">
        <form action="{{ route('simpanKomentar') }}" method="POST">
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
            <div class="card w-60 mb-3">
                <div class="card-body">
                    @if ($komentar->donaturRelawan)
                        <h6 class="card-info namaPembuatForum">{{ $komentar->donaturRelawan->NamaDonaturRelawan }}</h6>
                    @elseif ($komentar->pantiSosial)
                        <h6 class="card-info namaPembuatForum">{{ $komentar->pantiSosial->NamaPantiSosial }}</h6>
                    @endif
                    <p class="card-text">{{ $komentar->KomentarForum }}</p>
                    <small class="tanggalBuatForum">{{ \Carbon\Carbon::parse($komentar->TanggalKomentarForum)->format('d M Y') }}</small>
                </div>
            </div>
        @endforeach
    </div>




@endsection
