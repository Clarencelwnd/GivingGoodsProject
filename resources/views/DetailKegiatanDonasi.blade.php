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
    border-radius: 5px;
}

.delete-btn {
    background-color: #B7342C;
    border-radius: 5px;
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
}

.details {
    margin-top: 30px;
}

.detail-row {
    display: flex;
    margin-bottom: 10px;
    justify-content: flex-start;
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

.detail-row {
    margin-bottom: 20px;
}

.detail-dates {
    display: flex;
    align-items: center;
    padding-right: 436px;
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
                <button class="edit-btn">Ubah Kegiatan</button>
                <form action="{{ route('kegiatan-donasi.destroy', $kegiatanDonasi->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn" onclick="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')">Hapus Kegiatan</button>
                </form>
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
                    <div class="date-separator">-</div>
                    <div class="detail-info-tanggal">{{ $kegiatanDonasi->TanggalKegiatanDonasiSelesai }}</div>
                </div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Jenis Donasi
                    <img src="{{ asset('image/general/information.png') }}" alt="Info" class="donation-icon" height="12px">
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
            <button class="view-history-btn">Lihat Riwayat Donatur</button>
        </div>
    </div>
</body>
</html>
