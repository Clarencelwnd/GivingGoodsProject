@extends('templatePage')

@section('title', 'Daftar Forum')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{ asset('css/generalPage.css') }}">
    <script src="{{ asset('js/generalPage.js') }}"></script>
    <script src="{{ asset('js/forumPage.js') }}"></script>
@endsection


@section('content')
<h1>Daftar Forum</h1>
<button class="btn btn-primary" id="buatDiskusiBaru" data-bs-toggle="modal" data-bs-target="#buatDiskusiModal">
    Buat Diskusi Baru
</button>

@foreach ($daftarForum as $forum)
<a href="{{ route('displayDetailForum', $forum->IDForum) }}" class="text-decoration-none text-dark">
    <div class="card w-80">
        <div class="card-body">
            <div>
                <h5 class="card-title" id="namaKegiatan">{{ $forum->JudulForum }}</h5>
                <h6>{{ $forum->TanggalBuatForum }}</h6>

                <div class="card-info">
                    <h6>Nama pembuat: {{ $forum->donaturRelawan->NamaDonaturRelawan ?? $forum->pantiSosial->NamaPantiSosial }}</h6>
                </div>
            </div>
    </div>
</a>
@endforeach

 <!-- MODAL -->
 {{-- <div class="modal fade" id="buatDiskusiModal" tabindex="-1" aria-labelledby="buatDiskusiModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center">
        <div class="modal-header text-center border-0">
            <h5 class="modal-title w-100" id="buatDiskusiModalLabel">Ide atau Topik Diskusi Anda</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="{{ route('buatForum') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <input type="text" class="form-control" id="judulForum" name="JudulForum" placeholder="Ide atau Topik Diskusi Anda" required>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" id="deskripsiForum" name="DeskripsiForum" rows="4" placeholder="Bagikan pemikiran atau pernyataan disini..." required></textarea>
                </div>
            </div>
        </form>

        <div class="modal-footer align-content-center justify-content-center border-0">
            <button type="button" class="btn btn-kembali" data-bs-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-keluar">Kirim</button>
        </div>
    </div>
    </div>
</div> --}}

<!-- MODAL -->
<div class="modal fade" id="buatDiskusiModal" tabindex="-1" aria-labelledby="buatDiskusiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center">
            <div class="modal-header text-center border-0">
                <h5 class="modal-title w-100" id="buatDiskusiModalLabel">Ide atau Topik Diskusi Anda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('buatForum') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="judulForum" class="form-label">Judul Forum</label>
                        <input type="text" class="form-control" id="judulForum" name="JudulForum" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsiForum" class="form-label">Deskripsi Forum</label>
                        <textarea class="form-control" id="deskripsiForum" name="DeskripsiForum" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer align-content-center justify-content-center border-0">
                    <button type="button" class="btn btn-kembali" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-keluar">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
