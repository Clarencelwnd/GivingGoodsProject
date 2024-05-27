<!-- resources/views/kegiatan-donasi/show.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Kegiatan Relawan</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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

.details {
    margin-top: 30px;
}

.contact-info p {
    margin: 5px 0;
}

.donor-history {
    margin-top: 50px;
}

.view-history-btn-disabled {
    background-color: #B0ECD7;
    color: #FDFFFE;
    cursor: not-allowed;
    border: none;
    border-radius: 5px;
    padding: 10px 60px;
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
.detail-time {
    display: flex;
    align-items: center;
    padding-right: 470px;
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


.button-container {
        display: flex;
        justify-content: flex-end;
        margin-top: 55px;
    }

    .save-btn {
        background-color: #00AF71;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 600;
        width: 20%;
    }

    .cancel-btn {
        color: #007C92;
        background-color: white;
        border: 2px solid #007C92;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 600;
        margin-right: 20px;
        width: 20%;
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
                <a href="{{ route('kegiatan-relawan.show', ['id' => $kegiatanRelawan->IDKegiatanRelawan]) }}">
                    <img src="{{ asset('image/general/back.png') }}" alt="Back" class="back-btn" height="20px">
                </a>
                <h1>{{ $kegiatanRelawan->NamaKegiatanRelawan }}</h1>
            </div>

        </div>

        <form id="ubahKegiatanForm" method="POST" action="{{ route('ubah-kegiatan-relawan.update', ['id' => $kegiatanRelawan->IDKegiatanRelawan]) }}">
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
                        <div class="detail-info-tanggal" id="tglMulai" contenteditable="true" oninput="updateHiddenInput('tglMulaiInput', this.innerText)">{{ $kegiatanRelawan->TanggalKegiatanRelawanMulai }}</div>
                        <img src="{{ asset('image/general/line.png') }}" alt="Back" width="20px" style="padding-left: 15px; padding-right: 15px;">
                        <div class="detail-info-tanggal" id="tglSelesai" contenteditable="true" oninput="updateHiddenInput('tglSelesaiInput', this.innerText)">{{ $kegiatanRelawan->TanggalKegiatanRelawanSelesai }}</div>
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
                        <div class="detail-info-tanggal" id="jamMulai" contenteditable="true" oninput="updateHiddenInput('jamMulaiInput', this.innerText)">{{ $kegiatanRelawan->JamMulaiKegiatanRelawan }}</div>
                        <img src="{{ asset('image/general/line.png') }}" alt="Back" width="20px" style="padding-left: 15px; padding-right: 15px;">
                        <div class="detail-info-tanggal" id="jamSelesai" contenteditable="true" oninput="updateHiddenInput('jamSelesaiInput', this.innerText)">{{ $kegiatanRelawan->JamSelesaiKegiatanRelawan  }}</div>
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
            <button class="cancel-btn" type="button" onclick="tutupPopup()">Batal</button>
            <button class="save-btn" type="button" onclick="tampilkanPopup()">Simpan Perubahan</button>
        </div>

        <div class="donor-history">
            <h2>Riwayat Relawan</h2>
            <button class="view-history-btn-disabled">Lihat Riwayat Relawan</button>
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


           <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

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

</body>
</html>
