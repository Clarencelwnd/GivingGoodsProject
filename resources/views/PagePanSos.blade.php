
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Panti Sosial</title>
    <style>
        /* CSS Styling */
        .container {
            width: 70%;
            margin: 0 auto;
            margin-top: 50px;
            padding: 40px;
            border-radius: 5px;
            border: 1px solid #004A57;
        }

        .info-container {
            display: flex;
            align-items: center;
            padding: 20px;
        }

        .donation-icon {
            margin-right: 40px;
            border-radius: 50%;
            height: 170px;
            width: 170px;
            overflow: hidden;
        }

        .info-text-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .title {
            font-weight: 500;
            font-size: 40px;
            color: #1C3F5B;
            margin-right: 10px;
        }

        .subtitle {
            font-weight: 500;
            font-size: 22px;
            color: #006374;
            margin-right: 10px;
            width: 180px;
        }

        .text-info {
            font-weight: 400;
            font-size: 22px;
            color: #1C3F5B;
            flex: 1;
        }

        .section {
            display: flex;
            align-items: flex-start;
            padding-bottom: 20px;
        }

        .details-container {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="info-container">
            <img src="{{ asset('image/login_reset_password/' . $pantiSosial->LogoPantiSosial) }}" class="donation-icon" alt="Logo Panti Sosial">
            <div class="info-text-container">
                <div class="title">{{ $pantiSosial->NamaPantiSosial }}</div>
                <div class="text-info">No. Registrasi: {{ $pantiSosial->NomorRegistrasiPantiSosial }}</div>
            </div>
        </div>
        <div class="text-info" style="margin-top: 15px;">
            Panti Asuhan Budi Mulia merupakan tempat yang memberikan perlindungan dan pendidikan bagi anak-anak yatim piatu dan kurang mampu. Kami berkomitmen untuk memberikan lingkungan yang aman dan mendukung perkembangan mereka.
        </div>
        <div class="details-container">
            <div class="section">
                <div class="subtitle">Email:</div>
                <div class="text-info">{{ $pantiSosial->User->email }}</div>
            </div>
            <div class="section">
                <div class="subtitle">Nomor HP:</div>
                <div class="text-info">{{ $pantiSosial->NomorTeleponPantiSosial }}</div>
            </div>
            <div class="section">
                <div class="subtitle">Website:</div>
                <div class="text-info">{{ $pantiSosial->WebsitePantiSosial }}</div>
            </div>
            <div class="section">
                <div class="subtitle">Alamat:</div>
                <div class="text-info">{{ $pantiSosial->AlamatPantiSosial }}</div>
            </div>
            <div class="section">
                <div class="subtitle">Jam Operasional:</div>
                <div class="text-info">
                    @foreach($pantiSosial->JadwalOperasional->groupBy('Hari') as $hari => $jadwals)
                        <div>
                            <span>{{ $hari }}&nbsp;:</span>
                            @foreach($jadwals as $jadwal)
                                {{ $jadwal->JamBukaPantiSosial }} - {{ $jadwal->JamTutupPantiSosial }}
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="section">
                <div class="subtitle">Media Sosial:</div>
                <div class="text-info">{{ $pantiSosial->MediaSosialPantiSosial }}</div>
            </div>
        </div>
    </div>
</body>
</html>
