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

$koneksi = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName, $dbPort);

if (!$koneksi) {
    error_log("Database connection failed: " . mysqli_connect_error());
    http_response_code(500);
    exit("Layanan pesan sedang tidak tersedia.");
}

mysqli_set_charset($koneksi, "utf8mb4");
