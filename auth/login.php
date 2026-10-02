<?php
require_once __DIR__ . "/token.php";

$username = getenv("LOGIN_USERNAME") ?: "";
$password = getenv("LOGIN_PASSWORD") ?: "";
$secret = getenv("AUTH_SECRET") ?: "";

$error = "";

if (isset($_POST['login'])) {

    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);

    if ($username !== "" && $password !== "" && $secret !== "" && hash_equals($username, $user) && hash_equals($password, $pass)) {
        setUserLoginCookie();

        header("Location: login.php?success=1");
        exit;
    } else {

        $error = $secret === "" ? "Login belum dikonfigurasi." : "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>HEPIBESDEEEE LUSIII</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #c14784;
            overflow: hidden;
        }


        /* =========================
           MAWAR
        ========================= */

        .rose {
            position: fixed;
            top: -50px;
            font-size: 25px;
            opacity: 0.8;
            pointer-events: none;
            z-index: 0;
            animation: jatuh linear forwards;
        }

        @keyframes jatuh {

            0% {
                transform: translateY(-50px) rotate(0deg);
            }

            100% {
                transform: translateY(110vh) rotate(360deg);
            }

        }


        /* =========================
           CARD
        ========================= */

        .container {
            position: relative;
            z-index: 2;
            transition: 0.8s ease;
        }


        /* CARD MULAI TERLIPAT */

        .container.terlipat {
            transform:
                scale(0.25) rotate(-12deg);

            opacity: 0;
        }


        /* =========================
           PESAWAT KERTAS
        ========================= */

        #paperPlane {

            position: fixed;

            width: 0;
            height: 0;

            left: 50%;
            top: 50%;

            z-index: 999;

            opacity: 0;

            pointer-events: none;

            transform:
                translate(-50%, -50%) rotate(-5deg);

        }


        /*
        BADAN PESAWAT
        */

        #paperPlane .plane-body {

            position: absolute;

            width: 150px;
            height: 90px;

            background: #ffd1e2;

            clip-path: polygon(0% 45%,
                    100% 0%,
                    55% 100%,
                    45% 57%);

        }


        /*
        LIPATAN SAYAP
        */

        #paperPlane .plane-wing {

            position: absolute;

            width: 115px;
            height: 45px;

            background: #f3a8c5;

            left: 4px;
            top: 42px;

            clip-path: polygon(0% 0%,
                    100% 0%,
                    48% 100%);

        }


        /*
        ANIMASI PESAWAT
        */

        #paperPlane.terbang {

            opacity: 1;

            animation:
                pesawatTerbang 1.8s cubic-bezier(.25, .8, .25, 1) forwards;

        }


        @keyframes pesawatTerbang {

            0% {

                left: 50%;
                top: 50%;

                transform:
                    translate(-50%, -50%) rotate(-5deg) scale(0.15);

                opacity: 0;

            }


            15% {

                opacity: 1;

            }


            35% {

                transform:
                    translate(-50%, -50%) rotate(-8deg) scale(0.45);

            }


            100% {

                left: 120vw;
                top: -10vh;

                transform:
                    translate(-50%, -50%) rotate(-20deg) scale(0.8);

                opacity: 0;

            }

        }


        /* =========================
           INPUT
        ========================= */

        .form-control {

            border: 3px solid #f3b6d2;

            transition: 0.3s;

        }


        .form-control:focus {

            border-color: #c14784;

            box-shadow:
                0 0 12px rgba(255, 255, 255, 0.5);

        }


        /* =========================
           BUTTON
        ========================= */

        .btn {

            transition: 0.3s;

        }


        .btn:hover {

            transform: scale(1.08);

            box-shadow:
                0 5px 15px rgba(255, 255, 255, 0.4);

        }

        .typing-text {
            width: fit-content;
            font-family: 'Fredoka', 'Poppins', sans-serif;
            font-weight: 500;
            margin: auto;
            position: relative;
            overflow: hidden;
            white-space: nowrap;
            animation: typing 3s steps(20) infinite alternate;
        }

        .typing-text::after {
            content: "";
            display: inline-block;
            width: 2px;
            height: 25px;
            background: white;
            margin-left: 5px;
            vertical-align: middle;
            animation: kedip 0.7s infinite;
        }

        @keyframes typing {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }

        @keyframes kedip {
            50% {
                opacity: 0;
            }
        }
    </style>

</head>


<body
    class="d-flex justify-content-center align-items-center vh-100">


    <!-- =========================
         PESAWAT KERTAS
    ========================= -->

    <div id="paperPlane">

        <div class="plane-body"></div>

        <div class="plane-wing"></div>

    </div>


    <!-- =========================
         LOGIN
    ========================= -->

    <div class="container">

        <div
            class="card align-items-center text-center mx-auto rounded-4"

            style="
                height: auto;
                min-height: 30vh;
                width: 90%;
                max-width: 600px;
                background-color: #62384d;
            ">

            <div
                class="card-body w-100 rounded-4"
                style="background-color: #62384d;">


                <h2 class="text-center text-light typing-text">
                    masuukk duluu yaaa...
                </h2>


                <?php if ($error != "") { ?>

                    <p class="text-warning mt-3">

                        <?php echo $error; ?>

                    </p>

                <?php } ?>


                <form
                    method="POST"
                    id="loginForm"
                    class="mx-auto w-100"
                    style="max-width:400px;">


                    <!-- NAMA -->

                    <div class="form-floating">

                        <input
                            type="text"
                            name="username"
                            id="username"
                            class="form-control rounded-pill text-danger"
                            placeholder="Nama Panjang"
                            required>

                        <label
                            for="username"
                            class="text-danger">

                            🌷 Nama Panjang

                        </label>

                    </div>


                    <!-- PASSWORD -->

                    <div class="form-floating mt-3">

                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control rounded-pill text-danger"
                            placeholder="Tanggal Lahir"
                            required>

                        <label
                            for="password"
                            class="text-danger">

                            🎂 Tanggal Lahir

                        </label>

                    </div>


                    <!-- BUTTON -->

                    <button
                        type="submit"
                        name="login"
                        class="btn btn-light text-danger rounded-pill px-4 py-2 mt-3">

                        💗 Klik disinii... 🌹

                    </button>

                </form>


            </div>

        </div>
        <p class="text-center text-light p-2">by RifqiKhairil.</p>

    </div>


    <script src="../assets/js/bootstrap.bundle.js"></script>


    <script>
        /* =========================
           MAWAR
        ========================= */

        function buatMawar() {

            const mawar =
                document.createElement("div");

            mawar.classList.add("rose");

            mawar.innerHTML = "🌹";

            mawar.style.left =
                Math.random() * 100 + "vw";

            mawar.style.fontSize =
                (30 + Math.random() * 20) + "px";

            mawar.style.opacity =
                (0.25 + Math.random() * 2);

            mawar.style.animationDuration =
                (8 + Math.random() * 7) + "s";

            document.body.appendChild(mawar);

            setTimeout(function() {

                mawar.remove();

            }, 15000);

        }

        setInterval(buatMawar, 300);


        /* =========================
           CEK LOGIN BERHASIL
        ========================= */

        const urlParams =
            new URLSearchParams(
                window.location.search
            );

        const berhasil =
            urlParams.get("success");


        if (berhasil === "1") {

            const card =
                document.querySelector(".container");

            const pesawat =
                document.getElementById("paperPlane");


            /*
            1. CARD MENYUSUT
            */

            card.classList.add("terlipat");


            /*
            2. TUNGGU CARD TERLIPAT
            */

            setTimeout(function() {

                pesawat.classList.add("terbang");

            }, 550);


            /*
            3. SETELAH PESAWAT TERBANG
               MASUK INDEX
            */

            setTimeout(function() {

                window.location.href =
                    "../index.php";

            }, 1000);

        }
    </script>


</body>

</html>