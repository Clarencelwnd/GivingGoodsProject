@extends('generalPageDonaturRelawan/templateDonaturRelawan')

@section('title', 'Daftar Kegiatan')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{ asset('css/daftarKegiatan.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/pagination.css') }}">
    <script src="{{ asset('js/daftarKegiatan.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection

@section('content')
    {{-- SEARCH BAR --}}
    <form action="{{ route('daftarKegiatan.search', ['id' => $id]) }}" method="GET">
        <div class="col-md-11 searchbar">
            <div class="d-flex form-inputs">
                <input name="search" class="form-control" id="placeholder-text" type="text" placeholder="Cari nama kegiatan, nama panti sosial, jenis kegiatan relawan, atau jenis barang yang disumbangkan..">
                <i class="bx bx-search"></i>
            </div>
        </div>
    </form>

    <div class="contentContainer">
        <div>
            <form id="filter-form" action="{{ route('daftarKegiatan.search', ['id' => $id]) }}" method="GET">
                <input type="hidden" name="search" value="{{ request('search') }}">
            @include('components.filterSideBar',  ['jenisDonasiList' => $jenisDonasiList, 'jenisRelawanList' => $jenisRelawanList])
        </div>

        <div class="contentContainerSearched">
             {{-- Display Panti Sosial card if exists --}}
             <div class="pantiSosialCardResult">
                 @if (isset($pantiSosial))
                 <div class="panti-sosial-card mb-2">
                     <div class="card">
                         <div class="organization-card">
                            <img src="{{ asset('Image/general/dummy_profile_pict.png') }}" alt="panti-sosial-picture" id="pantiSosialPicture" class="rounded-circle">
                            <div class="organization-information">
                                <h5 class="card-title" id="namaPantiSosialCard">{{ $pantiSosial->NamaPantiSosial }}</h5>
                                <p class="card-text" id="alamatPantiSosialCard">{{ $pantiSosial->AlamatPantiSosial }}</p>
                            </div>
                         </div>
                     </div>
                 </div>
                 @endif
             </div>

            <div class="daftarKegiatanContents container">
                <h4 id="daftar-kegiatan-title">Daftar Kegiatan</h4>

                {{-- CARDS --}}
                <div class="row" id="activity-cards">
                    @foreach ($activities as $activity)
                    <div class="col-md-4 mb-5 activity-card"
                         data-jenis-kegiatan="{{ isset($activity->NamaKegiatanRelawan) ? 'relawan' : 'donasi' }}"
                         data-jenis-donasi="{{ isset($activity->JenisDonasiDibutuhkan) ? implode(' ', explode(',', $activity->JenisDonasiDibutuhkan)) : '' }}"
                         data-jenis-relawan="{{ isset($activity->JenisKegiatanRelawan) ? implode(' ', explode(',', $activity->JenisKegiatanRelawan)) : '' }}">
                        <div class="card">
                            @if (isset($activity->NamaKegiatanRelawan))
                                <img src= "{{ asset('Image/kegiatanRelawan/'.$activity->GambarKegiatanRelawan) }}" class="card-img-top" style="height: 14rem" alt="...">
                            @elseif (isset($activity->NamaKegiatanDonasi))
                                <img src="{{ asset('Image/kegiatanDonasi/'.$activity->GambarKegiatanDonasi) }}" class="card-img-top" style="height: 14rem" alt="...">
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
                                            @if(array_key_exists($type, $jenisDonasiIcons))
                                                <img id="jenisDonasiIcons" src="{{ asset($jenisDonasiIcons[$type]) }}" alt="{{ $type }}">
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
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagination')
    <div class="pagination-container">
        {{-- {{ $activities->links('components.pagination') }} --}}
        {{ $activities->appends(request()->input())->links('components.pagination') }}
    </div>
@endsection