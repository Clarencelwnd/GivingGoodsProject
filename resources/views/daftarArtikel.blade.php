@extends('templateDonaturRelawan')

@section('title', 'Daftar Artikel')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{ asset('css/daftarArtikelPage.css') }}">
@endsection

@section('content')
<div class="daftarForum-top">
    <h6 id="daftarForumTitle">Daftar Forum</h6>
</div>

<a href="{{ route('displayDetailArtikel') }}" class="text-decoration-none text-dark">
    <div class="card w-60" id="forum-cards">
        <div class="card-body">
            <div class="card-top">
                <h5 class="card-title" id="judulForum">judul artikel</h5>
            </div>
                <p class="card-text">deskripsi artikel</p>
        </div>
    </div>
</a>
@endsection



