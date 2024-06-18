@extends('templatePage')

@section('title', 'Daftar Forum')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{ asset('css/daftarForumPage.css') }}">
    <script src="{{ asset('js/forumPage.js') }}"></script>
@endsection

@section('content')
<div class="daftarForum-top">
    <h6 id="daftarForumTitle">Daftar Forum</h6>
    <button class="btn" id="buatDiskusiBaru" data-bs-toggle="modal" data-bs-target="#buatDiskusiModal">
        Buat Diskusi Baru
    </button>
</div>

@foreach ($daftarForum as $forum)
<a href="{{ route('displayDetailForum', ['idDonaturRelawan' => $id, 'idForum' => $forum->IDForum]) }}" class="text-decoration-none text-dark">
    <div class="card w-60" id="forum-cards">
        <div class="card-body">
            <div class="card-top">
                <h5 class="card-title" id="judulForum">{{ $forum->JudulForum }}</h5>
                <h6 id="tanggalBuatForum">{{ \Carbon\Carbon::parse($forum->TanggalBuatForum)->format('d M Y') }}</h6>
            </div>
                <h6 class="card-info" id="namaPembuatForum">{{ $forum->donaturRelawan->NamaDonaturRelawan ?? $forum->pantiSosial->NamaPantiSosial}}</h6>
                <p class="card-text">{{ $forum->DeskripsiForum }}</p>
        </div>
    </div>
</a>
@endforeach

<!-- MODAL -->
<div class="modal fade" id="buatDiskusiModal" tabindex="-1" aria-labelledby="buatDiskusiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center border-0">
                <h5 class="modal-title w-100" id="buatDiskusiModalLabel">Buat Diskusi Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('buatForum', ['id' => $id]) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="judulForumInput" class="form-label">Judul Forum</label>
                        <input type="text" class="form-control" id="judulForumInput" name="JudulForum" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsiForum" class="form-label">Deskripsi Forum</label>
                        <textarea class="form-control" oninput="countWords()" id="deskripsiForum" name="DeskripsiForum" rows="4" required maxlength="300"></textarea>
                        <small id="wordCount">maks. 255 karakter</small>
                    </div>
                </div>
                <div class="modal-footer align-content-center justify-content-center border-0">
                    <button type="submit" class="btn btn-submitForum" id="submitForumButton">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
