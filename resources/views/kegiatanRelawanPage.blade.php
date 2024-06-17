@extends('templatePage')

@section('title', 'Home Panti Sosial')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{ asset('css/generalPage.css') }}">
    <script src="{{ asset('js/generalPage.js') }}"></script>
@endsection

@section('content')
{{-- INFORMATION BUTTON --}}
<div class="container information-button">
    <div class="overlay" id="overlay"></div>
    <div class="row justify-content-center">
        <div class="alert alert-light text-center" role="alert" onclick="window.location.href='{{ route('profile.panti_sosial', ['id'=>$id]) }}'">
            <img id="information-icon" src="{{ asset('Image/general/information.png') }}" alt="information">
            <p>Lengkapi profil panti sosial untuk memberikan informasi yang lebih baik kepada calon donatur/relawan.</p>
        </div>
    </div>
</div>

{{-- SEARCH BAR --}}
<form action="{{ route('search', ['id' => $id]) }}" method="GET">
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
        <div class="nav-items">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('viewAllKegiatan', ['id' => $id]) }}">All</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="{{ route('viewAllKegiatanRelawan', ['id' => $id]) }}">Kegiatan Relawan</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('viewAllKegiatanDonasi', ['id' => $id]) }}">Kegiatan Donasi</a>
                </li>
        </div>

        <div class="dropdown-buatKegiatan">
            <button class="btn btn-primary" type="button" id="buatKegiatanDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Buat Kegiatan
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="buatKegiatanDropdown">
                <li><a class="dropdown-item" href="{{ route('buat_kegiatan_relawan.show', ['id' => $id]) }}">Buat Kegiatan Relawan</a></li>
                <li><a class="dropdown-item" href="{{ route('buat_kegiatan_donasi.show', ['id' => $id]) }}">Buat Kegiatan Donasi</a></li>

            </ul>
        </div>
    </ul>
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
            <li><a class="dropdown-item filter-option" data-status="Semua">Semua</a></li>
            <li><a class="dropdown-item filter-option" data-status="Akan Datang">Akan Datang</a></li>
            <li><a class="dropdown-item filter-option" data-status="Sedang Berlangsung">Sedang Berlangsung</a></li>
            <li><a class="dropdown-item filter-option" data-status="Selesai">Selesai</a></li>
        </ul>
    </div>
</div>

{{-- CARDS --}}
    @foreach ($kegiatanRelawan as $activity)
        @php
            $status = '';
            $startDate = \Carbon\Carbon::parse($activity->TanggalKegiatanRelawanMulai);
            $endDate = \Carbon\Carbon::parse($activity->TanggalKegiatanRelawanSelesai);
            $today = \Carbon\Carbon::today();

            if ($today->lessThan($startDate)) {
                $status = 'Akan Datang';
            } else if ($today->between($startDate, $endDate)) {
                $status = 'Sedang Berlangsung';
            } else {
                $status = 'Selesai';
            }

            $badgeClass = '';
            if ($status == 'Akan Datang') {
                $badgeClass = 'badge-akan-datang';
            } else if ($status == 'Sedang Berlangsung') {
                $badgeClass = 'badge-sedang-berlangsung';
            } else {
                $badgeClass = 'badge-selesai';
            }
        @endphp

        <div class="card w-80" data-status="{{ $status }}" data-type="Relawan">
            <div class="card-body">

                <div>
                    <p class="konfirmasi-alert">Mohon Konfirmasi 2 Calon Relawan yang Sudah Mendaftar</p>

                    <div class="card-top-info">
                        <div class="badge-container">
                            <span id="badge" class="badge {{ $badgeClass }} rounded-pill">{{ $status }}</span>
                        </div>

                        <h6 class="card-title" id="pendaftaranTutup">Pendaftaran ditutup: {{ \Carbon\Carbon::parse($activity->TanggalPendaftaranKegiatanDitutup)->format('d M Y') }}</h6>
                    </div>
                </div>

                <h5 class="card-title">{{ $activity->NamaKegiatanRelawan }}</h5>

                <div class="card-info">
                    <div class="card-details">
                        <p class="card-text">Tanggal kegiatan: {{ \Carbon\Carbon::parse($activity->TanggalKegiatanRelawanMulai)->format('d M Y') }} - {{ \Carbon\Carbon::parse($activity->TanggalKegiatanRelawanSelesai)->format('d M Y') }}</p>
                        <p class="card-text">Lokasi kegiatan: {{ $activity->LokasiKegiatanRelawan }}</p>
                        <p class="card-text">Jenis Relawan: {{ $activity->JenisKegiatanRelawan }}</p>
                        <p class="card-text">Tanggal kegiatan dibuat: {{ \Carbon\Carbon::parse($activity->created_at)->format('d M Y H:i:s') }}</p>
                    </div>

                    <div class="jumlahDonaturRelawan">
                        <p class="card-text">Relawan: {{ $activity->registrasi_relawan_count . '/' . $activity->JumlahRelawanDibutuhkan }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('pagination')
    <div class="pagination-container">
        {{ $kegiatanRelawan->links('components.pagination') }}
    </div>
@endsection


