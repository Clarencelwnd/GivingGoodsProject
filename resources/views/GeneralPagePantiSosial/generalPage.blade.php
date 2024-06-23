@extends('GeneralPagePantiSosial.templatePage')

@section('title', 'Home Panti Sosial')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{ asset('css/GeneralPagePantiSosial/generalPage.css')}}">
    <script src="{{ asset('js/generalPage.js') }}"></script>
@endsection

@section('content')

    @php
        $PantiSosial = \App\Models\PantiSosial::find($id);
    @endphp
    {{-- INFORMATION BUTTON --}}
    @if (!$PantiSosial->LinkGoogleMapsPantiSosial)
        <div class="container information-button">
            <div class="overlay" id="overlay"></div>
            <div class="row justify-content-center">
                <div class="alert alert-light text-center" role="alert" onclick="window.location.href='{{ route('profile.panti_sosial', ['id'=>$id]) }}'">
                    <img id="information-icon" src="{{ asset('Image/general/information.png') }}" alt="information">
                    <p>Lengkapi profil panti sosial untuk memberikan informasi yang lebih baik kepada calon donatur/relawan.</p>
                </div>
            </div>
        </div>
    @endif

    {{-- SEARCH BAR --}}
    <form action="{{ route('daftarKegiatan.search', ['id' => $id]) }}" method="GET">
        <div class="col-md-12 searchbar">
            <div class="d-flex form-inputs">
                <input type="hidden">
                <input name="search" class="form-control" id="placeholder-text" type="text" placeholder="Cari nama kegiatan donasi/ kegiatan relawan, jenis kegiatan relawan, atau jenis barang yang disumbangkan..">
                <i class="bx bx-search"></i>
            </div>
        </div>
    </form>

    {{-- OPTIONS --}}
    <div class="kegiatan-nav">
        <div class="row align-items-center" style="padding: 0;">
            <div class="col-auto nav">
                <a class="nav-link btn active" href="{{ route('viewAllKegiatan', ['id'=>$id]) }}" style="text-decoration: none;">Semua</a>
                <a class="nav-link btn" href="{{ route('viewAllKegiatanRelawan', ['id' => $id]) }}" style="text-decoration: none;">Relawan</a>
                <a class="nav-link btn" href="{{ route('viewAllKegiatanDonasi', ['id' => $id]) }}" style="text-decoration: none;">Donasi</a>
            </div>
            <div class="col-auto ms-auto">
                <button class="btn btn-primary btn-buatKegiatan" style="margin-left: 23rem" type="button" id="buatKegiatanDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Buat Kegiatan
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="buatKegiatanDropdown">
                    <li><a class="dropdown-item" href="{{ route('buat_kegiatan_relawan.show', ['id' => $id]) }}">Buat Kegiatan Relawan</a></li>
                    <li><a class="dropdown-item" href="{{ route('buat_kegiatan_donasi.show', ['id' => $id]) }}">Buat Kegiatan Donasi</a></li>
                </ul>
            </div>
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
                <h6 class="filter-title">Status Kegiatan</h6>
                <li><a class="dropdown-item filter-option" data-status="Semua">Semua</a></li>
                <li><a class="dropdown-item filter-option" data-status="Akan Datang">Akan Datang</a></li>
                <li><a class="dropdown-item filter-option" data-status="Sedang Berlangsung">Sedang Berlangsung</a></li>
                <li><a class="dropdown-item filter-option" data-status="Selesai">Selesai</a></li>
            </ul>
        </div>
    </div>

    {{-- CARDS --}}
    @foreach ($activities as $activity)
        @php
            $status = '';
            $startDate = $activity->TanggalKegiatanRelawanMulai ?? $activity->TanggalKegiatanDonasiMulai;
            $endDate = $activity->TanggalKegiatanRelawanSelesai ?? $activity->TanggalKegiatanDonasiSelesai;
            $today = today();

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

        <div class="card w-80" data-status="{{ $status }}" data-type="{{ $activity instanceof App\Models\KegiatanRelawan ? 'Relawan' : 'Donasi' }}">
                @if (isset($activity->NamaKegiatanRelawan))
                    <a href="{{ route('kegiatan-relawan.show', ['id' => $activity->IDKegiatanRelawan]) }}" style="text-decoration: none; color: inherit;">
                @endif
                @if (isset($activity->NamaKegiatanDonasi))
                    <a href="{{ route('kegiatan-donasi.show', ['id' => $activity->IDKegiatanDonasi]) }}" style="text-decoration: none; color: inherit;">
                @endif
                <div class="card-body">
                    <div>
                        @if ($activity->count > 0)
                            <p class="konfirmasi-alert">Mohon Konfirmasi {{ $activity->count }} Calon {{ $activity instanceof App\Models\KegiatanRelawan ? 'Relawan' : 'Donatur' }} yang Sudah Mendaftar</p>
                        @endif

                        <div class="card-top-info">
                            <div class="badge-container">
                                <span id="badge" class="badge {{ $badgeClass }} rounded-pill">{{ $status }}</span>
                            </div>

                            @if (isset($activity->NamaKegiatanRelawan))
                                <h6 class="card-title" id="pendaftaranTutup">Pendaftaran ditutup: {{ $activity->TanggalTutupRelawan }}</h6>
                            @endif
                        </div>
                    </div>

                    <h5 class="card-title" id="namaKegiatan">{{ $activity->NamaKegiatanRelawan ?? $activity->NamaKegiatanDonasi }}</h5>

                    <div class="card-info">
                        <div class="card-details">
                            <p class="card-text">Tanggal kegiatan: {{$activity->TanggalRelawan ?? $activity->TanggalDonasi}}</p>
                            <p class="card-text">Lokasi kegiatan: {{ $activity->LokasiKegiatanRelawan ?? $activity->LokasiKegiatanDonasi }}</p>

                            @if (isset($activity->NamaKegiatanRelawan))
                                <p class="card-text">Jenis relawan:
                                    @if ($activity->JenisKegiatanRelawan == "Bencana_Alam")
                                        Bencana Alam
                                    @elseif ($activity->JenisKegiatanRelawan == "Darurat_Bencana")
                                        Darurat Bencana
                                    @elseif ($activity->JenisKegiatanRelawan == "Seni_Budaya")
                                        Seni Budaya
                                    @else
                                        {{ $activity->JenisKegiatanRelawan }}
                                    @endif
                                </p>
                            @elseif (isset($activity->NamaKegiatanDonasi))
                                <p class="card-text jenisDonasiPart">Jenis donasi:
                                    @foreach ($activity->donasiDanGambar as $donasi)
                                        <img class="gambar-donasi" src="{{asset($donasi['image'])}}" alt="">
                                    @endforeach
                                </p>
                            @endif
                            <p class="card-text">Tanggal kegiatan dibuat: {{ $activity->TanggalDanJamBuatDonasi ?? $activity->TanggalDanJamBuatRelawan }}</p>
                        </div>

                        <div class="jumlahDonaturRelawan">
                            @if (isset($activity->NamaKegiatanRelawan))
                                <p class="card-text">Relawan: {{ $activity->registrasi_relawan_count . '/' . $activity->JumlahRelawanDibutuhkan }}</p>
                            @elseif (isset($activity->NamaKegiatanDonasi))
                                <p class="card-text">Donatur: {{ $activity->registrasi_donatur_count }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
@endsection

{{-- Pagination Links --}}
@section('pagination')
    <div class="pagination-container">
        {{ $activities->links('componentsPansos.pagination') }}
    </div>
@endsection


