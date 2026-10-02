<?php
require_once __DIR__ . "/auth/token.php";

if (!isUserAuthenticated()) {
    header("Location: /auth/login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Allow: POST");
    http_response_code(405);
    exit("Metode tidak diizinkan.");
}

$nama = trim((string) ($_POST["nama"] ?? ""));
$pesan = trim((string) ($_POST["pesan"] ?? ""));

if ($nama === "" || $pesan === "" || strlen($nama) > 400) {
    echo "<script>alert('Nama dan pesan wajib diisi!'); history.back();</script>";
    exit;
}

require_once __DIR__ . "/koneksi.php";

$statement = mysqli_prepare($koneksi, "INSERT INTO tb_pesan (nama, pesan) VALUES (?, ?)");
mysqli_stmt_bind_param($statement, "ss", $nama, $pesan);

if (mysqli_stmt_execute($statement)) {
    echo "<script>alert('Pesan berhasil dikirim 🤍'); history.back();</script>";
} else {
    error_log("Message insert failed: " . mysqli_stmt_error($statement));
    http_response_code(500);
    echo "Pesan belum berhasil disimpan. Silakan coba lagi.";
}

mysqli_stmt_close($statement);
