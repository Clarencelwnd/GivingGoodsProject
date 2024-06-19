@extends('generalPageDonaturRelawan.templateDonaturRelawan')

@section('title', 'Artikel')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{ asset('css/daftarArtikelPage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detailArtikelPage.css') }}">
@endsection

@section('content')
<div class="btn-articleBack mb-3">
    <a href="{{ route('displayDaftarArtikel', ['id' => $id]) }}" class="back-link">
        <img src="{{ asset('Image/general/back.png') }}" alt="back button" class="back-img">
        <p class="judulArtikel-text">Melakukan Donasi Secara Online</p>
    </a>
</div>

<div class="row artikel1 justify-text">
    <div class="col-30">
        Menurut KBBI (Kamus Besar Bahasa Indonesia), donasi adalah pemberian, hadiah, maupun sumbangan berupa uang. Beberapa bentuk donasi yang secara umum diberikan adalah barang, uang, waktu, tenaga, dan lain sebagainya. Donasi dapat diberikan ataupun diterima oleh individu maupun organisasi. Di era teknologi yang semakin canggih, cara penyaluran donasi juga sudah memiliki beberapa pilihan. Dahulu, kita mungkin harus mendatangi organisasi atau panti yang membutuhkan donasi. Namun, saat ini kita bisa melakukan transfer ke rekening untuk donasi berbentuk uang. Kita juga bisa melakukan pendaftaran secara online untuk ikut berdonasi dalam bentuk barang, waktu, maupun tenaga.
        <br> <br>
        Dengan kemudahan yang bisa kita rasakan di zaman sekarang, tentunya ada pula hal yang harus lebih diperhatikan. Tidak sedikit kita mendengar kasus penipuan secara online yang dilakukan oleh pihak yang tidak bertanggung jawab dengan memanfaatkan teknologi. Hal itu tentunya mempengaruhi banyak orang, bahkan dalam melakukan kebaikan seperti berdonasi. Banyak dari kita yang merasakan khawatir, sehingga kemudahan teknologi yang seharusnya bisa kita nikmati menjadi hal yang kita hindari.
        <br> <br>
        Mengetahui hal tersebut, GivingGoods hadir dengan sangat memperhatikan keamanan dan kenyamanan pengguna dalam melakukan donasi. Kami berusaha menjaga kepercayaan calon donatur atau relawan dengan memastikan bahwa panti sosial yang membutuhkan pada website kami adalah panti sosial resmi yang terdaftar di pemerintahan. Selain itu, pengguna juga dapat melihat detail informasi dari panti sosial yang akan mereka bantu. GivingGoods juga menyediakan alur pendaftaran donasi yang mudah, sehingga pengguna dapat merasa nyaman.
        <br> <br>
        Sehingga, dengan adanya website GivingGoods, kami berharap dapat membantu lebih banyak lagi panti sosial yang membutuhkan. Kami juga berharap dapat meningkatkan kepercayaan pengguna untuk memanfaatkan teknologi dalam membantu sesama.
    </div>
</div>

@endsection



