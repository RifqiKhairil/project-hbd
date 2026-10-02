<?php

$dbHost = getenv("DB_HOST");
$dbName = getenv("DB_NAME");
$dbUser = getenv("DB_USER");
$dbPassword = getenv("DB_PASSWORD");
$dbPort = (int) (getenv("DB_PORT") ?: 3306);

if (!$dbHost || !$dbName || !$dbUser || $dbPassword === false) {
    error_log("Database environment variables are not configured.");
    http_response_code(500);
    exit("Layanan pesan belum dikonfigurasi.");
}

/* Koneksi database dengan SSL */
$koneksi = mysqli_init();

mysqli_ssl_set(
    $koneksi,
    null,
    null,
    null,
    null,
    null
);

if (!mysqli_real_connect(
    $koneksi,
    $dbHost,
    $dbUser,
    $dbPassword,
    $dbName,
    $dbPort,
    null,
    MYSQLI_CLIENT_SSL
)) {
    error_log("Database connection failed: " . mysqli_connect_error());
    http_response_code(500);
    exit("Layanan pesan sedang tidak tersedia.");
}

mysqli_set_charset($koneksi, "utf8mb4");