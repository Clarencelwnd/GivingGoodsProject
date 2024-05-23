@extends('templatePage')

@section('title', 'Daftar Forum')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{ asset('css/generalPage.css') }}">
    <script src="{{ asset('js/generalPage.js') }}"></script>
@endsection


@section('content')
<h1>halam detail forum</h1>

<div class="container">
    <a href="{{ route('displayDaftarForum') }}" class="btn btn-secondary mb-3">Kembali ke Daftar Forum</a>

    <div class="card w-80">
        <div class="card-body">
            <h5 class="card-title">{{ $forum->JudulForum }}</h5>
            <h6>{{ $forum->TanggalBuatForum }}</h6>
            <div class="card-info">
                @if ($forum->donaturRelawan)
                    <h6>Nama pembuat: {{ $forum->donaturRelawan->NamaDonaturRelawan }}</h6>
                @elseif ($forum->pantiSosial)
                    <h6>Nama pembuat: {{ $forum->pantiSosial->NamaPantiSosial }}</h6>
                @endif
            </div>
            <p class="card-text">{{ $forum->DeskripsiForum }}</p>
        </div>
    </div>

    <div class="mt-4">
        <h5>Replies</h5>
        @foreach ($forum->komentarForum as $komentar)
            <div class="card w-80 mb-3">
                <div class="card-body">
                    @if ($komentar->donaturRelawan)
                        <h6>{{ $komentar->donaturRelawan->NamaDonaturRelawan }}</h6>
                    @elseif ($komentar->pantiSosial)
                        <h6>{{ $komentar->pantiSosial->NamaPantiSosial }}</h6>
                    @endif
                    <p>{{ $komentar->KomentarForum }}</p>
                    <small>{{ $komentar->TanggalKomentarForum }}</small>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        <h5>Share your thoughts</h5>
        <form action="{{ route('simpanKomentar') }}" method="POST">
            @csrf
            <input type="hidden" name="IDForum" value="{{ $forum->IDForum }}">
            <div class="mb-3">
                <textarea class="form-control" name="KomentarForum" rows="4" placeholder="Share your thoughts..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
</div>

@endsection
