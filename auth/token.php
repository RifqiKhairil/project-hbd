<?php

function isUserAuthenticated(): bool
{
    $secret = getenv("AUTH_SECRET");
    $token = $_COOKIE["hbd_auth"] ?? "";

    if (!$secret || !preg_match('/\A([0-9]+)\.([a-f0-9]{64})\z/', $token, $matches)) {
        return false;
    }

    if ((int) $matches[1] < time()) {
        return false;
    }

    $signature = hash_hmac("sha256", $matches[1], $secret);

    return hash_equals($signature, $matches[2]);
}

function setUserLoginCookie(): void
{
    $secret = getenv("AUTH_SECRET");

    if (!$secret) {
        return;
    }

    $expires = time() + 86400;
    $token = $expires . "." . hash_hmac("sha256", (string) $expires, $secret);
    $isSecure = (!empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] !== "off") || getenv("VERCEL") === "1";

    setcookie("hbd_auth", $token, [
        "expires" => $expires,
        "path" => "/",
        "secure" => $isSecure,
        "httponly" => true,
        "samesite" => "Lax",
    ]);
}

function clearUserLoginCookie(): void
{
    $isSecure = (!empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] !== "off") || getenv("VERCEL") === "1";

    setcookie("hbd_auth", "", [
        "expires" => time() - 3600,
        "path" => "/",
        "secure" => $isSecure,
        "httponly" => true,
        "samesite" => "Lax",
    ]);
}
