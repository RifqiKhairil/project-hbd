<?php

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($request === '/' || $request === '/index.php' || $request === '') {
    require_once __DIR__ . '/../index.php';
    exit;
}

if ($request === '/auth/login.php') {
    require_once __DIR__ . '/../auth/login.php';
    exit;
}

http_response_code(404);
echo "404 - Halaman tidak ditemukan";
