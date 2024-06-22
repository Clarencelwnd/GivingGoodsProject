@extends('GeneralPageDonaturRelawan.templateDonaturRelawan')

@section('title', 'Detail Riwayat Kegiatan Donasi')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{asset('css/ProfileDonaturRelawan/detail_riwayat_kegiatan_relawan.css')}}">
@endsection

@section('content')
    <div class="card container justify-content-center">
        <div class="card-header" style="background-color: transparent; border-bottom: none;">
            <div class="row card-title">
                <div class="col row">
                    <div class="col-auto back-column">
                        <a class="title" href="{{route('riwayat_kegiatan', ['id'=>$id])}}">
                            <img class="gambar-back" src="{{asset('Image/general/back.png')}}" alt="">
                        </a>
                    </div>
                    <div class="col-auto">
                        <a class="title" href="{{route('riwayat_kegiatan', ['id'=>$id])}}">{{$detailRegistrasiRelawan->kegiatanRelawan->NamaKegiatanRelawan}}</a>
                    </div>
                </div>
                <div class="col-auto label-status-kegiatan d-flex justify-content-end align-items-center">
                    @if ($detailRegistrasiRelawan->StatusRegistrasiRelawan === 'Menunggu Konfirmasi')
                        Menunggu Konfirmasi
                    @elseif($detailRegistrasiRelawan->StatusRegistrasiRelawan === 'Terima')
                        Relawan Diterima
                    @elseif($detailRegistrasiRelawan->StatusRegistrasiRelawan === 'Tolak')
                        Relawan Ditolak
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="caption">Nama Panti Sosial</div>
            <div class="content">{{$detailRegistrasiRelawan->kegiatanRelawan->pantiSosial->NamaPantiSosial}}</div>
            <br>
            <div class="caption">Kontak Panti Sosial</div>
            <div class="content">{{$detailRegistrasiRelawan->kegiatanRelawan->pantiSosial->NomorTeleponPantiSosial}}</div>
            <br>
            <div class="caption">Lokasi Kegiatan Relawan</div>
            <div class="content">{{$detailRegistrasiRelawan->kegiatanRelawan->pantiSosial->AlamatPantiSosial}}</div>
            <br>
            <div class="caption">Alasan Menjadi Relawan</div>
            <div class="content">{{$detailRegistrasiRelawan->AlasanRegistrasiRelawan}}</div>
            <br>
            <div class="caption">Jam & Tanggal Mengikuti Kegiatan</div>
            <div class="row">
                <div class="col-auto">
                    <img class="gambar" src="{{asset('Image/general/calendar.png')}}" alt="">
                </div>
                <div class="col-auto content">
                    {{$detailRegistrasiRelawan->FormatTanggalRelawan}}
                </div>
            </div>
            <div class="row">
                <div class="col-auto">
                    <img class="gambar" src="{{asset('Image/general/time.png')}}" alt="">
                </div>
                <div class="col-auto content">
                    {{$detailRegistrasiRelawan->FormatJamRelawan}}
                </div>
            </div>
            <br>
            <div class="caption">Jenis Kegiatan Relawan</div>
            <div class="content">
                @if ($detailRegistrasiRelawan->kegiatanRelawan->JenisKegiatanRelawan === 'Bencana_Alam')
                    Bencana Alam
                @elseif ($detailRegistrasiRelawan->kegiatanRelawan->JenisKegiatanRelawan === 'Lingkungan_Hidup')
                    Lingkungan Hidup
                @elseif ($detailRegistrasirelawan->kegiatanRelawan->JenisKegiatanRelawan === 'IT_dan_Teknologi')
                    IT dan Teknologi
                @elseif ($detailRegistrasiRelawan->kegiatanRelawan->JenisKegiatanRelawan === 'Pengembangan_Masyarakat')
                    Pengembangan Masyarakat
                @elseif ($detailRegistrasiRelawan->kegiatanRelawan->JenisKegiatanRelawan === 'Darurat_dan_Bencana')
                    Darurat dan Bencana
                @elseif ($detailRegistrasiRelawan->kegiatanRelawan->JenisKegiatanRelawan === 'Seni_dan_Budaya')
                    Seni dan Budaya
                @else
                    {{$detailRegistrasiRelawan->kegiatanRelawan->JenisKegiatanRelawan}}
                @endif
            </div>
        </div>
    </div>
@endsection
