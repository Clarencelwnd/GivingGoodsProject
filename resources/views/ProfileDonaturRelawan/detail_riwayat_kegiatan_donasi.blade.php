@extends('GeneralPageDonaturRelawan.templateDonaturRelawan')

@section('title', 'Detail Riwayat Kegiatan Donasi')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{asset('css/ProfileDonaturRelawan/detail_riwayat_kegiatan_donasi.css')}}">
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
                        <a class="title" href="{{route('riwayat_kegiatan', ['id'=>$id])}}">{{$detailRegistrasiDonatur->kegiatanDonasi->NamaKegiatanDonasi}}</a>
                    </div>
                </div>
                <div class="col-auto label-status-kegiatan d-flex justify-content-end align-items-center">
                    @if ($detailRegistrasiDonatur->StatusRegistrasiDonatur === 'Menunggu Konfirmasi')
                        Sedang Diproses
                    @elseif($detailRegistrasiDonatur->StatusRegistrasiDonatur === 'Konfirmasi Diterima')
                        Donasi Diterima
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="caption">Nama Panti Sosial</div>
            <div class="content">{{$detailRegistrasiDonatur->kegiatanDonasi->pantiSosial->NamaPantiSosial}}</div>
            <br>
            <div class="caption">Kontak Panti Sosial</div>
            <div class="content">{{$detailRegistrasiDonatur->kegiatanDonasi->pantiSosial->NomorTeleponPantiSosial}}</div>
            <br>
            <div class="caption">Alamat Panti Sosial</div>
            <div class="content">{{$detailRegistrasiDonatur->kegiatanDonasi->pantiSosial->AlamatPantiSosial}}</div>
            <br>
            <div class="caption">Jam & Tanggal Donasi</div>
            <div class="row">
                <div class="col-auto">
                    <img class="gambar" src="{{asset('Image/general/calendar.png')}}" alt="">
                </div>
                <div class="col-auto content">
                    {{$detailRegistrasiDonatur->FormatTanggalDonasi}}
                </div>
            </div>
            <div class="row">
                <div class="col-auto">
                    <img class="gambar" src="{{asset('Image/general/time.png')}}" alt="">
                </div>
                <div class="col-auto content">
                    {{$detailRegistrasiDonatur->JamDonasi}}
                </div>
            </div>
            <br>
            <div class="caption">Jenis Donasi</div>
            <div class="row">
                @foreach ($detailRegistrasiDonatur->donasiDanGambar as $donasi)
                    <div class="col-auto">
                        <img class="gambar" src="{{asset($donasi['image'])}}" alt="">
                    </div>
                @endforeach
            </div>
            <br>
            <div class="caption">Deskripsi Donasi</div>
            <div class="content">{{$detailRegistrasiDonatur->DeskripsiBarangDonasi}}</div>
        </div>
    </div>
@endsection
