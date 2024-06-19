@extends('generalPageDonaturRelawan/templateDonaturRelawan')

@section('title', 'Detail Panti Sosial')

@section('stylesheets')
    @parent
    <link href="{{ asset('css/DetailPantiSosial/PagePanSos.css') }}" rel="stylesheet">
    <script src="{{ asset('js/DetailPantiSosial/PagePanSos.js') }}"></script>
@endsection

@section('content')
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
    @endsection
</html>
