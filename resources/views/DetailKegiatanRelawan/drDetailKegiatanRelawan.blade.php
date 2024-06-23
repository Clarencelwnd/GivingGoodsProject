@extends('GeneralPageDonaturRelawan/templateDonaturRelawan')

@section('title', 'Detail Kegiatan Relawan')

@section('stylesheets')
    @parent
    <link href="{{ asset('css/DetailKegiatanRelawan/drDetailKegiatanRelawan.css') }}" rel="stylesheet">
    <script src="{{ asset('js/DetailKegiatanRelawan/drDetailKegiatanRelawan.js') }}"></script>
    <link src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></link>
@endsection

@section('content')
<div class="containerDetailKegiatan">
    <div class="title">
        <a href="javascript:history.back()"><img src="{{ asset('image/general/back.png') }}" alt="Back" class="back-btn" height="40px"></a>
        <h1 id="judul-kegiatan-relawan">{{ $kegiatanRelawan->NamaKegiatanRelawan }}</h1>
    </div>

    <div class="image-container">
        <img src="{{ asset($kegiatanRelawan->GambarKegiatanRelawan) }}" alt="Image">
    </div>

    <div class="content">
        <div class="section">
            <div class="subtitle">Pendaftaran Ditutup</div>
            <div class="text">{{ $kegiatanRelawan->TanggalPendaftaranKegiatanDitutup }}</div>
        </div>

        <div class="section">
            <div class="subtitle">Relawan Dibutuhkan</div>
            <div class="text">{{ $kegiatanRelawan->JumlahRelawanDibutuhkan }} Orang</div>
        </div>

        <div class="section">
            <div class="subtitle">Tanggal Kegiatan</div>
            <div class="text">{{ $kegiatanRelawan->FormatTanggalRelawan}}</div>
        </div>

        <div class="section">
            <div class="subtitle">Jam Kegiatan</div>
            <div class="text">{{ $kegiatanRelawan->FormatJamRelawan }} WIB</div>
        </div>

        <div class="section">
            <div class="subtitle">Lokasi Kegiatan Relawan</div>
            <div class="flex-row">
                <div class="text" style="padding-right: 12px;">{{ $kegiatanRelawan->LokasiKegiatanRelawan }}</div>
                <a href="{{ $kegiatanRelawan->LinkGoogleMapsLokasiKegiatanRelawan }}">
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
            <div class="text">{{ $kegiatanRelawan->DeskripsiKegiatanRelawan }}</div>
        </div>

        <div class="section">
            <div class="subtitle">Kriteria Relawan</div>
            <div class="text">{{ $kegiatanRelawan->KriteriaRelawan }}</div>
        </div>

        <div class="section">
            <div class="subtitle">Persyaratan dan Instruksi</div>
            <div class="text">{{ $kegiatanRelawan->SyaratDanInstruksiKegiatanRelawan }}</div>
        </div>

        <div class="section">
            <div class="subtitle">Kegiatan Relawan
                <img src="{{ asset('image/general/information.png') }}" alt="Info" class="donation-icon" height="12px" onclick="showDonationPopup()">
            </div>
            <div class="text">{{ $kegiatanRelawan->JenisKegiatanRelawan }}</div>
        </div>
        @if ($kegiatanRelawan->Disable == 'True')
            <a href="{{ route('daftarKegiatanRelawan', ['idKegiatanRelawan' => $kegiatanRelawan->IDKegiatanRelawan, 'idDonaturRelawan' => $donaturRelawan->IDDonaturRelawan]) }}" class="button disabled">Ikut Kegiatan</a>
        @else
            <a href="{{ route('daftarKegiatanRelawan', ['idKegiatanRelawan' => $kegiatanRelawan->IDKegiatanRelawan, 'idDonaturRelawan' => $donaturRelawan->IDDonaturRelawan]) }}" class="button">Ikut Kegiatan</a>
        @endif
        <div class="question-contact-container">
            <div class="question">Punya Pertanyaan?</div>
            <div class="contact">
                <img src="{{ asset('image/general/chat.png') }}" alt="Chat Icon" width="20px" height="20px">
                <div class="contact-text">Hubungi {{ $kegiatanRelawan->pantiSosial->NamaPantiSosial }}</div>
            </div>
        </div>

    </div>
</div>

<div id="relawan-popup-container" style="display: none;">
    <div id="relawan-popup">
        <div class="popup-header">
            <h3>Kegiatan Relawan</h3>
            <img src="{{ asset('image/general/close.png') }}" alt="Close" class="close-icon" onclick="hideDonationPopup()" width="15px" height="15px">
        </div>
        <div class="popup-content">
            <div class="popup-column">
                <div class="popup-row"><span>Bencana Alam</span></div>
                <div class="popup-row"><span>Pendidikan</span></div>
                <div class="popup-row"><span>Kesehatan</span></div>
                <div class="popup-row"><span>Lingkungan</span></div>
                <div class="popup-row"><span>IT dan teknologi</span></div>
            </div>
            <div class="popup-column">
                <div class="popup-row"><span>Pengembangan Masyarakat</span></div>
                <div class="popup-row"><span>Darurat dan Bencana</span></div>
                <div class="popup-row"><span>Seni dan Budaya</span></div>
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

