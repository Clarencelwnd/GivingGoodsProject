@extends('generalPageDonaturRelawan/templateDonaturRelawan')

@section('title', 'Daftar Kegiatan')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{ asset('css/daftarKegiatan.css') }}">
    <script src="{{ asset('js/daftarKegiatan.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection

@section('content')
    {{-- SEARCH BAR --}}
    <form action="#" method="GET">
        <div class="col-md-11 searchbar">
            <div class="d-flex form-inputs">
                <input name="search" class="form-control" id="placeholder-text" type="text" placeholder="Cari nama panti sosial, jenis kegiatan relawan, atau jenis barang yang disumbangkan..">
                <i class="bx bx-search"></i>
            </div>
        </div>
    </form>

    <div class="daftarKegiatanContents container">
        <h4 id="daftar-kegiatan-title">Daftar Kegiatan</h4>

        {{-- CARDS --}}
        <div class="row">
            @foreach ($activities as $activity)
            <div class="col-md-3 mb-5">
                <div class="card card-kegiatanDonasi">
                    @if (isset($activity->NamaKegiatanRelawan))
                        <img src= "{{ asset('Image/kegiatanRelawan/'.$activity->GambarKegiatanRelawan) }}" class="card-img-top" style="height: 14rem" alt="...">
                    @elseif (isset($activity->NamaKegiatanDonasi))
                        <img src="{{ asset('Image/kegiatanDonasi/'.$activity->GambarKegiatanDonasi) }}" class="card-img-top" style="height: 14rem" alt="...">
                    @endif

                    <div class="card-body card-kegiatan">
                        <h5 class="card-title" id="card-namaKegiatan">{{ $activity->NamaKegiatanRelawan ?? $activity->NamaKegiatanDonasi }}</h5>
                        <p class="card-text" id="card-jenisDonasi">
                            @if (isset($activity->NamaKegiatanRelawan))
                                <p class="card-text">Jenis relawan: {{ $activity->JenisKegiatanRelawan }}</p>
                            @elseif (isset($activity->NamaKegiatanDonasi))
                                @php
                                    $donasiTypes = explode('; ', $activity->JenisDonasiDibutuhkan);
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
                            <p class="card-text" id="card-namaPanti">Nama panti sosial</p>
                            <p class="card-text" id="card-jenisDonasi">Jarak</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- PAGINATION --}}
    <div class="pagination-container">
        {{ $activities->links() }}
    </div>
@endsection
