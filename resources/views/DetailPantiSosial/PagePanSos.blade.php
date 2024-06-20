@extends('generalPageDonaturRelawan/templateDonaturRelawan')

@section('title', 'Detail Panti Sosial')

@section('stylesheets')
    @parent
    <link href="{{ asset('css/DetailPantiSosial/PagePanSos.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/components/pagination.css') }}">
    <script src="{{ asset('js/DetailPantiSosial/PagePanSos.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection

@section('content')
    <div class="container">
        <div class="info-container">
            <img src="{{ $pantiSosial->LogoPantiSosial }}" class="donation-icon" alt="Logo Panti Sosial">
            <div class="info-text-container">
                <div class="title">{{ $pantiSosial->NamaPantiSosial }}</div>
                <div class="text-info">No. Registrasi: {{ $pantiSosial->NomorRegistrasiPantiSosial }}</div>
            </div>
        </div>
        <div class="text-info" style="margin-top: 15px;">
            Panti Asuhan Budi Mulia merupakan tempat yang memberikan perlindungan dan pendidikan bagi anak-anak yatim piatu dan kurang mampu. Kami berkomitmen untuk memberikan lingkungan yang aman dan mendukung perkembangan mereka.
        </div>
        <div class="details-container">
            <div class="section">
                <div class="subtitle">Email:</div>
                <div class="text-info">{{ $pantiSosial->User->email }}</div>
            </div>
            <div class="section">
                <div class="subtitle">Nomor HP:</div>
                <div class="text-info">{{ $pantiSosial->NomorTeleponPantiSosial }}</div>
            </div>
            <div class="section">
                <div class="subtitle">Website:</div>
                <div class="text-info">{{ $pantiSosial->WebsitePantiSosial }}</div>
            </div>
            <div class="section">
                <div class="subtitle">Alamat:</div>
                <div class="text-info">{{ $pantiSosial->AlamatPantiSosial }}</div>
            </div>
            <div class="section">
                <div class="subtitle">Jam Operasional:</div>
                <div class="text-info">
                    @foreach($pantiSosial->JadwalOperasional->groupBy('Hari') as $hari => $jadwals)
                        <div>
                            <span>{{ $hari }}&nbsp;:</span>
                            @foreach($jadwals as $jadwal)
                                {{ $jadwal->JamBukaPantiSosial }} - {{ $jadwal->JamTutupPantiSosial }}
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="section">
                <div class="subtitle">Media Sosial:</div>
                <div class="text-info">{{ $pantiSosial->MediaSosialPantiSosial }}</div>
            </div>
        </div>
    </div>

    <div class="daftarKegiatanContents">
        <h4 id="daftar-kegiatan-title">Daftar Kegiatan</h4>

        {{-- CARDS --}}
        <div class="row" id="activity-cards">
            @foreach ($activities as $activity)
            <div class="col-md-4 mb-5 activity-card"
                data-jenis-kegiatan="{{ isset($activity->NamaKegiatanRelawan) ? 'relawan' : 'donasi' }}"
                data-jenis-donasi="{{ isset($activity->JenisDonasiDibutuhkan) ? implode(' ', explode(',', $activity->JenisDonasiDibutuhkan)) : '' }}"
                data-jenis-relawan="{{ isset($activity->JenisKegiatanRelawan) ? implode(' ', explode(',', $activity->JenisKegiatanRelawan)) : '' }}">
                @if (isset($activity->NamaKegiatanDonasi))
                    <a href="{{ route('detailKegiatanDonasi', ['idKegiatanDonasi' => $activity->IDKegiatanDonasi, 'idDonaturRelawan' => $id]) }}" style="text-decoration: none; color: inherit;">
                @elseif (isset($activity->NamaKegiatanRelawan))
                    <a href="{{ route('detailKegiatanRelawan', ['idKegiatanRelawan' => $activity->IDKegiatanRelawan, 'idDonaturRelawan' => $id]) }}" style="text-decoration: none; color: inherit;">
                @endif
                    <div class="card">
                        @if (isset($activity->NamaKegiatanRelawan))
                            <img src="{{ $activity->GambarKegiatan }}" class="card-img-top" style="height: 14rem" alt="...">
                        @elseif (isset($activity->NamaKegiatanDonasi))
                            <img src="{{ $activity->GambarKegiatan }}" class="card-img-top" style="height: 14rem" alt="...">
                        @endif

                        <div class="card-body card-kegiatan">
                            <h5 class="card-title" id="card-namaKegiatan">{{ $activity->NamaKegiatanRelawan ?? $activity->NamaKegiatanDonasi }}</h5>
                            <p class="card-text" id="card-jenisDonasi">
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
                                    @php
                                        $donasiTypes = explode(',', $activity->JenisDonasiDibutuhkan);
                                        $donasiTypes = array_slice($donasiTypes, 0, 5);
                                    @endphp
                                    Jenis Donasi:
                                    @foreach ($donasiTypes as $type)
                                        @if(array_key_exists($type, $activity->jenisDonasiIcons))
                                            <img id="jenisDonasiIcons" src="{{ asset($activity->jenisDonasiIcons[$type]) }}" alt="{{ $type }}">
                                        @else
                                            {{ $type }}
                                        @endif
                                    @endforeach
                                @endif
                            </p>
                            <div class="d-flex justify-content-between">
                                <p class="card-text" id="card-namaPanti">{{ $activity->pantiSosial->NamaPantiSosial }}</p>
                                <p class="card-text" id="card-jenisDonasi">Jarak</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach

        </div>
    </div>

    @endsection


@section('pagination')
    <div class="pagination-container">

        {{ $activities->appends(request()->input())->links('components.pagination') }}
    </div>
@endsection
