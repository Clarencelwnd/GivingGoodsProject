<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frequently Asked Questions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        .container {
            padding: 30px;
        }

        .faq-title {
            font-weight: 600;
            color: #006374;
            font-size: 40px;
            text-align: left;
            margin-top: 20px;
            margin-bottom: 30px;
        }
        .faq-subtitle{
            font-weight: 600;
            color: #1C3F5B;
            font-size: 30px;
            padding-top: 15px;

        }

        .section-divider {
            border-top: 1px solid #B6B3B3;
            margin: 50px 0 10px 0;
        }

        .faq-section {
            margin-bottom: 20px;
        }

        .faq-question {
            background-color: #0095AF;
            border-radius: 10px;
            margin-bottom: 15px;
            overflow: hidden;
            border: 1.5px solid #0095AF;
        }

        .faq-question:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .faq-question-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            cursor: pointer;
        }

        .question-text {
            font-size: 18px;
            color: #fff;
        }

        .answer {
            padding: 15px;
            border-top: 1px solid #006374;
            background-color: #fff;
            display: none;
        }

        .rotate {
            transition: transform 0.3s ease;
        }

        .arrow-icon {
            width: 20px;
            height: 20px;
            fill: #fff;
        }

        .faq-question.active .arrow-icon {
            transform: rotate(180deg);
        }

        .faq-question.active .answer {
            display: block;
        }

        .footer {
            flex-shrink: 0; /* Mencegah footer dari penyusutan */
            margin-top: auto; /* Memindahkan footer ke bawah */
            text-align: center; /* Memposisikan teks di tengah */
            padding-top: 80px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="faq-title">Frequently Asked Questions</h1>


    <div class="faq-section">
        <h2 class="faq-subtitle">Terkait Donatur/Relawan</h2>
        <div class="faq-question">
            <div class="faq-question-content">
                <div class="question-text">Bagaimana cara saya menjadi donatur</div>
                <svg class="arrow-icon" viewBox="0 0 24 24">
                    <path d="M7 10l5 5 5-5z"></path>
                </svg>
            </div>
            <div class="answer">
                Jawaban Pertanyaan 1
            </div>
        </div>

        <div class="faq-question">
            <div class="faq-question-content">
                <div class="question-text">Bagaimana cara saya melacak penggunaan donasi saya?</div>
                <svg class="arrow-icon" viewBox="0 0 24 24">
                    <path d="M7 10l5 5 5-5z"></path>
                </svg>
            </div>
            <div class="answer">
                Jawaban Pertanyaan 2
            </div>
        </div>

        <div class="faq-question">
            <div class="faq-question-content">
                <div class="question-text">Apakah donasi saya dapat diberikan secara anonim?</div>
                <svg class="arrow-icon" viewBox="0 0 24 24">
                    <path d="M7 10l5 5 5-5z"></path>
                </svg>
            </div>
            <div class="answer">
                Jawaban Pertanyaan 3
            </div>
        </div>

        <div class="faq-question">
            <div class="faq-question-content">
                <div class="question-text">Saya baru mendaftar kegiatan. Kapan saya dihubungi oleh panti sosial?</div>
                <svg class="arrow-icon" viewBox="0 0 24 24">
                    <path d="M7 10l5 5 5-5z"></path>
                </svg>
            </div>
            <div class="answer">
                Jawaban Pertanyaan 4
            </div>
        </div>
    </div>

    <div class="section-divider"></div>

    <div class="faq-section">
        <h2 class="faq-subtitle">Terkait Panti Sosial</h2>
        <div class="faq-question">
            <div class="faq-question-content">
                <div class="question-text">Kapan saya harus menghubungi donatur/pendaftar relawan?</div>
                <svg class="arrow-icon" viewBox="0 0 24 24">
                    <path d="M7 10l5 5 5-5z"></path>
                </svg>
            </div>
            <div class="answer">
                Jawaban Pertanyaan 1
            </div>
        </div>

        <div class="faq-question">
            <div class="faq-question-content">
                <div class="question-text">Apakah saya harus mengabarkan donaturterkait donasi mereka?</div>
                <svg class="arrow-icon" viewBox="0 0 24 24">
                    <path d="M7 10l5 5 5-5z"></path>
                </svg>
            </div>
            <div class="answer">
                Jawaban Pertanyaan 2
            </div>
        </div>

        <div class="faq-question">
            <div class="faq-question-content">
                <div class="question-text">Pertanyaan 3</div>
                <svg class="arrow-icon" viewBox="0 0 24 24">
                    <path d="M7 10l5 5 5-5z"></path>
                </svg>
            </div>
            <div class="answer">
                Jawaban Pertanyaan 3
            </div>
        </div>
    </div>
    <div class="footer">
        <img src="image/footer/copyright.png" alt="Copyright" height="25px">
    </div>
</div>

<script>
    const faqQuestions = document.querySelectorAll('.faq-question-content');

    faqQuestions.forEach(question => {
        question.addEventListener('click', () => {
            const parent = question.parentElement;
            parent.classList.toggle('active');
        });
    });
</script>

</body>
</html>
