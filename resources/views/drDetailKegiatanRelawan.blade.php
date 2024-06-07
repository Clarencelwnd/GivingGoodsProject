<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kegiatan Relawan</title>
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
            padding-bottom: 30px;
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


    </style>
</head>
<body>

<div class="container">
    <div class="title">
        <a href="#"><img src="{{ asset('image/general/back.png') }}" alt="Back" class="back-btn" height="20px"></a>
        <h1>{{ $kegiatanRelawan->NamaKegiatanRelawan }}</h1>
    </div>


    <div class="image-container">
        <img src="{{ $kegiatanRelawan->GambarKegiatanRelawan }}" alt="Image">
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
            <div class="text">{{ $kegiatanRelawan->TanggalKegiatanRelawanMulai }} - {{ $kegiatanRelawan->TanggalKegiatanRelawanSelesai}}</div>
        </div>

        <div class="section">
            <div class="subtitle">Jam Kegiatan</div>
            <div class="text">{{ $kegiatanRelawan->JamMulaiKegiatanRelawan }} - {{ $kegiatanRelawan->JamSelesaiKegiatanRelawan }} WIB</div>
        </div>

        <div class="section">
            <div class="subtitle">Lokasi Kegiatan Relawan</div>
            <div class="text">{{ $kegiatanRelawan->LokasiKegiatanRelawan }}</div>
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

        <a href="{{ route('daftarKegiatanRelawan', ['idKegiatanRelawan' => $kegiatanRelawan->IDKegiatanRelawan, 'idDonaturRelawan' => $donaturRelawan->IDDonaturRelawan]) }}" class="button">Ikut Kegiatan</a>

        <div class="question-contact-container">
            <div class="question">Punya Pertanyaan?</div>
            <div class="contact">
                <img src="{{ asset('image/general/chat.png') }}" alt="Chat Icon">
                <div class="contact-text">Hubungi {{ $kegiatanRelawan->pantiSosial->NamaPantiSosial }}</div>
            </div>
        </div>

    </div>
</div>


<div id="donation-popup-container" style="display: none;">
    <div id="donation-popup">
        <div class="popup-header">
            <h3>Kegiatan Relawan</h3>
            <img src="{{ asset('image/general/close.png') }}" alt="Close" class="close-icon" onclick="hideDonationPopup()" style="height: 20px">
        </div>
        <div class="popup-content">
            <div class="popup-column">
                <!-- Left Column Items -->
                <div class="popup-row"><span>Bencana Alam</span></div>
                <div class="popup-row"><span>Pendidikan</span></div>
                <div class="popup-row"><span>Kesehatan</span></div>
                <div class="popup-row"><span>Lingkungan</span></div>
                <div class="popup-row"><span>IT dan teknologi</span></div>
            </div>
            <div class="popup-column">
                <!-- Right Column Items -->
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
</body>
</html>
