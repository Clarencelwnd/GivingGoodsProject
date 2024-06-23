@extends('GeneralPagePantiSosial.templatePage')

@section('title', 'Ubah Kegiatan Relawan')

@section('stylesheets')
@parent
    <link rel="stylesheet" href="{{ asset('css/GeneralPagePantiSosial/generalPage.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="{{ asset('css/KegiatanRelawanPantiSosial/UbahKegiatanRelawan.css') }}" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endsection

@section('content')
<div class="main-content">
        <div class="header">
            <div class="title">
                <a href="{{ route('kegiatan-relawan.show', ['idKegiatanRelawan' => $idKegiatanRelawan, 'idPantiSosial' => $id]) }}">
                    <img src="{{ asset('image/general/back.png') }}" alt="Back" class="back-btn" height="20px">
                </a>
                <h1 id="judul-kegiatan-relawan">{{ $kegiatanRelawan->NamaKegiatanRelawan }}</h1>
            </div>

        </div>

        <form id="ubahKegiatanForm" method="POST" action="{{ route('ubah-kegiatan-relawan.update', ['idKegiatanRelawan' => $idKegiatanRelawan, 'idPantiSosial' => $id]) }}">
            @csrf
            @method('PUT')
            <div class="details">
                <div class="detail-row">
                    <div class="detail-label">Nama Kegiatan</div>
                    <div class="detail-info" contenteditable="true" oninput="updateHiddenInput('namaKegiatanInput', this.innerText)">{{ $kegiatanRelawan->NamaKegiatanRelawan }}</div>
                    <input type="hidden" name="namaKegiatan" id="namaKegiatanInput" value="{{ $kegiatanRelawan->NamaKegiatanRelawan }}">
                </div>
                <div class="detail-row">
                    <div class="detail-label">Deskripsi Kegiatan</div>
                    <div class="detail-info" contenteditable="true" oninput="updateHiddenInput('deskripsiKegiatanInput', this.innerText)">{{ $kegiatanRelawan->DeskripsiKegiatanRelawan }}</div>
                    <input type="hidden" name="deskripsiKegiatan" id="deskripsiKegiatanInput" value="{{ $kegiatanRelawan->DeskripsiKegiatanRelawan }}">
                </div>
                <div class="detail-row">
                    <div class="detail-label">Jenis Relawan</div>
                    <div class="detail-info" contenteditable="true" oninput="updateHiddenInput('jenisRelawanInput', this.innerText)">{{ $kegiatanRelawan->JenisKegiatanRelawan }}</div>
                    <input type="hidden" name="jenisRelawan" id="jenisRelawanInput" value="{{ $kegiatanRelawan->JenisKegiatanRelawan }}">
                </div>
                <div class="detail-row">
                    <div class="detail-label">Tanggal Kegiatan Berlangsung</div>
                    <div class="detail-dates">
                        <div class="detail-info-tanggal" id="tglMulai" contenteditable="true" style="background-color: #f0f0f0;" oninput="updateHiddenInput('tglMulaiInput', this.innerText)">{{ $kegiatanRelawan->TanggalKegiatanRelawanMulai }}</div>
                        <img src="{{ asset('image/general/line.png') }}" alt="Back" width="20px">
                        <div class="detail-info-tanggal" id="tglSelesai" contenteditable="true" style="background-color: #f0f0f0;" oninput="updateHiddenInput('tglSelesaiInput', this.innerText)">{{ $kegiatanRelawan->TanggalKegiatanRelawanSelesai }}</div>
                        <input type="hidden" name="tglMulai" id="tglMulaiInput" value="{{ $kegiatanRelawan->TanggalKegiatanRelawanMulai }}">
                        <input type="hidden" name="tglSelesai" id="tglSelesaiInput" value="{{ $kegiatanRelawan->TanggalKegiatanRelawanSelesai }}">
                    </div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Pendaftaran ditutup</div>
                    <div class="detail-info" contenteditable="true" oninput="updateHiddenInput('pendaftaranDitutupInput', this.innerText)">{{ $kegiatanRelawan->TanggalPendaftaranKegiatanDitutup }}</div>
                    <input type="hidden" name="tglDitutup" id="pendaftaranDitutupInput" value="{{ $kegiatanRelawan->TanggalPendaftaranKegiatanDitutup }}">
                </div>
                <div class="detail-row">
                    <div class="detail-label">Jumlah Relawan yang <br> Dibutuhkan</div>
                    <div class="detail-info" contenteditable="true" oninput="updateHiddenInput('jumlahRelawanInput', this.innerText)">{{ $kegiatanRelawan->JumlahRelawanDibutuhkan }}</div>
                    <input type="hidden" name="jumlahRelawan" id="jumlahRelawanInput" value="{{ $kegiatanRelawan->JumlahRelawanDibutuhkan }}">
                </div>
                <div class="detail-row">
                    <div class="detail-label">Lokasi Pelaksanaan Kegiatan</div>
                    <div class="detail-info" contenteditable="true" oninput="updateHiddenInput('lokasiKegiatanInput', this.innerText)">{{ $kegiatanRelawan->LokasiKegiatanRelawan }}</div>
                    <input type="hidden" name="lokasiKegiatan" id="lokasiKegiatanInput" value="{{ $kegiatanRelawan->LokasiKegiatanRelawan }}">
                </div>
                <div class="detail-row">
                    <div class="detail-label">Lokasi pada Google Maps</div>
                    <div class="detail-info" contenteditable="true" oninput="updateHiddenInput('lokasiGoogleMapsInput', this.innerText)">{{ $kegiatanRelawan->LinkGoogleMapsLokasiKegiatanRelawan }}</div>
                    <input type="hidden" name="lokasiGoogleMaps" id="lokasiGoogleMapsInput" value="{{ $kegiatanRelawan->LinkGoogleMapsLokasiKegiatanRelawan }}">
                </div>
                <div class="detail-row">
                    <div class="detail-label">Jam Kegiatan</div>
                    <div class="detail-time">
                        <div class="detail-info-tanggal" id="jamMulai" contenteditable="true" style="background-color: #f0f0f0;" oninput="updateHiddenInput('jamMulaiInput', this.innerText)">{{ $kegiatanRelawan->JamMulaiKegiatanRelawan }}</div>
                        <img src="{{ asset('image/general/line.png') }}" alt="Back" width="20px" >
                        <div class="detail-info-tanggal" id="jamSelesai" contenteditable="true"  oninput="updateHiddenInput('jamSelesaiInput', this.innerText)">{{ $kegiatanRelawan->JamSelesaiKegiatanRelawan  }}</div>
                        <input type="hidden" name="jamMulai" id="jamMulaiInput" value="{{ $kegiatanRelawan->JamMulaiKegiatanRelawan }}">
                        <input type="hidden" name="jamSelesai" id="jamSelesaiInput" value="{{ $kegiatanRelawan->JamSelesaiKegiatanRelawan }}">
                    </div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Kriteria Relawan</div>
                    <div class="detail-info" contenteditable="true" oninput="updateHiddenInput('kriteriaRelawanInput', this.innerText)">{{ $kegiatanRelawan->KriteriaRelawan }}</div>
                    <input type="hidden" name="kriteriaRelawan" id="kriteriaRelawanInput" value="{{ $kegiatanRelawan->KriteriaRelawan }}">
                </div>
                <div class="detail-row">
                    <div class="detail-label">Persyaratan & Instruksi <br> untuk Mengikuti Kegiatan</div>
                    <div class="detail-info" contenteditable="true" oninput="updateHiddenInput('persyaratanInstruksiInput', this.innerText)">{{ $kegiatanRelawan->SyaratDanInstruksiKegiatanRelawan }}</div>
                    <input type="hidden" name="persyaratanInstruksi" id="persyaratanInstruksiInput" value="{{ $kegiatanRelawan->SyaratDanInstruksiKegiatanRelawan }}">
                </div>

        </div>

        <div class="button-container">
            <a href="{{ route('kegiatan-relawan.show', ['idKegiatanRelawan' => $idKegiatanRelawan, 'idPantiSosial' => $id, ]) }}" class="cancel-btn">
                Batal
            </a>
            <button class="save-btn" type="button" onclick="tampilkanPopup()">Simpan Perubahan</button>
        </div>

        <div class="donor-history">
            <h2 id="judul-riwayat-relawan">Riwayat Relawan</h2>
            <button class="view-history-btn-disabled" type="button" disabled>Lihat Riwayat Relawan</button>
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
