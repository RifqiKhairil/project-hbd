<?php
require_once __DIR__ . "/auth/token.php";

if (!isUserAuthenticated()) {
    header("Location: /auth/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>HEPIBESDEEEE LUSIIII</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>
        /* =========================
           BODY
        ========================= */

        body {
            background-color: #ffe263;
            overflow-x: hidden;
            overflow-y: auto;
            scroll-behavior: smooth;

            opacity: 0;
            animation: halamanMasuk 1s ease forwards;
        }

        @keyframes halamanMasuk {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .container {
            width: 100%;
        }

        .row-utama {
            min-height: 500px;
        }


        /* =========================
           KOLOM
        ========================= */

        .kolom {
            display: flex;
            align-items: center;
            justify-content: center;
        }


        /* =========================
           CAROUSEL
        ========================= */

        main {
            width: 100%;
            height: 430px;
            position: relative;
        }

        #carousel {
            position: relative;
            width: 100%;
            height: 350px;

            top: 50%;
            transform: translateY(-50%);

            overflow: hidden;

            opacity: 0;
            animation: carouselMasuk 1.2s ease 0.1s forwards;
        }

        @keyframes carouselMasuk {

            from {
                opacity: 0;
                transform:
                    translateY(-50%) scale(0.85);
            }

            to {
                opacity: 1;
                transform:
                    translateY(-50%) scale(1);
            }

        }

        #carousel div {
            position: absolute;

            transition:
                transform 1s,
                left 1s,
                opacity 1s,
                z-index 0s;

            opacity: 1;

            cursor: pointer;
        }


        /* FOTO */

        #carousel div img {
            display: block !important;
            width: 600px;
            height: 600px;

            object-fit: cover;

            border-radius: 20px;

            transition:
                width 1s,
                height 1s;

            animation: fotoMuncul 1.2s ease forwards;
        }

        @keyframes fotoMuncul {

            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }

        }


        /* KIRI PALING BELAKANG */

        #carousel div.hideLeft {
            left: 0%;
            opacity: 0;

            transform:
                translateY(50%) translateX(-50%);
        }

        #carousel div.hideLeft img {
            width: 150px;
            height: 150px;
        }


        /* KANAN PALING BELAKANG */

        #carousel div.hideRight {
            left: 100%;
            opacity: 0;

            transform:
                translateY(50%) translateX(-50%);
        }

        #carousel div.hideRight img {
            width: 150px;
            height: 150px;
        }


        /* KIRI */

        #carousel div.prev {
            z-index: 5;
            left: 30%;

            transform:
                translateY(50px) translateX(-50%);
        }

        #carousel div.prev img {
            width: 210px;
            height: 210px;
        }


        /* KIRI BELAKANG */

        #carousel div.prevLeftSecond {
            z-index: 4;
            left: 15%;
            opacity: .7;

            transform:
                translateY(50%) translateX(-50%);
        }

        #carousel div.prevLeftSecond img {
            width: 150px;
            height: 150px;
        }


        /* TENGAH */

        #carousel div.selected {
            opacity: 1 !important;
            z-index: 10;
            left: 50%;

            transform:
                translateY(0px) translateX(-50%);
        }

        #carousel div.selected img {
            width: 270px;
            height: 270px;
        }


        /* KANAN */

        #carousel div.next {
            z-index: 5;
            left: 70%;

            transform:
                translateY(50px) translateX(-50%);
        }

        #carousel div.next img {
            width: 210px;
            height: 210px;
        }


        /* KANAN BELAKANG */

        #carousel div.nextRightSecond {
            z-index: 4;
            left: 85%;
            opacity: .7;

            transform:
                translateY(50%) translateX(-50%);
        }

        #carousel div.nextRightSecond img {
            width: 150px;
            height: 150px;
        }


        /* =========================
           BAGIAN KANAN
        ========================= */

        .bagian-kanan {
            width: 100%;
            text-align: center;

            opacity: 0;

            animation:
                tulisanMasuk 1s ease 0.5s forwards;
        }

        @keyframes tulisanMasuk {

            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }

        }

        .bagian-kanan h2 {
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 26px;
        }

        .bagian-kanan p {
            margin-bottom: 20px;
            font-weight: 500;
        }


        /* =========================
           TOMBOL MULAI
        ========================= */

        .bagian-kanan .btn {
            opacity: 0;

            animation:
                tombolMasuk 0.8s ease 1.1s forwards;
        }

        @keyframes tombolMasuk {

            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }


        /* =========================
           SECTION
        ========================= */

        #text-satu {
            min-height: 500px;

            padding-top: 80px;
            padding-bottom: 80px;
        }


        /* =========================
           CARD
        ========================= */

        .note-card {
            min-height: 220px;

            padding: 25px;

            border-radius: 5px;

            box-shadow:
                3px 5px 10px rgba(0, 0, 0, 0.15);

            transform:
                translateY(60px) rotate(-1deg);

            opacity: 0;

            transition:
                transform 0.8s ease,
                opacity 0.8s ease;
        }


        /* CARD SAAT MASUK LAYAR */

        .note-card.show {
            opacity: 1;

            transform:
                translateY(0) rotate(-1deg);
        }


        /* CARD KEDUA SEDIKIT TERLAMBAT */

        #text-satu .col-md-6:nth-child(2) .note-card.show {
            transition-delay: 0.2s;
        }


        /* HOVER */

        .note-card.show:hover {
            transform:
                translateY(-5px) rotate(0deg);
        }

        .note-card h3 {
            font-weight: bold;
            margin-bottom: 15px;
        }

        .note-card p {
            line-height: 1.8;
        }


        /* =========================
           MUSIC
        ========================= */

        .music-floating {
            position: fixed;

            right: 20px;
            bottom: 20px;

            width: 220px;

            background: rgba(255, 253, 240, 0.96);

            padding: 12px;

            border-radius: 15px;

            box-shadow:
                0 5px 20px rgba(0, 0, 0, 0.2);

            z-index: 9999;

            opacity: 0;

            animation:
                musicMasuk 0.8s ease 1.4s forwards;
        }

        @keyframes musicMasuk {

            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }

        .music-header {
            display: flex;

            align-items: center;
            justify-content: space-between;

            cursor: pointer;

            font-weight: bold;

            user-select: none;
        }

        .music-header span {
            font-size: 15px;
        }

        .music-content {
            display: none;
            margin-top: 10px;
        }

        .music-list {
            display: flex;

            flex-direction: column;

            gap: 6px;
        }

        .music-list button {
            border: none;

            background: #ffe263;

            padding: 8px 10px;

            border-radius: 10px;

            text-align: left;

            cursor: pointer;

            font-size: 13px;

            transition: 0.2s;
        }

        .music-list button:hover {
            transform: scale(1.03);
        }

        .music-content audio {
            width: 100%;
            margin-top: 10px;
        }


        /* =========================
           FOOTER
        ========================= */

        .footer-ucapan {
            width: 85%;
            max-width: 900px;

            margin: 45px auto 20px;

            padding: 30px 25px 22px;

            text-align: center;

            background: rgba(255, 253, 240, 0.7);

            border-radius: 25px;

            box-shadow:
                0 -4px 12px rgba(0, 0, 0, 0.06);

            animation:
                footerMuncul 1s ease;
        }

        .footer-line {
            width: 50px;
            height: 3px;

            background: #222;

            border-radius: 10px;

            margin: 0 auto 12px;
        }

        .footer-ucapan h3 {
            font-size: 22px;

            font-weight: bold;

            margin-bottom: 10px;
        }

        .footer-ucapan p {
            max-width: 650px;

            margin: 0 auto;

            font-size: 13px;

            line-height: 1.6;

            font-weight: 500;
        }

        .footer-credit {
            margin-top: 15px !important;

            font-size: 11px !important;

            opacity: 0.65;
        }

        @keyframes footerMuncul {

            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }


        /* =========================
           RESPONSIVE HP
        ========================= */

        @media (max-width: 767px) {

            body {
                overflow-x: hidden;
                overflow-y: auto;
            }

            .container {
                padding-top: 20px;
                padding-bottom: 30px;
            }

            .row-utama {
                min-height: auto;
            }

            .kolom {
                width: 100%;
            }


            /* CAROUSEL HP */

            main {
                height: 330px;
                width: 100%;
            }

            #carousel {
                height: 280px;
                width: 100%;
            }


            /* FOTO TENGAH */

            #carousel div.selected img {
                width: 190px;
                height: 190px;
            }


            /* FOTO SAMPING */

            #carousel div.prev img,
            #carousel div.next img {
                width: 140px;
                height: 140px;
            }


            /* FOTO BELAKANG */

            #carousel div.prevLeftSecond img,
            #carousel div.nextRightSecond img {
                width: 100px;
                height: 100px;
            }


            /* POSISI KIRI */

            #carousel div.prev {
                left: 20%;
            }

            #carousel div.prevLeftSecond {
                left: 5%;
            }


            /* POSISI KANAN */

            #carousel div.next {
                left: 80%;
            }

            #carousel div.nextRightSecond {
                left: 95%;
            }


            /* UCAPAN */

            .bagian-kanan {
                margin-top: 10px;
                padding: 20px 10px;
            }

            .bagian-kanan h2 {
                font-size: 20px;
            }

            .bagian-kanan p {
                font-size: 13px;
                font-weight: 500;
            }


            /* SECTION */

            #text-satu {
                padding-top: 50px;
                padding-bottom: 40px;
            }


            /* CARD */

            .note-card {
                min-height: 200px;

                padding: 20px;

                transform:
                    translateY(50px) rotate(-1deg);
            }

            .note-card.show {
                transform:
                    translateY(0) rotate(-1deg);
            }

            .note-card h3 {
                font-size: 21px;
            }

            .note-card p {
                font-size: 14px;
            }


            /* MUSIC */

            .music-floating {
                right: 10px;
                bottom: 10px;

                width: 190px;
            }


            /* FOOTER */

            .footer-ucapan {
                width: 90%;

                margin-top: 30px;

                padding: 22px 16px 16px;

                border-radius: 20px;
            }

            .footer-line {
                width: 40px;

                margin-bottom: 10px;
            }

            .footer-ucapan h3 {
                font-size: 19px;

                margin-bottom: 8px;
            }

            .footer-ucapan p {
                font-size: 12px;

                line-height: 1.6;
            }

            .footer-credit {
                margin-top: 12px !important;

                font-size: 10px !important;
            }

        }
    </style>

</head>


<body>


    <div class="container">


        <!-- =========================
             BAGIAN ATAS
        ========================= -->

        <div class="row row-utama align-items-center">


            <!-- CAROUSEL -->

            <div class="col-12 col-md-6 kolom">

                <main>

                    <div id="carousel">

                        <div class="hideLeft">
                            <img src="/assets/img/f1.jpg">
                        </div>

                        <div class="prevLeftSecond">
                            <img src="/assets/img/f2.jpeg">
                        </div>

                        <div class="prev">
                            <img src="/assets/img/f3.jpeg">
                        </div>

                        <div class="selected">
                            <img src="/assets/img/f4.jpeg">
                        </div>

                        <div class="next">
                            <img src="/assets/img/f5.jpeg">
                        </div>

                        <div class="nextRightSecond">
                            <img src="/assets/img/f6.jpeg">
                        </div>

                        <div class="hideRight">
                            <img src="/assets/img/f7.jpeg">
                        </div>

                    </div>

                </main>

            </div>


            <!-- BAGIAN KANAN -->

            <div class="col-12 col-md-6 kolom">

                <div class="bagian-kanan">

                    <h2>
                        Selamat Ulang Tahun
                        Rizka Lusiana Dwi Astuti🤍
                    </h2>

                    <p>
                        Selamat ulang tahun yang ke-17 yaa,
                        semoga panjang umur, sehat selalu,
                        dan bahagia selalu. Semoga semua impianmu
                        tercapai, selalu diberikan kemudahan dalam
                        segala hal, dan jadi anak yang sholehah,
                        berbakti patuh kepada orang tua.
                    </p>

                    <button
                        class="btn btn-dark rounded-pill px-4"
                        onclick="mulaiHalaman()">

                        Mulai

                    </button>

                </div>

            </div>

        </div>


        <!-- =========================
             SECTION BAWAH
        ========================= -->

        <section id="text-satu" class="text-center">

            <div class="container">

                <div class="row g-4">


                    <!-- CARD KIRI -->

                    <div class="col-12 col-md-6">

                        <div class="note-card bg-warning-subtle text-dark fw-bold">

                            <h3>
                                Sedikit kalimat dari Rifqi..
                            </h3>

                            <p>
                                Sebelumnya aku mau bilang terimakasih banyak,
                                karna setelah datangnya kamu aku jadi punya alasan
                                buat ngejalanin hari hariku dengan senyuman,
                                sebelumnya hidupku sangat amat flat, makanya kadang
                                kalo chatingan sama kamu sifat clingy ku keluar..
                                aku minta maaf kalo itu ngebuatmu jadi risih ataupun
                                ilfeel :<
                                    Kalo kamu mulai ngerasa ga nyaman sama aku,
                                    bilang aja yaaa?? Kalo kamu lagi ada problem,
                                    pengen cerita, atau pengen curhat,
                                    aku selalu di belakang kamu buat dengerin kamu,
                                    simplenya 'ketika dunia lagi ga berpihak kepadamu,
                                masih ada aku yang selalu ada buat kamu..'

                                    Aku Berharap kita gabakal asing ataupun
                                    lost contact nantinya:<
                                    </p>

                        </div>

                    </div>


                    <!-- CARD KANAN -->

                    <div class="col-12 col-md-6">

                        <div class="note-card bg-warning-subtle text-dark fw-bold">

                            <h3>
                                Pesanmu untuk Rifqi 🌷
                            </h3>

                            <form
                                action="simpan_pesan.php"
                                method="POST">

                                <input
                                    type="text"
                                    name="nama"
                                    class="form-control mb-3"
                                    placeholder="Namamu..."
                                    maxlength="100"
                                    required>

                                <textarea
                                    name="pesan"
                                    class="form-control mb-3"
                                    rows="5"
                                    placeholder="Tulis pesan untuk Rifqi..."
                                    required></textarea>

                                <button
                                    type="submit"
                                    class="btn btn-dark rounded-pill px-4">

                                    Kirim Pesan 🤍

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- =========================
             FOOTER
        ========================= -->

        <footer class="footer-ucapan">

            <div class="footer-line"></div>

            <h3>
                Terima Kasih 🤍
            </h3>

            <p>
                Makasih yaa udah mau ngeluangin waktu buat liat
                website kecil yang aku bikin ini.
                Maaf kalau masih sederhana dan masih banyak kurangnya,
                aku cuma bisa bikin sebisanya aku.
                Tapi semoga kamu sukaa yaa 🌷
            </p>

            <p class="footer-credit">
                Dibuat oleh RifqiKhairil, 02 - 10 - 2026
            </p>

        </footer>


    </div>


    <!-- =========================
         FLOATING MUSIC
    ========================= -->

    <div class="music-floating">

        <div
            class="music-header"
            onclick="toggleMusic()">

            <span>
                🎵 music
            </span>

            <span id="music-arrow">
                ▲
            </span>

        </div>


        <div
            id="music-content"
            class="music-content">

            <div class="music-list">

                <button
                    onclick="playMusic('assets/music/Lesung-Pipi.mp3')">

                    ▶ Lesung Pipi - Raim Laode

                </button>

                <button
                    onclick="playMusic('assets/music/Shape-Of-Myheart.mp3')">

                    ▶ Shape of My Heart - Westlife

                </button>

                <button
                    onclick="playMusic('assets/music/To-The-Bone.mp3')">

                    ▶ To the Bone - Pamungkas

                </button>

            </div>

            <audio
                id="music"
                controls>
            </audio>

        </div>

    </div>


    <!-- =========================
         BOOTSTRAP
    ========================= -->

    <script src="assets/js/bootstrap.bundle.js"></script>


    <script>
        /* =========================
           CAROUSEL
        ========================= */

        function moveToSelected(element) {

            if (element == "next") {

                var selected =
                    $(".selected").next();

            } else if (element == "prev") {

                var selected =
                    $(".selected").prev();

            } else {

                var selected = element;

            }


            if (selected.length === 0) {

                if (element == "next") {

                    selected =
                        $("#carousel div").first();

                } else {

                    selected =
                        $("#carousel div").last();

                }

            }


            var next =
                $(selected).next();

            var prev =
                $(selected).prev();

            var prevSecond =
                $(prev).prev();

            var nextSecond =
                $(next).next();


            $(selected)
                .removeClass()
                .addClass("selected");


            $(prev)
                .removeClass()
                .addClass("prev");


            $(next)
                .removeClass()
                .addClass("next");


            $(nextSecond)
                .removeClass()
                .addClass("nextRightSecond");


            $(prevSecond)
                .removeClass()
                .addClass("prevLeftSecond");


            $(nextSecond)
                .nextAll()
                .removeClass()
                .addClass("hideRight");


            $(prevSecond)
                .prevAll()
                .removeClass()
                .addClass("hideLeft");

        }


        /* =========================
           KLIK FOTO
        ========================= */

        $('#carousel div').click(function() {

            moveToSelected($(this));

        });


        /* =========================
           KEYBOARD
        ========================= */

        $(document).keydown(function(e) {

            switch (e.which) {

                case 37:

                    moveToSelected('prev');

                    break;

                case 39:

                    moveToSelected('next');

                    break;

                default:

                    return;

            }

            e.preventDefault();

        });


        /* =========================
           AUTO CAROUSEL
        ========================= */

        setInterval(function() {

            moveToSelected('next');

        }, 2500);


        /* =========================
           TOMBOL MULAI
        ========================= */

        function mulaiHalaman() {

            document
                .getElementById("text-satu")
                .scrollIntoView({
                    behavior: "smooth"
                });

        }


        /* =========================
           MUSIC
        ========================= */

        function toggleMusic() {

            var content =
                document.getElementById("music-content");

            var arrow =
                document.getElementById("music-arrow");


            if (content.style.display === "block") {

                content.style.display = "none";

                arrow.innerHTML = "▲";

            } else {

                content.style.display = "block";

                arrow.innerHTML = "▼";

            }

        }


        /* =========================
           PLAY MUSIC
        ========================= */

        function playMusic(lagu) {

            var music =
                document.getElementById("music");

            music.src = lagu;

            music.play();

        }


        /* =========================
           ANIMASI CARD SAAT SCROLL
        ========================= */

        const cards =
            document.querySelectorAll(".note-card");


        const observer =
            new IntersectionObserver(

                function(entries) {

                    entries.forEach(
                        function(entry) {

                            if (entry.isIntersecting) {

                                entry.target.classList.add("show");

                            }

                        }
                    );

                },

                {
                    threshold: 0.2
                }

            );


        cards.forEach(
            function(card) {

                observer.observe(card);

            }
        );
    </script>


</body>

</html>