<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require_once __DIR__ . '/database.php';

require_once __DIR__ . '/helpers.php';

//variabel global dari session user
$namaUser = $_SESSION['user']['nama'] ?? null;
$idUser = $_SESSION['user']['id'] ?? null;
$roleUser = $_SESSION['user']['role'] ?? null;
