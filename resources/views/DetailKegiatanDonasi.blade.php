<!-- resources/views/kegiatan-donasi/show.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kegiatan Donasi</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('css/DetailKegiatanDonasi.css') }}" rel="stylesheet">
</head>

<body>
    <div class="sidebar">
        <img src="{{ asset('image/general/logo2.png') }}" alt="Logo">
        <a href="#">Kegiatan</a>
        <a href="#">Forum</a>
        <a href="#">FAQ</a>
        <div class="contact-info">
            <p>Hubungi Kami</p>
            <p>0812-1316-1234</p>
            <p>givinggoods@gmail.com</p>
        </div>
    </div>
    <div class="main-content">
        <div class="header">
            <div class="title">
                <a href="#"><img src="{{ asset('image/general/back.png') }}" alt="Back" class="back-btn" height="20px"></a>
                <h1>{{ $kegiatanDonasi->NamaKegiatanDonasi }}</h1>
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
                    <img src="{{ asset('image/general/line.png') }}" alt="Back" width="20px" style="padding-left: 15px; padding-right: 15px;">
                    <div class="detail-info-tanggal">{{ $kegiatanDonasi->TanggalKegiatanDonasiSelesai }}</div>
                </div>
            </div>

            {{-- <div class="detail-row">
                <div class="detail-label">Jenis Donasi
                    <img src="{{ asset('image/general/information.png') }}" alt="Info" class="donation-icon" height="12px" onclick="showDonationPopup()">
                </div>
                <div class="detail-info">{{ $kegiatanDonasi->JenisDonasiDibutuhkan }}</div>
            </div> --}}
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
                            $namaFile = strtolower(str_replace(' ', '_', trim($jenisDonasi))) . '.png';
                        @endphp
                        <img src="{{ asset('image/donasi/' . $namaFile) }}" alt="{{ $jenisDonasi }}" height="20px">
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
            <h2>Riwayat Donatur</h2>
            <a href="{{ route('riwayat-donatur.index', ['id' => $kegiatanDonasi->IDKegiatanDonasi]) }}">
                <button class="view-history-btn">Lihat Riwayat Donatur</button>
                </a>
        </div>
    </div>




                    <div id="popup-container" style="display: none;">
                        <div id="popup">
                            <h3 style="color: #152F44; font-size: 24px; font-weight: 700;">Hapus Kegiatan</h3>
                            <p style="margin-top: 10px; font-size: 20px; font-weight: 300; color: #152F44;">Apakah Anda yakin ingin menghapus kegiatan ini? Tindakan ini tidak dapat dibatalkan</p>
                            <div style="display: flex; justify-content: space-between; margin-top: 20px;">
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
                                <div class="popup-row"><img src="{{ asset('image/donasi/pakaian.png') }}" alt="Pakaian"><span>Pakaian</span></div>
                                <div class="popup-row"><img src="{{ asset('image/donasi/makanan.png') }}" alt="Makanan"><span>Makanan</span></div>
                                <div class="popup-row"><img src="{{ asset('image/donasi/obat.png') }}" alt="Obat-obatan"><span>Obat-obatan</span></div>
                                <div class="popup-row"><img src="{{ asset('image/donasi/buku.png') }}" alt="Buku-buku"><span>Buku-buku</span></div>
                                <div class="popup-row"><img src="{{ asset('image/donasi/perlengkapan_ibadah.png') }}" alt="Keperluan Ibadah"><span>Keperluan Ibadah</span></div>
                            </div>
                            <div class="popup-column">
                                <!-- Right Column Items -->
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

</body>
</html>