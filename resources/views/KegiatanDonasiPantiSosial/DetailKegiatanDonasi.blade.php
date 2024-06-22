@extends('GeneralPagePantiSosial.templatePage')
@section('title', 'Detail Kegiatan Donasi')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{ asset('css/GeneralPagePantiSosial/generalPage.css') }}">
    <link href="{{ asset('css/KegiatanDonasiPantiSosial/DetailKegiatanDonasi.css') }}" rel="stylesheet">
    <script src="{{ asset('js/generalPage.js') }}"></script>
@endsection

@section('content')
    <div class="main-content">
        <div class="header">
            <div class="title">
                <a href="#"><img src="{{ asset('image/general/back.png') }}" alt="Back" class="back-btn" width="30px" height="30px"></a>
                <h1 id="judul-kegiatan-donasi">{{ $kegiatanDonasi->NamaKegiatanDonasi }}</h1>
            </div>
            <div class="buttons">
                <a href="{{ route('ubah-kegiatan-donasi.show', ['id' => $kegiatanDonasi->IDKegiatanDonasi]) }}" style="text-decoration: none;">
                    <button class="edit-btn">Ubah Kegiatan</button>
                </a>
                <button class="delete-btn" onclick="showPopup()">Hapus Kegiatan</button>
            </div>
        </div>
        <div class="details">
            <div class="detail-row">
                <div class="detail-label">Nama Kegiatan</div>
                <div class="detail-info">{{ $kegiatanDonasi->NamaKegiatanDonasi }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Deskripsi Kegiatan</div>
                <div class="detail-info">{{ $kegiatanDonasi->DeskripsiKegiatanDonasi }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Tanggal Kegiatan Berlangsung</div>
                <div class="detail-dates">
                    <div class="detail-info-tanggal">{{ $kegiatanDonasi->TanggalKegiatanDonasiMulai }}</div>
                    <img src="{{ asset('Image/general/line.png') }}" alt="Back" width="10px">
                    <div class="detail-info-tanggal">{{ $kegiatanDonasi->TanggalKegiatanDonasiSelesai }}</div>
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Jenis Donasi
                    <img src="{{ asset('image/general/information.png') }}" alt="Info" class="donation-icon" height="12px" onclick="showDonationPopup()">
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
                            // $namaFile = strtolower(str_replace(' ', '_', trim($jenisDonasi))) . '.png';
                            $namaFile = 'Image/donasi/' . strtolower(trim($jenisDonasi)) . '.png';
                        @endphp
                        <img src="{{ asset($namaFile) }}" alt="{{ $jenisDonasi }}" height="20px">
                    @endforeach
                    </div>
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Deskripsi Jenis Donasi</div>
                <div class="detail-info">{{ $kegiatanDonasi->DeskripsiJenisDonasi }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Lokasi Pelaksanaan Kegiatan</div>
                <div class="detail-info">{{ $kegiatanDonasi->LokasiKegiatanDonasi }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Lokasi pada Google Maps</div>
                <div class="detail-info">{{ $kegiatanDonasi->LinkGoogleMapsLokasiKegiatanDonasi }}</div>
            </div>
        </div>

        <div class="donor-history">
            <h2 id="judul-riwayat-donatur">Riwayat Donatur</h2>
            <a href="{{ route('riwayat-donatur.index', ['id' => $kegiatanDonasi->IDKegiatanDonasi]) }}">
                <button class="view-history-btn">Lihat Riwayat Donatur</button>
            </a>
        </div>
    </div>

    <div id="popup-container" style="display: none;">
            <div id="popup">
                <h3 style="color: #152F44; font-size: 20px; font-weight: 600;">Hapus Kegiatan</h3>
                <p style="margin-top: 10px; font-size: 18px; font-weight: 300; color: #152F44;">Apakah Anda yakin ingin menghapus kegiatan ini? Tindakan ini tidak dapat dibatalkan</p>
                <div style="display: flex; gap:20px; justify-content:center; margin-top: 20px;">
                    <button class="btn-secondary" style="background-color: #FFFFFF; color: #007C92; font-weight: 600; font-size: 16px; margin-right: 10px;" onclick="hidePopup()">Batal</button>
                    <form id="delete-form" action="{{ route('delete-kegiatan-donasi.destroy', $kegiatanDonasi->IDKegiatanDonasi) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                    <button type="submit" class="btn-primary delete-button" style="background-color: #00AF71; color: #FFFFFF; font-weight: 600; font-size: 16px; margin-left: 10px;" >Ya, Hapus</button>
                    </form>
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
                    <!-- Left Column Items -->
                    <div class="popup-row"><img src="{{ asset('Image/donasi/pakaian.png') }}" alt="Pakaian"><span>Pakaian</span></div>
                    <div class="popup-row"><img src="{{ asset('Image/donasi/makanan.png') }}" alt="Makanan"><span>Makanan</span></div>
                    <div class="popup-row"><img src="{{ asset('Image/donasi/obat.png') }}" alt="Obat-obatan"><span>Obat-obatan</span></div>
                    <div class="popup-row"><img src="{{ asset('Image/donasi/buku.png') }}" alt="Buku-buku"><span>Buku-buku</span></div>
                    <div class="popup-row"><img src="{{ asset('Image/donasi/keperluan_ibadah.png') }}" alt="Keperluan Ibadah"><span>Keperluan Ibadah</span></div>
                </div>
                <div class="popup-column">
                    <!-- Right Column Items -->
                    <div class="popup-row"><img src="{{ asset('Image/donasi/mainan.png') }}" alt="Mainan"><span>Mainan</span></div>
                    <div class="popup-row"><img src="{{ asset('Image/donasi/keperluan_mandi.png') }}" alt="Perlengkapan Mandi"><span>Perlengkapan Mandi</span></div>
                    <div class="popup-row"><img src="{{ asset('Image/donasi/keperluan_rumah.png') }}" alt="Keperluan Rumah"><span>Keperluan Rumah</span></div>
                    <div class="popup-row"><img src="{{ asset('Image/donasi/alat_tulis.png') }}" alt="Alat Tulis"><span>Alat Tulis</span></div>
                    <div class="popup-row"><img src="{{ asset('Image/donasi/sepatu.png') }}" alt="Sepatu"><span>Sepatu</span></div>
                </div>
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

        function showDonationPopup() {
            document.getElementById('donation-popup-container').style.display = 'flex';
        }

        function hideDonationPopup() {
            document.getElementById('donation-popup-container').style.display = 'none';
        }
    </script>
@endsection

