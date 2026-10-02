<?php
require_once __DIR__ . "/token.php";

clearUserLoginCookie();

header("Location: /auth/login.php");
exit;
