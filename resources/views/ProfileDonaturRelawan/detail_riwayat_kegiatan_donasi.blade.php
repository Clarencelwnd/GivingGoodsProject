@extends('GeneralPageDonaturRelawan.templateDonaturRelawan')

@section('title', 'Detail Riwayat Kegiatan Donasi')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{asset('css/ProfileDonaturRelawan/detail_riwayat_kegiatan_donasi.css')}}">
    <link src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></link>
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
            <div class="caption">
                Jenis Donasi
                <img src="{{ asset('image/general/information.png') }}" alt="Info" class="donation-icon" height="14px" onclick="showDonationPopup()">
            </div>
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

    <div id="donation-popup-container" style="display: none;">
        <div id="donation-popup">
            <div class="popup-header">
                <h3>Jenis Donasi</h3>
                <img src="{{ asset('image/general/close.png') }}" alt="Close" class="close-icon" onclick="hideDonationPopup()" style="height: 20px">
            </div>
            <div class="popup-content">
                <div class="popup-column">
                    <div class="popup-row"><img src="{{ asset('Image/donasi/pakaian.png') }}" alt="Pakaian"><span>Pakaian</span></div>
                    <div class="popup-row"><img src="{{ asset('Image/donasi/makanan.png') }}" alt="Makanan"><span>Makanan</span></div>
                    <div class="popup-row"><img src="{{ asset('Image/donasi/obat.png') }}" alt="Obat-obatan"><span>Obat-obatan</span></div>
                    <div class="popup-row"><img src="{{ asset('Image/donasi/buku.png') }}" alt="Buku-buku"><span>Buku-buku</span></div>
                    <div class="popup-row"><img src="{{ asset('Image/donasi/keperluan_ibadah.png') }}" alt="Keperluan Ibadah"><span>Keperluan Ibadah</span></div>
                </div>
                <div class="popup-column">
                    <div class="popup-row"><img src="{{ asset('Image/donasi/mainan.png') }}" alt="Mainan"><span>Mainan</span></div>
                    <div class="popup-row"><img src="{{ asset('Image/donasi/keperluan_mandi.png') }}" alt="Keperluan Mandi"><span>Keperluan Mandi</span></div>
                    <div class="popup-row"><img src="{{ asset('Image/donasi/keperluan_rumah.png') }}" alt="Keperluan Rumah"><span>Keperluan Rumah</span></div>
                    <div class="popup-row"><img src="{{ asset('Image/donasi/alat_tulis.png') }}" alt="Alat Tulis"><span>Alat Tulis</span></div>
                    <div class="popup-row"><img src="{{ asset('Image/donasi/sepatu.png') }}" alt="Sepatu"><span>Sepatu</span></div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/ProfileDonaturRelawan/riwayat_kegiatan.js')}}"></script>
@endsection
