@extends('generalPageDonaturRelawan.templateDonaturRelawan')

@section('title', 'Artikel')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{ asset('css/Artikel/daftarArtikelPage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Artikel/detailArtikelPage.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="btn-articleBack mb-3">
    <a href="{{ route('displayDaftarArtikel', ['id' => $id]) }}" class="back-link">
        <img src="{{ asset('Image/general/back.png') }}" alt="back button" class="back-img">
        <p class="judulArtikel-text">Manfaat Donasi</p>
    </a>
</div>

<div class="row artikel1 justify-text">
    <div class="col-30">
        Melakukan donasi dapat memberikan banyak manfaat, baik bagi donatur, relawan, maupun panti sosial. Dengan memberikan donasi, donatur atau relawan tidak hanya memberikan kontribusi langsung, namun juga memberikan dampak jangka panjang yang membantu panti sosial dalam menjangkau lebih banyak orang lagi di masa depan.
        <br>
        <br>
        Bagi mereka yang melakukan donasi, berikut manfaat yang akan dirasakan.
        <br><br>
        <b>1. Kepuasan Diri</b>
        <br>
        Dengan melakukan donasi, kita akan merasakan perasaan puas diri. Perasaan ini dapat muncul karena kita mengetahui hal yang kita lakukan dapat membantu orang lain. Terlebih apabila kita dapat melihat secara langsung dampak positif yang mereka rasakan.
        <br>
        <br>
        <b>2. Pengembangan Diri</b>
        <br>
        Dengan melakukan donasi, secara tidak langsung kita juga mengembangkan diri kita. Pengembangan diri tersebut bisa dalam bentuk kemampuan komunikasi, bekerja sama, pengaturan waktu, dan lain sebagainya. Selain itu, melalui donasi kita juga bisa bertemu dengan banyak orang yang dapat meningkatkan pengetahuan kita.
        <br>
        <br>
        <b>3. Peningkatan Koneksi</b>
        <br>
        Dengan melakukan donasi, kita dapat banyak menemui orang-orang baru, baik itu sesama donatur atau relawan maupun pengurus atau penghuni di panti sosial. Sehingga, koneksi kita semakin luas dan tidak menutup kemungkinan kita bisa bertemu dengan partner kerja di masa depan.
        <br>
        <br>
        Bagi mereka yang menerima donasi, berikut manfaat yang akan dirasakan:
        <br><br>
        <b>1. Peningkatan Kesejahteraan</b>
        <br>
        Dengan menerima donasi, pihak panti sosial dapat menjaga bahkan meningkatkan kesejahteraan penghuni panti sosial. Peningkatan fasilitas maupun layanan yang sebelumnya belum mampu diberikan menjadi dapat diberikan berkat adanya donasi.
        <br><br>
        <b>2. Penambahan Ruang Lingkup</b>
        <br>
        Dengan menerima donasi, pihak panti sosial dapat memperluas area bahkan membuka panti sosial di lokasi lainnya. Artinya, panti sosial bisa membantu lebih banyak orang lagi yang membutuhkan. Hal ini akan secara umum meningkatkan kesejahteraan masyarakat karena semakin berkurangnya jumlah individu yang tidak mendapatkan perawatan atau dukungan layak.
    </div>
</div>

@endsection



