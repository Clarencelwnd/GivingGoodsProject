@extends('generalPageDonaturRelawan/templateDonaturRelawan')

@section('title', 'Detail Panti Sosial')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{ asset('css/daftarKegiatan.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/pagination.css') }}">
    <script src="{{ asset('js/daftarKegiatan.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection

@section('content')
    <div class="panti-sosial-detail">
        <div class="panti-sosial-header">
            <h2>{{ $pantiSosial->NamaPantiSosial }}</h2>
            <p>{{ $pantiSosial->Alamat }}</p>
        </div>

        <div class="panti-sosial-activities">
            <h4>Kegiatan Donasi</h4>
            <div class="row">
                @foreach ($kegiatanDonasi as $donasi)
                    <div class="col-md-4 mb-5 activity-card">
                        <div class="card">
                            <img src="{{ asset('Image/kegiatan/' . $donasi->GambarKegiatanDonasi) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $donasi->NamaKegiatanDonasi }}</h5>
                                <p class="card-text">{{ $donasi->DeskripsiKegiatanDonasi }}</p>
                                <p class="card-text">Jenis Donasi: {{ $donasi->JenisDonasiDibutuhkan }}</p>
                                <p class="card-text">Tanggal Mulai: {{ $donasi->TanggalKegiatanDonasiMulai }}</p>
                                <p class="card-text">Tanggal Selesai: {{ $donasi->TanggalKegiatanDonasiSelesai }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <h4>Kegiatan Relawan</h4>
            <div class="row">
                @foreach ($kegiatanRelawan as $relawan)
                    <div class="col-md-4 mb-5 activity-card">
                        <div class="card">
                            <img src="{{ asset('Image/kegiatan/' . $relawan->GambarKegiatanRelawan) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $relawan->NamaKegiatanRelawan }}</h5>
                                <p class="card-text">{{ $relawan->DeskripsiKegiatanRelawan }}</p>
                                <p class="card-text">Jenis Kegiatan: {{ $relawan->JenisKegiatanRelawan }}</p>
                                <p class="card-text">Tanggal Mulai: {{ $relawan->TanggalKegiatanRelawanMulai }}</p>
                                <p class="card-text">Tanggal Selesai: {{ $relawan->TanggalKegiatanRelawanSelesai }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('pagination')
    <div class="pagination-container">
        {{ $activities->links('components.pagination') }}
    </div>
@endsection


