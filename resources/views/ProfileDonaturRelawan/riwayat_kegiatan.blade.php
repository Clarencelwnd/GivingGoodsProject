@extends('GeneralPageDonaturRelawan.templateDonaturRelawan')

@section('title', 'Riwayat Kegiatan')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{asset('css/ProfileDonaturRelawan/riwayat_kegiatan.css')}}">
    <script src="{{asset('js/ProfileDonaturRelawan/riwayat_kegiatan.js')}}"></script>
@endsection

@section('content')
    <div class="card main container justify-content-center">
        <div class="card-header main">
            <div class="row">
                <div class="col-auto back-column">
                    <a class="back" href="{{route('profile.donatur_relawan', ['id'=>$id])}}">
                        <img class="gambar-back" src="{{asset('Image/general/back.png')}}" alt="">
                    </a>
                </div>
                <div class="col-auto">
                    <a class="back" href="{{route('profile.donatur_relawan', ['id'=>$id])}}">Kembali ke Profil</a>
                </div>
            </div>
            <h2 class="title">Riwayat Kegiatan</h2>
        </div>
        <div class="card-body main">
            <div class="row row-riwayat d-flex justify-content-start">
                <button type="button" class="col-auto btn btn-filter selected" data-filter="semua" id="btn-semua">Semua</button>
                <button type="button" class="col-auto btn btn-filter" data-filter="donasi" id="btn-donasi">Donasi</button>
                <button type="button" class="col-auto btn btn-filter" data-filter="relawan" id="btn-relawan">Relawan</button>
            </div>
            <div class="row row-riwayat d-flex justify-content-start" id="sub-filter"></div>
            @if ($registrasiDonatur->isEmpty() && $registrasiRelawan->isEmpty())
                <div class="card blank container d-flex justify-content-center align-items-center">
                    <div class="card-text blank">Belum ada riwayat registrasi kegiatan donatur maupun relawan</div>
                </div>
            @endif
            @if ($registrasiDonatur)
                @foreach($registrasiDonatur as $key => $registDonatur)
                    <div class="data-item semua donasi card kegiatan container justify-content-center" data-status-kegiatan="{{ str_replace(' ', '_', $registDonatur->StatusRegistrasiDonatur) }}" data-url="{{route('detail_riwayat_kegiatan_donasi', ['idDonaturRelawan' => $id, 'idRegistrasiDonasi' => $registDonatur->IDRegistrasiDonatur])}}">
                        <div class="card-header kegiatan">
                            <div class="row row-riwayat mt-1 mb-2">
                                <div class="col-auto label-donasi-relawan">Donasi</div>
                                <div class="col-auto tanggal-donasi-relawan">{{$registDonatur->FormatTanggalDonasi}}</div>
                            </div>
                            <h6 class="card-title">{{$registDonatur->kegiatanDonasi->NamaKegiatanDonasi}}</h6>
                        </div>
                        <div class="card-body kegiatan">
                            <div class="nama-panti">{{$registDonatur->kegiatanDonasi->pantiSosial->NamaPantiSosial}}</div>
                            <div class="jenis-donasi-relawan">Jenis Donasi:
                                @foreach ($registDonatur->donasiDanGambar as $donasi)
                                    <img class="gambar-donasi" src="{{asset($donasi['image'])}}" alt="">
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            @if ($registrasiRelawan)
                @foreach($registrasiRelawan as $registRelawan)
                    <div class="data-item semua relawan card kegiatan container justify-content-center" data-status-kegiatan="{{ str_replace(' ', '_', $registRelawan->StatusRegistrasiRelawan) }}" data-url="{{route('detail_riwayat_kegiatan_relawan', ['idDonaturRelawan'=>$id, 'idRegistrasiRelawan'=> $registRelawan->IDRegistrasiRelawan])}}">
                        <div class="card-header kegiatan">
                            <div class="row row-riwayat mt-1 mb-2">
                                <div class="col-auto label-donasi-relawan">Relawan</div>
                                <div class="col-auto tanggal-donasi-relawan">{{$registRelawan->FormatTanggalRelawan}}</div>
                            </div>
                            <h6 class="card-title">{{$registRelawan->kegiatanRelawan->NamaKegiatanRelawan}}</h6>
                        </div>
                        <div class="card-body kegiatan">
                            <div class="nama-panti">{{$registRelawan->kegiatanRelawan->pantiSosial->NamaPantiSosial}}</div>
                            <div class="jenis-donasi-relawan">Jenis Relawan: {{$registRelawan->kegiatanRelawan->JenisKegiatanRelawan}}</div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection

