<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Donatur</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<style>

h1 {
    font-weight: 600;
    font-size: 36px;
    margin: 0;
    display: flex;
    color: #007C92;
    align-items: center;
}

.title-back {
    display: flex;
    flex-direction: row;
    align-items: center;
}

.btn-back {
    width: 40px;
    height: 40px;
    margin-right: 10px;
    margin-top: -10px;
}

.total-donatur {
    font-size: 18px;
    margin-top: 10px;
    margin-left: auto;
}
.total-jumlah {
    display: flex;
    flex-direction: row;
    align-items: center;
    padding: 50px 0;
}
.jumlah {
    margin-left: 180px;
}

.table {
    border-collapse: collapse;
    width: 100%;
}

.table th {
    border-bottom: 1px solid #ddd;
    text-align: center;
    padding-bottom: 20px
}

.table td {
    text-align: center;
    padding-top: 20px;
}

.table th {
    font-weight: 500;
    font-size: 22px;
    color: #006374;
}

.confirmation-box {
    background-color: #00C27E;
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
}

.btn-detail {
    background-color: white;
    color: #00925F;
    border: 2px solid #00925F;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
}

.container {
    padding: 40px;
}


</style>

<body>
    <div class="container">

        <div class="title-back">
            <div class="back">
                <a href="#" class="btn-back">
                    <img src="{{ asset('image/general/back.png') }}" alt="Back">
                </a>
            </div>
            <div class="col">
                <h1 style="font-weight: 600; font-size: 36px;">Riwayat Donatur</h1>
            </div>
        </div>


        <div class="total-jumlah">
            <div class="col">
                <p>Total Donatur</p>
            </div>
            <div class="jumlah">
                <p>20 orang</p>
            </div>
        </div>


        <div class="table-riwayat">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Donatur</th>
                            <th>No HP</th>
                            <th>Jam & Tanggal Donasi</th>
                            <th>Konfirmasi</th>
                            <th>Sudah dihubungi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($registrasiDonatur as $registrasi)
                        <tr>
                            <td>{{ $registrasi->donaturRelawan->NamaDonaturRelawan }}</td>
                            <td>{{ $registrasi->donaturRelawan->NomorTeleponDonaturRelawan }}</td>
                            <td>{{ $registrasi->jamTanggalDonasi }}</td>
                            <td>
                                <div class="confirmation-box">
                                    Barang Diterima
                                </div>
                            </td>
                            <td>
                                <input type="checkbox" name="sudah_dihubungi[]" value="1">
                            </td>
                            <td>
                                <button class="btn-detail">Lihat Detail</button>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
