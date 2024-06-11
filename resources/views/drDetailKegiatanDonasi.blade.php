<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kegiatan Donasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .container{
            padding: 30px;
        }
        .image-container {
            text-align: center;
            padding: 20px 0;
        }
        .image-container img {
            width: 100%;
            height: 400px;
        }
        .content {
            margin-top: 20px;
        }
        .section{
            padding-bottom: 40px;
        }
        .subtitle {
            font-size: 32px;
            color: #1C3F5B;
            font-weight: 600;
            padding-bottom: 8px;
        }
        .text {
            font-size: 20px;
            color: #006374;
            font-weight: 400;
        }
        .button {
            display: block;
            width: 100%;
            padding: 15px 0;
            text-align: center;
            font-size: 32px;
            color: white;
            font-weight: 600;
            background-color: #00C27E;
            border: none;
            border-radius: 5px;
            margin-top: 20px;
            text-decoration: none;
            margin-bottom: 40px;
        }
.question-contact-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    width: 100%;
}

.contact {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
    cursor: pointer;
}

.contact img {
    margin-right: 10px;
}

.question {
    font-size: 24px;
    color: #1C3F5B;
    font-weight: 600;
}

.contact-text {
    font-size: 24px;
    color: #007C92;
    font-weight: 400;
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
.title h1 {
    font-weight: 600;
    color: #007C92;
    font-size: 36px;
    margin-bottom: 10px;
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


.detail-row {
    display: flex;
    align-items: center;
    margin-bottom: 30px;
}

.detail-info-jenis {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-left: 20px;
}

.donation-options img {
    height: 20px;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.donation-options img.selected {
    background-color: #B0ECD7;
}

.detail-label{
    color: #1C3F5B;
    font-weight: 600;
    font-size: 26px;
}


    </style>
</head>
<body>

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
            <div class="text">{{ $kegiatanDonasi->LokasiKegiatanDonasi }}</div>
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
            function showDonationPopup() {
                    document.getElementById('donation-popup-container').style.display = 'flex';
                }

                function hideDonationPopup() {
                    document.getElementById('donation-popup-container').style.display = 'none';
                }
</script>
</body>
</html>
