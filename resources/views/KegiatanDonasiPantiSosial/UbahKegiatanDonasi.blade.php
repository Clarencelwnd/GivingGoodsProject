@extends('GeneralPagePantiSosial.templatePage')

@section('title', 'Ubah Kegiatan Donasi')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{ asset('css/GeneralPagePantiSosial/generalPage.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="{{ asset('css/KegiatanDonasiPantiSosial/UbahKegiatanDonasi.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endsection

@section('content')
<div class="main-content">
        <div class="header">
            <div class="title">
                <a href="{{ route('kegiatan-donasi.show', ['id' => $kegiatanDonasi->IDKegiatanDonasi]) }}">
                    <img src="{{ asset('image/general/back.png') }}" alt="Back" class="back-btn" height="30px">
                </a>
                <h1 id="judul-kegiatan-donasi">{{ $kegiatanDonasi->NamaKegiatanDonasi }}</h1>
            </div>
        </div>

        <form id="ubahKegiatanForm" method="POST" action="{{ route('ubah-kegiatan-donasi.update', ['id' => $kegiatanDonasi->IDKegiatanDonasi]) }}">
            @csrf
            @method('PUT')
            <div class="details">
                <!-- Bagian Detail Info yang bisa diubah -->
                <div class="detail-row">
                    <div class="detail-label">Nama Kegiatan</div>
                    <div class="detail-info" contenteditable="true" oninput="updateHiddenInput('namaKegiatanInput', this.innerText)">{{ $kegiatanDonasi->NamaKegiatanDonasi }}</div>
                    <input type="hidden" name="namaKegiatan" id="namaKegiatanInput" value="{{ $kegiatanDonasi->NamaKegiatanDonasi }}" class="custom-input">
                </div>

                <div class="detail-row">
                    <div class="detail-label">Deskripsi Kegiatan</div>
                    <div class="detail-info" contenteditable="true" oninput="updateHiddenInput('deskripsiKegiatanInput', this.innerText)">{{ $kegiatanDonasi->DeskripsiKegiatanDonasi }}</div>
                    <input type="hidden" name="deskripsiKegiatan" id="deskripsiKegiatanInput" value="{{ $kegiatanDonasi->DeskripsiKegiatanDonasi }}" class="custom-input">
                </div>

                <div class="detail-row">
                    <div class="detail-label">Tanggal Kegiatan Berlangsung</div>
                    <div class="detail-dates">
                        <div class="detail-info-tanggal" id="tglMulai" contenteditable="true" style="background-color: #f0f0f0;" oninput="updateHiddenInput('tglMulaiInput', this.innerText)">{{ $kegiatanDonasi->TanggalKegiatanDonasiMulai }} </div>
                        <img src="{{ asset('image/general/line.png') }}" alt="Back" width="10px">
                        <div class="detail-info-tanggal" id="tglSelesai" contenteditable="true" style="background-color: #f0f0f0;" oninput="updateHiddenInput('tglSelesaiInput', this.innerText)">{{ $kegiatanDonasi->TanggalKegiatanDonasiSelesai }}</div>
                        <input type="hidden" name="tglMulai" id="tglMulaiInput" value="{{ $kegiatanDonasi->TanggalKegiatanDonasiMulai }}">
                        <input type="hidden" name="tglSelesai" id="tglSelesaiInput" value="{{ $kegiatanDonasi->TanggalKegiatanDonasiSelesai }}">
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Jenis Donasi
                        <img src="{{ asset('image/general/information.png') }}" alt="Info" class="donation-icon" height="12px" onclick="showDonationPopup()">
                    </div>
                    <div class="detail-info" contenteditable="true" oninput="updateHiddenInput('jenisDonasiInput', this.innerText)">{{ $kegiatanDonasi->JenisDonasiDibutuhkan }}</div>
                    <input type="hidden" name="jenisDonasi" style="background-color:#f0f0f0" #f0f0f0; id="jenisDonasiInput" value="{{ $kegiatanDonasi->JenisDonasiDibutuhkan }}">
                </div>

                <div class="detail-row">
                    <div class="detail-label">Deskripsi Jenis Donasi</div>
                    <div class="detail-info" contenteditable="true" oninput="updateHiddenInput('deskripsiJenisDonasiInput', this.innerText)">{{ $kegiatanDonasi->DeskripsiJenisDonasi }}</div>
                    <input type="hidden" name="deskripsiJenisDonasi" style="background-color:#f0f0f0" id="deskripsiJenisDonasiInput" value="{{ $kegiatanDonasi->DeskripsiJenisDonasi }}">
                </div>

                <div class="detail-row">
                    <div class="detail-label">Lokasi Pelaksanaan Kegiatan</div>
                    <div class="detail-info" style="background-color: #f0f0f0; color: #444444;" readonly>
                        {{ $kegiatanDonasi->LokasiKegiatanDonasi  }}
                    </div>
                    <input type="hidden" name="lokasiKegiatan" id="lokasiKegiatanInput" value="{{ $kegiatanDonasi->LokasiKegiatanDonasi  }}">
                </div>

                <div class="detail-row">
                    <div class="detail-label">Lokasi pada Google Maps
                        {{-- <img src="{{ asset('image/general/information.png') }}" alt="Info" class="donation-icon" height="12px" onclick="showInfoMessage(this)"> --}}
                    </div>
                    <div class="detail-info" style="background-color: #f0f0f0; color: #444444;" readonly>
                        {{ $kegiatanDonasi->LinkGoogleMapsLokasiKegiatanDonasi }}
                    </div>
                    <input type="hidden" name="linkGoogleMaps" id="linkGoogleMapsInput" value="{{ $kegiatanDonasi->LinkGoogleMapsLokasiKegiatanDonasi }}">
                </div>

                <div class="button-container">
                    <a href="{{ route('kegiatan-relawan.show', ['id' => $kegiatanDonasi->IDKegiatanDonasi]) }}" class="cancel-btn">
                        Batal
                    </a>
                    <button class="save-btn" type="button" onclick="tampilkanPopup()">Simpan Perubahan</button>
                </div>
            </div>

        <div class="donor-history">
            <h2>Riwayat Donatur</h2>
            <button class="view-history-btn-disabled" type="button" disabled>Lihat Riwayat Donatur</button>
        </div>
    </div>

        <!-- Pop-up konfirmasi -->
        <div id="popup-container" style="display: none;">
            <div id="popup">
                <h3 style="color: #152F44; font-size: 24px; font-weight: 700;">Konfirmasi Penyimpanan Perubahan</h3>
                <p style="margin-top: 10px; font-size: 20px; font-weight: 300; color: #152F44;">Apakah Anda yakin ingin menyimpan perubahan yang telah Anda buat? <br> Perrubahan yang disimpan akan menggantikan versi sebelumnya.</p>
                <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                    <button class="btn-secondary" style="background-color: #FFFFFF; color: #007C92; font-weight: 600; font-size: 16px; margin-right: 10px;" onclick="tutupPopup(); return false;">Batal</button>
                    <button type="submit" class="btn-primary" style="background-color: #00AF71; color: #FFFFFF; font-weight: 600; font-size: 16px; margin-left: 10px;">Ya, Simpan</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Inisialisasi Flatpickr setelah memuat perpustakaan -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#tglMulai", {
                dateFormat: "Y-m-d",
                onChange: function(selectedDates, dateStr, instance) {
                    document.getElementById('tglMulai').textContent = dateStr;
                }
            });

            flatpickr("#tglSelesai", {
                dateFormat: "Y-m-d",
                onChange: function(selectedDates, dateStr, instance) {
                    document.getElementById('tglSelesai').textContent = dateStr;
                }
            });
        });

    function updateHiddenInput(inputId, text) {
        document.getElementById(inputId).value = text;
    }

    function tampilkanPopup() {
        // Tampilkan pop-up konfirmasi
        document.getElementById('popup-container').style.display = 'block';
    }

    function tutupPopup() {
        // Sembunyikan pop-up konfirmasi
        document.getElementById('popup-container').style.display = 'none';
    }
    </script>
@endsection
