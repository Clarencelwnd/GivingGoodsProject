@extends('templateDonaturRelawan')

@section('title', 'Daftar Artikel')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{ asset('css/daftarArtikelPage.css') }}">
@endsection

@section('content')
<div class="daftarForum-top">
    <h6 id="daftarForumTitle">Daftar Forum</h6>
</div>

<a href="{{ route('displayDetailArtikel') }}" class="text-decoration-none text-dark">
    <div class="card w-60" id="forum-cards">
        <div class="card-body">
            <div class="card-top">
                <h5 class="card-title" id="judulForum">Manfaat Donasi</h5>
            </div>
            <div class="row artikel1">
                <div class="col-30 text-truncate">
                    Melakukan donasi dapat memberikan banyak manfaat, baik bagi donatur, relawan, maupun panti sosial. Dengan memberikan donasi, donatur atau relawan tidak hanya memberikan kontribusi langsung, namun juga memberikan dampak jangka panjang yang membantu panti sosial dalam menjangkau lebih banyak orang lagi di masa depan.

                    Bagi mereka yang melakukan donasi, berikut manfaat yang akan dirasakan.
                    Kepuasan Diri
                    Dengan melakukan donasi, kita akan merasakan perasaan puas diri. Perasaan ini dapat muncul karena kita mengetahui hal yang kita lakukan dapat membantu orang lain. Terlebih apabila kita dapat melihat secara langsung dampak positif yang mereka rasakan.
                    Pengembangan Diri
                    Dengan melakukan donasi, secara tidak langsung kita juga mengembangkan diri kita. Pengembangan diri tersebut bisa dalam bentuk kemampuan komunikasi, bekerja sama, pengaturan waktu, dan lain sebagainya. Selain itu, melalui donasi kita juga bisa bertemu dengan banyak orang yang dapat meningkatkan pengetahuan kita.
                    Peningkatan Koneksi
                    Dengan melakukan donasi, kita dapat banyak menemui orang-orang baru, baik itu sesama donatur atau relawan maupun pengurus atau penghuni di panti sosial. Sehingga, koneksi kita semakin luas dan tidak menutup kemungkinan kita bisa bertemu dengan partner kerja di masa depan.

                    Bagi mereka yang menerima donasi, berikut manfaat yang akan dirasakan.
                    Peningkatan Kesejahteraan
                    Dengan menerima donasi, pihak panti sosial dapat menjaga bahkan meningkatkan kesejahteraan penghuni panti sosial. Peningkatan fasilitas maupun layanan yang sebelumnya belum mampu diberikan menjadi dapat diberikan berkat adanya donasi.
                    Penambahan Ruang Lingkup
                    Dengan menerima donasi, pihak panti sosial dapat memperluas area bahkan membuka panti sosial di lokasi lainnya. Artinya, panti sosial bisa membantu lebih banyak orang lagi yang membutuhkan. Hal ini akan secara umum meningkatkan kesejahteraan masyarakat karena semakin berkurangnya jumlah individu yang tidak mendapatkan perawatan atau dukungan layak.
                </div>
            </div>
        </div>
    </div>
</a>

<a href="{{ route('displayDetailArtikel2') }}" class="text-decoration-none text-dark">
    <div class="card w-60" id="forum-cards">
        <div class="card-body">
            <div class="card-top">
                <h5 class="card-title" id="judulForum">Melakukan Donasi secara Online</h5>
            </div>
            <div class="row artikel2">
                <div class="col-30 text-truncate">
                    Menurut KBBI (Kamus Besar Bahasa Indonesia), donasi adalah pemberian, hadiah, maupun sumbangan berupa uang. Beberapa bentuk donasi yang secara umum diberikan adalah barang, uang, waktu, tenaga, dan lain sebagainya. Donasi dapat diberikan ataupun diterima oleh individu maupun organisasi. Di era teknologi yang semakin canggih, cara penyaluran donasi juga sudah memiliki beberapa pilihan. Dahulu, kita mungkin harus mendatangi organisasi atau panti yang membutuhkan donasi. Namun, saat ini kita bisa melakukan transfer ke rekening untuk donasi berbentuk uang. Kita juga bisa melakukan pendaftaran secara online untuk ikut berdonasi dalam bentuk barang, waktu, maupun tenaga.
                    Dengan kemudahan yang bisa kita rasakan di zaman sekarang, tentunya ada pula hal yang harus lebih diperhatikan. Tidak sedikit kita mendengar kasus penipuan secara online yang dilakukan oleh pihak yang tidak bertanggung jawab dengan memanfaatkan teknologi. Hal itu tentunya mempengaruhi banyak orang, bahkan dalam melakukan kebaikan seperti berdonasi. Banyak dari kita yang merasakan khawatir, sehingga kemudahan teknologi yang seharusnya bisa kita nikmati menjadi hal yang kita hindari.
                    Mengetahui hal tersebut, GivingGoods hadir dengan sangat memperhatikan keamanan dan kenyamanan pengguna dalam melakukan donasi. Kami berusaha menjaga kepercayaan calon donatur atau relawan dengan memastikan bahwa panti sosial yang membutuhkan pada website kami adalah panti sosial resmi yang terdaftar di pemerintahan. Selain itu, pengguna juga dapat melihat detail informasi dari panti sosial yang akan mereka bantu. GivingGoods juga menyediakan alur pendaftaran donasi yang mudah, sehingga pengguna dapat merasa nyaman.
                    Sehingga, dengan adanya website GivingGoods, kami berharap dapat membantu lebih banyak lagi panti sosial yang membutuhkan. Kami juga berharap dapat meningkatkan kepercayaan pengguna untuk memanfaatkan teknologi dalam membantu sesama.
                </div>
            </div>
        </div>
    </div>
</a>
@endsection



