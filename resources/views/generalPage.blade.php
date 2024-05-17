@extends('templatePage')

@section('title', 'New Page Title')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{ asset('css/generalPage.css') }}">
@endsection

@section('content')
{{-- INFORMATION BUTTON --}}
<div class="container information-button">
    <div class="overlay" id="overlay"></div>
    <div class="row justify-content-center">
        <div class="alert alert-light text-center" role="alert" onclick="window.location.href='{{ route('dummyProfile') }}'">
            <img id="information-icon" src="{{ asset('Image/general/information.png') }}" alt="information">
            <p>Lengkapi profil panti sosial untuk memberikan informasi yang lebih baik kepada calon donatur/relawan.</p>
        </div>
    </div>
</div>

{{-- SEARCH BAR --}}
    <div class="col-md-12 searchbar">
        <div class="d-flex form-inputs">
            <input class="form-control" id="placeholder-text" type="text" placeholder="Cari nama kegiatan donasi/ kegiatan relawan, jenis kegiatan relawan, atau jenis barang yang disumbangkan..">
            <i class="bx bx-search"></i>
        </div>
    </div>

{{-- OPTIONS --}}
<div class="kegiatan-nav">
    <ul class="nav justify-content-start">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">All</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Kegiatan Relawan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Kegiatan Donasi</a>
        </li>
      </ul>

      <button type="button" class="btn btn-primary">Buat Kegiatan</button>
</div>

{{-- FILTER --}}
<p>
    <a href="#" class="text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
            <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"></path>
        </svg>
        Filter
    </a>
</p>

{{-- CARDS --}}
{{-- Relawan --}}
<div class="card w-75">
    <div class="card-body">
        <div>
            <span class="badge text-bg-warning rounded-pill">Warning</span>
            <h6 class="card-title">Pendaftaran ditutup: 10 April 2024</h6>
        </div>

      <h5 class="card-title">Card title</h5>
      <p class="card-text">Tanggal kegiatan: With supporting text below as a natural lead-in to additional content.</p>
      <p class="card-text">Lokasi kegiatan: With supporting text below as a natural lead-in to additional content.</p>
      <p class="card-text">Jenis relawan: With supporting text below as a natural lead-in to additional content.</p>
      <p class="card-text">Tanggal kegiatan dibuat: With supporting text below as a natural lead-in to additional content.</p>
      <p class="card-text">Relawan: 5/10</p>
    </div>
</div>

{{-- PAGINATION --}}
<nav aria-label="...">
    <ul class="pagination">
      <li class="page-item disabled">
        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item active" aria-current="page">
        <a class="page-link" href="#">2</a>
      </li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
</nav>

<h1>general page</h1>
@endsection

