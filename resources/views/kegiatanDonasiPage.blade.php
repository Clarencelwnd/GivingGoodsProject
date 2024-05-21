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
<form action="{{ route('search') }}" method="GET">
    <div class="col-md-12 searchbar">
        <div class="d-flex form-inputs">
            <input name="search" class="form-control" id="placeholder-text" type="text" placeholder="Cari nama kegiatan donasi/ kegiatan relawan, jenis kegiatan relawan, atau jenis barang yang disumbangkan..">
            <i class="bx bx-search"></i>
        </div>
    </div>
</form>

{{-- OPTIONS --}}
<div class="kegiatan-nav">
    <ul class="nav justify-content-start">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('viewAllKegiatan') }}">All</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('viewAllKegiatanRelawan') }}">Kegiatan Relawan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('viewAllKegiatanDonasi') }}">Kegiatan Donasi</a>
        </li>
    </ul>

    <div class="dropdown-buatKegiatan">
        <button class="btn btn-primary" type="button" id="buatKegiatanDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Buat Kegiatan
        </button>
        <ul class="dropdown-menu" aria-labelledby="buatKegiatanDropdown">
            <li><a class="dropdown-item" href="{{ route('dummyBuatRelawan') }}">Buat Kegiatan Relawan</a></li>
            <li><a class="dropdown-item" href="{{ route('dummyBuatDonasi') }}">Buat Kegiatan Donasi</a></li>
        </ul>
    </div>

</div>

{{-- FILTER --}}
<div class="filter-container">
    <div class="dropdown-filter">
        <button class="btn dropdown-toggle filter" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"></path>
            </svg>
            Filter
        </button>
        <ul class="dropdown-menu" aria-labelledby="filterDropdown">
            <p>Status Kegiatan</p>
            <li><a class="dropdown-item" href="#">Akan Datang</a></li>
            <li><a class="dropdown-item" href="#">Sedang Berlangsung</a></li>
            <li><a class="dropdown-item" href="#">Selesai</a></li>
        </ul>
    </div>
</div>

{{-- CARDS --}}
{{-- Kegiatan Donasi --}}
@if(isset($kegiatanDonasi) && $kegiatanDonasi->isNotEmpty())
    @foreach ($kegiatanDonasi as $activity )
    <div class="card w-80">
        <div class="card-body">

            @php
                $status =  '';

                //Determine start and end dates based on activity type
                if (isset($activity->NamaKegiatanRelawan)) {
                    $startDate = \Carbon\Carbon::parse($activity->TanggalKegiatanRelawanMulai);
                    $endDate = \Carbon\Carbon::parse($activity->TanggalKegiatanRelawanSelesai);
                } elseif (isset($activity->NamaKegiatanDonasi)) {
                    $startDate = \Carbon\Carbon::parse($activity->TanggalKegiatanDonasiMulai);
                    $endDate = \Carbon\Carbon::parse($activity->TanggalKegiatanDonasiSelesai);
                }

                $today = \Carbon\Carbon::today();

                //Determine status
                if($today->lessThan($startDate)){
                    $status = 'Akan Datang';
                }else if ($today->between($startDate, $endDate)){
                    $status = 'Sedang Berlangsung';
                }else{
                    $status = 'Selesai';
                }

                //Determine CSS based on status
                $badgeClass = '';
                if($status == 'Akan Datang'){
                    $badgeClass = 'badge-akan-datang';
                }else if($status == 'Sedang Berlangsung'){
                    $badgeClass = 'badge-sedang-berlangsung';
                }else{
                    $badgeClass = 'badge-selesai';
                }
            @endphp

            <div>
                <p>Mohon Konfirmasi 2 calon donatur yang sudah mendaftar</p>

                <span class="badge {{ $badgeClass }} rounded-pill">
                    {{ $status }}
                </span>
            </div>
            <h5 class="card-title">{{ $activity->NamaKegiatanDonasi }}</h5>
            <p class="card-text">Tanggal kegiatan: {{ $activity->TanggalKegiatanDonasiMulai }} - {{ $activity->TanggalKegiatanDonasiSelesai }}</p>
            <p class="card-text">Lokasi kegiatan: {{ $activity->LokasiKegiatanDonasi }}</p>
            <p class="card-text">Jenis donasi: {{ $activity->JenisDonasiDibutuhkan }}</p>
            <p class="card-text">Tanggal kegiatan dibuat: {{ $activity->created_at }}</p>
            <p class="card-text">Donatur: {{ $activity->registrasi_donatur_count }}</p>
        </div>
    </div>
    @endforeach
@else
    <p>No kegiatan donasi found.</p>
@endif


{{-- PAGINATION --}}
<div class="pagination-container">
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
</div>

@endsection

