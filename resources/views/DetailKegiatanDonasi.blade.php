<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kegiatan Donasi</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
  body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

.sidebar {
    width: 15%; /* 1/6 dari lebar page */
    background-color: #00849B;
    color: white;
    padding: 20px;
    position: fixed;
    height: 100%;
    display: flex;
    flex-direction: column; /* Menetapkan arah kolom */
}
.contact-info {
    margin-top: auto; /* Menggeser elemen ke bagian bawah */
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
    margin-left: 16.666%; /* 1/6 dari lebar page */
    padding: 50px;
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
.title{
    display: flex;
    align-items: center;
    flex-direction: row;
}
.title img {
    display: flex;
    align-self: center;
}

.buttons {
    margin-top: 10px;
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
}

.delete-btn {
    background-color: #B7342C;
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
    padding: 10px 20px;
    cursor: pointer;
}

.details {
    margin-top: 30px;
}

.detail-row {
    display: flex;
    margin-bottom: 10px;
}

.detail-label {
    flex: 1;
    font-weight: 600;
    color: #006374;
}

.detail-info {
    flex: 2;
    background-color: #D9D9D9;
    padding: 10px;
}


</style>
<body>
    <div class="sidebar">
        <img src="image/general/logo2.png" alt="Logo">
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
            <a href="#"><img src="image/general/back.png" alt="Back" class="back-btn" height: 20px;></a>
            <h1>Donasi untuk Korban Bencana</h1>
            </div>
            <div class="buttons">
                <button class="edit-btn">Ubah Kegiatan</button>
                <button class="delete-btn">Hapus Kegiatan</button>
            </div>
        </div>
        <div class="details">
            <div class="detail-row">
                <div class="detail-label">Nama Kegiatan</div>
                <div class="detail-info">Nama Kegiatan dari Database</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Deskripsi Kegiatan</div>
                <div class="detail-info">Deskripsi Kegiatan dari Database</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Tanggal Kegiatan Berlangsung</div>
                <div class="detail-info">Tanggal Kegiatan dari Database</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Jenis Donasi
                <img src="image/general/information.png" alt="Info" class="donation-icon" height="12px">
                </div>
                <div class="detail-info">
                    Jenis Donasi dari Database
                </div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Deskripsi Jenis Donasi</div>
                <div class="detail-info">Deskripsi Jenis Donasi dari Database</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Lokasi Pelaksanaan Kegiatan</div>
                <div class="detail-info">Lokasi Pelaksanaan Kegiatan dari Database</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Lokasi pada Google Maps</div>
                <div class="detail-info">Lokasi pada Google Maps dari Database</div>
            </div>
        </div>

        <div class="donor-history">
            <h2>Riwayat Donatur</h2>
            <button class="view-history-btn">Lihat Riwayat Donatur</button>
        </div>
    </div>
</body>
</html>
