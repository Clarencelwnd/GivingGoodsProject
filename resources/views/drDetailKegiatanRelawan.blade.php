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
        .title {
            text-align: center;
            font-size: 48px;
            color: #1C3F5B;
            font-weight: 700;
        }
        .image-container {
            text-align: center;
            padding: 20px 0;
        }
        .image-container img {
            width: 100%;
            max-width: 600px;
        }
        .content {
            margin-top: 20px;
        }
        .subtitle {
            font-size: 32px;
            color: #1C3F5B;
            font-weight: 600;
            margin-top: 20px;
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
    margin-top: 10px;
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
    align-items: flex-start;
    flex-direction: row;
    font-size: 40px;
    font-weight: 600;
    color: #006374;
}

.title img {
    display: flex;
    padding-top: 10px;
    padding-right: 10px;
}

    </style>
</head>
<body>

    <div class="title">
        <a href="#"><img src="{{ asset('image/general/back.png') }}" alt="Back" class="back-btn" height="20px"></a>
        <h1>Kegiatan Pendidikan di Papua</h1>
    </div>


    <div class="image-container">
        <img src="path/to/your/image.jpg" alt="Image">
    </div>

    <div class="content">
        <div class="subtitle">Pendaftaran Ditutup</div>
        <div class="text">Text di bawah subtitle pertama.</div>

        <div class="subtitle">Relawan Dibutuhkan</div>
        <div class="text">Text di bawah subtitle kedua.</div>

        <div class="subtitle">Tanggal Kegiatan</div>
        <div class="text">Text di bawah subtitle ketiga.</div>

        <div class="subtitle">Jam Kegiatan</div>
        <div class="text">Text di bawah subtitle keempat.</div>

        <div class="subtitle">Lokasi Kegiatan Relawan</div>
        <div class="text">Text di bawah subtitle kelima.</div>

        <div class="subtitle">Deskripsi</div>
        <div class="text">Text di bawah subtitle keenam.</div>

        <div class="subtitle">Kriteria Relawan</div>
        <div class="text">Text di bawah subtitle ketujuh.</div>

        <div class="subtitle">Persyaratan dan Instruksi</div>
        <div class="text">Text di bawah subtitle kedelapan.</div>

        <div class="subtitle">Kegiatan Relawan</div>
        <div class="text">Text di bawah subtitle kesembilan.</div>

        <a href="#" class="button">Ikut Kegiatan</a>

        <div class="question-contact-container">
            <div class="question">Punya Pertanyaan?</div>
            <div class="contact">
                <img src="{{ asset('image/general/chat.png') }}" alt="Chat Icon">
                <div class="contact-text">Hubungi Panti Sosial Sejati</div>
            </div>
        </div>

    </div>

</body>
</html>
