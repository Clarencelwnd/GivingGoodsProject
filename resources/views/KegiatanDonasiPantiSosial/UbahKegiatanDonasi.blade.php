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
                    <img src="{{ asset('image/general/back.png') }}" alt="Back" class="back-btn"  width="30px" height="30px">
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
                    {{-- <div class="detail-info" contenteditable="true" oninput="updateHiddenInput('jenisDonasiInput', this.innerText)">{{ $kegiatanDonasi->JenisDonasiDibutuhkan }}</div>
                    <input type="hidden" name="jenisDonasi" style="background-color:#f0f0f0" #f0f0f0; id="jenisDonasiInput" value="{{ $kegiatanDonasi->JenisDonasiDibutuhkan }}"> --}}

                    <div class="detail-info-jenis d-flex justify-content-start">
                        <div class="donation-options">
                            @php
                                $allDonasiTypes = [
                                    'pakaian', 'makanan', 'obat', 'buku', 'keperluan_ibadah',
                                    'mainan', 'keperluan_mandi', 'keperluan_rumah', 'alat_tulis', 'sepatu'
                                ];
                                $jenisDonasiArray = explode(',', $kegiatanDonasi->JenisDonasiDibutuhkan);
                            @endphp
                            @foreach($allDonasiTypes as $jenisDonasi)
                                @php
                                    $namaFile = 'Image/donasi/' . strtolower(trim($jenisDonasi)) . '.png';
                                    $selected = in_array($jenisDonasi, $jenisDonasiArray);
                                @endphp
                                <div class="donation-icon-wrapper {{ $selected ? 'selected' : '' }}" onclick="toggleDonasi(this, '{{ $jenisDonasi }}')">
                                    <img src="{{ asset($namaFile) }}" alt="{{ $jenisDonasi }}" height="20px">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <input type="hidden" name="jenisDonasi" id="jenisDonasiInput" value="{{ $kegiatanDonasi->JenisDonasiDibutuhkan }}">
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
                    <a href="{{ route('kegiatan-donasi.show', ['id' => $kegiatanDonasi->IDKegiatanDonasi]) }}" class="cancel-btn">
                        Batal
                    </a>
                    <button class="save-btn" type="button" onclick="tampilkanPopup()">Simpan Perubahan</button>
                </div>
            </div>

        <div class="donor-history">
            <h2 id="judul-riwayat-donatur">Riwayat Donatur</h2>
            <button class="view-history-btn-disabled" type="button" disabled>Lihat Riwayat Donatur</button>
        </div>
    </div>

        <!-- Pop-up konfirmasi -->
        <div id="popup-container" style="display: none;">
            <div id="popup" style="margin: 10px">
                <h3 style="color: #152F44; font-size: 20px; font-weight: 600;">Konfirmasi Penyimpanan Perubahan</h3>
                <p style="margin-top: 10px; font-size: 18px; font-weight: 300; color: #152F44;">Apakah Anda yakin ingin menyimpan perubahan yang telah Anda buat? <br> Perrubahan yang disimpan akan menggantikan versi sebelumnya.</p>
                <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                    <button class="btn-secondary" style="background-color: #FFFFFF; color: #007C92; font-weight: 600; font-size: 16px; margin-right: 10px;" onclick="tutupPopup(); return false;">Batal</button>
                    <button type="submit" class="btn-primary" style="background-color: #00AF71; color: #FFFFFF; font-weight: 600; font-size: 16px; margin-left: 10px;">Ya, Simpan</button>
                </div>
            </div>
        </div>
    </form>

    <div id="donation-popup-container" style="display: none;">
        <div id="donation-popup">
            <div class="popup-header">
                <h3>Jenis Donasi</h3>
                <img src="{{ asset('image/general/close.png') }}" alt="Close" class="close-icon" onclick="hideDonationPopup()" style="height: 20px">
            </div>

            <div class="popup-content">
                <div class="popup-column">
                    <!-- Left Column Items -->
                    <div class="popup-row"><img src="{{ asset('image/donasi/pakaian.png') }}" alt="Pakaian"><span>Pakaian</span></div>
                    <div class="popup-row"><img src="{{ asset('image/donasi/makanan.png') }}" alt="Makanan"><span>Makanan</span></div>
                    <div class="popup-row"><img src="{{ asset('image/donasi/obat.png') }}" alt="Obat-obatan"><span>Obat-obatan</span></div>
                    <div class="popup-row"><img src="{{ asset('image/donasi/buku.png') }}" alt="Buku-buku"><span>Buku-buku</span></div>
                    <div class="popup-row"><img src="{{ asset('image/donasi/keperluan_ibadah.png') }}" alt="Keperluan Ibadah"><span>Keperluan Ibadah</span></div>
                </div>
                <div class="popup-column">
                    <!-- Right Column Items -->
                    <div class="popup-row"><img src="{{ asset('image/donasi/mainan.png') }}" alt="Mainan"><span>Mainan</span></div>
                    <div class="popup-row"><img src="{{ asset('image/donasi/keperluan_mandi.png') }}" alt="Perlengkapan Mandi"><span>Perlengkapan Mandi</span></div>
                    <div class="popup-row"><img src="{{ asset('image/donasi/keperluan_rumah.png') }}" alt="Keperluan Rumah"><span>Keperluan Rumah</span></div>
                    <div class="popup-row"><img src="{{ asset('image/donasi/alat_tulis.png') }}" alt="Alat Tulis"><span>Alat Tulis</span></div>
                    <div class="popup-row"><img src="{{ asset('image/donasi/sepatu.png') }}" alt="Sepatu"><span>Sepatu</span></div>
                </div>
            </div>
        </div>
    </div>

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

    function toggleDonasi(element, jenisDonasi) {
        element.classList.toggle('selected');
        const jenisDonasiInput = document.getElementById('jenisDonasiInput');
        let currentJenis = jenisDonasiInput.value.split(',').filter(Boolean);
        if (currentJenis.includes(jenisDonasi)) {
            currentJenis = currentJenis.filter(item => item !== jenisDonasi);
        } else {
            currentJenis.push(jenisDonasi);
        }
        jenisDonasiInput.value = currentJenis.join(',');
    }

    function updateHiddenInput(inputId, text) {
        document.getElementById(inputId).value = text;
    }

    function showDonationPopup() {
            document.getElementById('donation-popup-container').style.display = 'flex';
    }

    function hideDonationPopup() {
        document.getElementById('donation-popup-container').style.display = 'none';
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
