@extends('templateDonaturRelawan')

@section('title', 'Artikel')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{ asset('css/daftarArtikelPage.css') }}">
@endsection

@section('content')
<div class="btn-forumBack mb-3">
    <a href="{{ route('displayDaftarArtikel') }}" class="back-link">
        <img src="{{ asset('Image/general/back.png') }}" alt="back button" class="back-img">
        <p id="back-text">Judul Artikel</p>
    </a>
</div>

@endsection



