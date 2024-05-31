<!-- resources/views/kegiatan-donasi/show.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kegiatan Donasi</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<style>
/* Style your page here */
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

.sidebar {
    width: 15%;
    background-color: #00849B;
    color: white;
    padding: 20px;
    position: fixed;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.contact-info {
    margin-top: auto;
    margin-bottom: 40px
}

.sidebar img {
    width: 100px;
    margin-bottom: 20px;
}

.sidebar a {
    display: block;
    color: white;
    text-decoration: none;
    margin-bottom: 10px;
}

.main-content {
    margin-left: 16.666%;
    padding: 80px;
}

.header {
    display: flex;
    align-items: flex-start;
    flex-direction: column;
    margin-bottom: 20px;
}

.header h1 {
    font-weight: 600;
    color: #007C92;
    font-size: 36px;
    margin-bottom: 10px;
}

.title {
    display: flex;
    align-items: center;
    flex-direction: row;
}

.title img {
    display: flex;
    padding-top: 10px;
    padding-right: 10px;
}

.buttons {
    margin-top: 10px;
    padding-bottom: 20px;
}

.buttons button {
    padding: 10px 20px;
    border: none;
    margin-left: 10px;
    color: white;
    cursor: pointer;
}

.edit-btn {
    background-color: #00AF71;
    border-radius: 5px;
    font-size: 18px;
}

.delete-btn {
    background-color: #B7342C;
    border-radius: 5px;
    font-size: 18px;
}

.details {
    margin-top: 30px;
}

.contact-info p {
    margin: 5px 0;
}

.donor-history {
    margin-top: 50px;
}

.view-history-btn {
    background-color: #00AF71;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 60px;
    cursor: pointer;
    font-size: 18px;
}
.detail-row {
    display: flex;
    margin-bottom: 10px;
    justify-content: flex-start;
    margin-bottom: 20px;
}

.detail-label {
    flex: 1;
    font-weight: 600;
    color: #006374;
    font-weight: bold;
    margin-bottom: 10px;
}

.detail-info {
    flex: 2;
    background-color: #D9D9D9;
    padding: 10px;
    border-radius: 5px;
}
.detail-dates {
    display: flex;
    align-items: center;
    padding-right: 432px;
}

.detail-info-tanggal {
    background-color: #D9D9D9;
    padding: 10px;
    margin: 0 5px;
    border-radius: 5px;
}

.date-separator {
    padding: 0 20px;
    font-weight: bold;s
}



#popup-container{
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 999;
}

#popup {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #FFFFFF;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
    padding: 20px;
    border-radius: 4px;
    width: auto;
    text-align: center;
}

.btn-primary, .btn-secondary {
    width: 36%;
    padding: 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: 600;
    font-size: 16px;
    margin-top: 10px;
}
.btn-primary {
    background-color: #00AF71;
    color: #FFFFFF;
    margin-right: 55px;
}
.btn-secondary {
    background-color: #FFFFFF;
    color: #007C92;
    border: 1px solid #007C92;
    margin-left: 55px;
}

.delete-button {
        width: 245px; /* Atur lebar sesuai kebutuhan */
    }




    #donation-popup-container {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

#donation-popup {
    background-color: white;
    padding: 30px;
    border-radius: 10px;
    max-width: 600px;
    width: 80%;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.popup-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    margin-top: -25px;
}

.popup-header h3 {
    color: #1C3F5B;
    font-weight: 600;
    font-size: 32px;
}

.popup-header .close-icon {
    cursor: pointer;
}

.popup-content {
    display: flex;
    justify-content: space-between;
}

.popup-column {
    display: flex;
    flex-direction: column;
}

.popup-row {
    display: flex;
    align-items: center;
    margin-bottom: 25px;
}

.popup-row img {
    margin-right: 10px;
    height: 35px;
    width: 37px;
}

.popup-row span {
    color: #006374;
    font-weight: 400;
    font-size: 22px;
    padding-left: 20px;
}




</style>
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
                <a href="{{ route('ubah-kegiatan-donasi.show', ['id' => $kegiatanDonasi->IDKegiatanDonasi]) }}">
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
            <div class="detail-row">
                <div class="detail-label">Jenis Donasi
                    <img src="{{ asset('image/general/information.png') }}" alt="Info" class="donation-icon" height="12px" onclick="showDonationPopup()">
                </div>
                <div class="detail-info">{{ $kegiatanDonasi->JenisDonasiDibutuhkan }}</div>
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
