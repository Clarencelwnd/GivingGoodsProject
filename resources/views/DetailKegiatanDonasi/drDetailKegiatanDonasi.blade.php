@extends('generalPageDonaturRelawan/templateDonaturRelawan')

@section('title', 'Detail Kegiatan Donasi')

@section('stylesheets')
    @parent
    <link href="{{ asset('css/DetailKegiatanDonasi/drDetailKegiatanDonasi.css') }}" rel="stylesheet">
    <script src="{{ asset('js/DetailKegiatanDonasi/drDetailKegiatanDonasi.js') }}"></script>
@endsection


    @section('content')
<div class="container">
    <div class="title">
        <a href="#"><img src="{{ asset('image/general/back.png') }}" alt="Back" class="back-btn" height="20px"></a>
        <h1>{{ $kegiatanDonasi->NamaKegiatanDonasi }}</h1>
    </div>


    <div class="image-container">
        <img src="{{ $kegiatanDonasi->GambarKegiatanDonasi }}" alt="Image">
    </div>


    <div class="content">

        <div class="section">
            <div class="subtitle">Tanggal Kegiatan Donasi</div>
            <div class="text">{{ $kegiatanDonasi->TanggalKegiatanDonasiMulai }} - {{ $kegiatanDonasi->TanggalKegiatanDonasiSelesai}}</div>
        </div>

        <div class="section">
            <div class="subtitle">Lokasi Kegiatan Donasi</div>
            <div class="flex-row">
                <div class="text" style="padding-right: 12px;">{{ $kegiatanDonasi->LokasiKegiatanDonasi }}</div>
                <a href="{{ $kegiatanDonasi->pantiSosial->LinkGoogleMapsPantiSosial }}">
                    <img src="{{ asset('image/general/arrowlink.png') }}" alt="Arrow Link" height="13px">
                </a>
            </div>
            <div class="text" style="font-size: 20px">
                @if(isset($jarakKm))
                    <p>{{ number_format($jarakKm, 2) }} km dari tempat anda</p>
                @else
                    <p>koordinat tidak valid.</p>
                @endif
            </div>
        </div>

        <div class="section">
            <div class="subtitle">Deskripsi</div>
            <div class="text">{{ $kegiatanDonasi->DeskripsiKegiatanDonasi }}</div>
        </div>

        <div class="section">
            <div class="subtitle">Kebutuhan Jenis Donasi
            </div>
            <div class="detail-row">
                <div class="detail-label">Jenis Donasi
                    <img src="{{ asset('image/general/information.png') }}" alt="Info" class="donation-icon" height="14px" onclick="showDonationPopup()">
                </div>
                <div class="detail-info-jenis">
                    <div class="donation-options">
                    @php
                        // Memisahkan string menjadi array
                        $jenisDonasiArray = explode(',', $kegiatanDonasi->JenisDonasiDibutuhkan);
                    @endphp
                    @foreach($jenisDonasiArray as $jenisDonasi)
                        @php
                            // Menghapus spasi dan mengonversi ke huruf kecil
                            $namaFile = strtolower(str_replace(' ', '_', trim($jenisDonasi))) . '.png';
                        @endphp
                        <img src="{{ asset('image/donasi/' . $namaFile) }}" alt="{{ $jenisDonasi }}" height="20px">
                    @endforeach
                    </div>
                </div>
            </div>
            <div class="text">Jenis Donasi yang Dibutuhkan: {{ $kegiatanDonasi->DeskripsiKegiatanDonasi }}</div>
        </div>


        <a href="{{ route('daftarKegiatanDonasi', ['idKegiatanDonasi' => $kegiatanDonasi->IDKegiatanDonasi, 'idDonaturRelawan' => $donaturRelawan->IDDonaturRelawan]) }}" class="button">Ikut Kegiatan</a>

        <div class="question-contact-container">
            <div class="question">Punya Pertanyaan?</div>
            <div class="contact">
                <img src="{{ asset('image/general/chat.png') }}" alt="Chat Icon">
                <div class="contact-text">Hubungi {{ $kegiatanDonasi->pantiSosial->NamaPantiSosial }}</div>
            </div>
        </div>

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
                <div class="popup-row"><img src="{{ asset('image/donasi/pakaian.png') }}" alt="Pakaian"><span>Pakaian</span></div>
                <div class="popup-row"><img src="{{ asset('image/donasi/makanan.png') }}" alt="Makanan"><span>Makanan</span></div>
                <div class="popup-row"><img src="{{ asset('image/donasi/obat.png') }}" alt="Obat-obatan"><span>Obat-obatan</span></div>
                <div class="popup-row"><img src="{{ asset('image/donasi/buku.png') }}" alt="Buku-buku"><span>Buku-buku</span></div>
                <div class="popup-row"><img src="{{ asset('image/donasi/perlengkapan_ibadah.png') }}" alt="Keperluan Ibadah"><span>Keperluan Ibadah</span></div>
            </div>
            <div class="popup-column">
                <div class="popup-row"><img src="{{ asset('image/donasi/mainan.png') }}" alt="Mainan"><span>Mainan</span></div>
                <div class="popup-row"><img src="{{ asset('image/donasi/toiletries.png') }}" alt="Perlengkapan Mandi"><span>Perlengkapan Mandi</span></div>
                <div class="popup-row"><img src="{{ asset('image/donasi/keperluan_rumah.png') }}" alt="Keperluan Rumah"><span>Keperluan Rumah</span></div>
                <div class="popup-row"><img src="{{ asset('image/donasi/alat_tulis.png') }}" alt="Alat Tulis"><span>Alat Tulis</span></div>
                <div class="popup-row"><img src="{{ asset('image/donasi/sepatu.png') }}" alt="Sepatu"><span>Sepatu</span></div>
            </div>
        </div>
    </div>
</div>

<script>
            function showDonationPopup() {
                    document.getElementById('donation-popup-container').style.display = 'flex';
                }

                function hideDonationPopup() {
                    document.getElementById('donation-popup-container').style.display = 'none';
                }
</script>
@endsection
</html>
