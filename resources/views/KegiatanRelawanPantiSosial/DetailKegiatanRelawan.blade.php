<!-- resources/views/kegiatan-donasi/show.blade.php -->
@extends('GeneralPagePantiSosial.templatePage')
@section('title', 'Detail Kegiatan Relawan')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{ asset('css/GeneralPagePantiSosial/generalPage.css') }}">
    <link href="{{ asset('css/KegiatanRelawanPantiSosial/DetailKegiatanRelawan.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="main-content">
        <div class="header">
            <div class="title">
                <a href="#"><img src="{{ asset('image/general/back.png') }}" alt="Back" class="back-btn"  height="30px"></a>
                <h1 id="judul-kegiatan-relawan">{{ $kegiatanRelawan->NamaKegiatanRelawan }}</h1>
            </div>
            <div class="buttons">
                <a href="{{ route('ubah-kegiatan-relawan.show', ['id' => $kegiatanRelawan->IDKegiatanRelawan]) }}" style="text-decoration: none;">
                    <button class="edit-btn">Ubah Kegiatan</button>
                </a>
                <button class="delete-btn" onclick="showPopup()">Hapus Kegiatan</button>
            </div>
        </div>

        <div class="details">
            <div class="detail-row">
                <div class="detail-label">Nama Kegiatan</div>
                <div class="detail-info">{{ $kegiatanRelawan->NamaKegiatanRelawan }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Deskripsi Kegiatan</div>
                <div class="detail-info">{{ $kegiatanRelawan->DeskripsiKegiatanRelawan }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Jenis Relawan</div>
                <div class="detail-info">{{ $kegiatanRelawan->JenisKegiatanRelawan }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Tanggal Kegiatan Berlangsung</div>
                <div class="detail-dates">
                    <div class="detail-info-tanggal">{{ $kegiatanRelawan->TanggalKegiatanRelawanMulai }}</div>
                    <img src="{{ asset('image/general/line.png') }}" alt="Back" width="20px" style="padding-left: 15px; padding-right: 15px;">
                    <div class="detail-info-tanggal">{{ $kegiatanRelawan->TanggalKegiatanRelawanSelesai }}</div>
                </div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Pendaftaran ditutup</div>
                <div class="detail-info">{{ $kegiatanRelawan->TanggalPendaftaranKegiatanDitutup }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Jumlah Relawan yang <br> Dibutuhkan</div>
                <div class="detail-info">{{ $kegiatanRelawan->JumlahRelawanDibutuhkan }} orang</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Lokasi Pelaksanaan Kegiatan</div>
                <div class="detail-info">{{ $kegiatanRelawan->LokasiKegiatanRelawan }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Lokasi pada Google Maps</div>
                <div class="detail-info">{{ $kegiatanRelawan->LinkGoogleMapsLokasiKegiatanRelawan }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Jam Kegiatan</div>
                <div class="detail-time">
                    <div class="detail-info-tanggal">{{ $kegiatanRelawan->JamMulaiKegiatanRelawan }}</div>
                    <img src="{{ asset('image/general/line.png') }}" alt="Back" width="20px" style="padding-left: 15px; padding-right: 15px;">
                    <div class="detail-info-tanggal">{{ $kegiatanRelawan->JamSelesaiKegiatanRelawan  }}</div>
                </div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Kriteria Relawan</div>
                <div class="detail-info">{{ $kegiatanRelawan->KriteriaRelawan }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Persyaratan & Instruksi <br> untuk Mengikuti Kegiatan</div>
                <div class="detail-info">{{ $kegiatanRelawan->SyaratDanInstruksiKegiatanRelawan }}</div>
            </div>

        </div>

        <div class="donor-history">
            <h2>Riwayat Relawan</h2>
            <a href="{{ route('riwayat-relawan.index', ['id' => $kegiatanRelawan->IDKegiatanRelawan]) }}">
                <button class="view-history-btn">Lihat Riwayat Relawan</button>
                </a>
        </div>
    </div>

    <div id="popup-container" style="display: none;">
        <div id="popup">
            <h3 style="color: #152F44; font-size: 24px; font-weight: 700;">Hapus Kegiatan</h3>
            <p style="margin-top: 10px; font-size: 20px; font-weight: 300; color: #152F44;">Apakah Anda yakin ingin menghapus kegiatan ini? Tindakan ini tidak dapat dibatalkan</p>
            <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                <button class="btn-secondary" style="background-color: #FFFFFF; color: #007C92; font-weight: 600; font-size: 16px; margin-right: 10px;" onclick="hidePopup()">Batal</button>
                <form id="delete-form" action="{{ route('delete-kegiatan-relawan.destroy', 2) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                <button type="submit" class="btn-primary delete-button" style="background-color: #00AF71; color: #FFFFFF; font-weight: 600; font-size: 16px; margin-left: 10px;" >Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>

        <script>
            function showPopup() {
                document.getElementById('popup-container').style.display = 'flex';
            }

            function hidePopup() {
                document.getElementById('popup-container').style.display = 'none';
            }

        </script>
@endsection

