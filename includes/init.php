<?php
// Mulai session jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// Include file koneksi database
require_once __DIR__ . '/database.php';

// Include helpers (pastikan helper tidak mendeklarasikan ulang fungsi)
require_once __DIR__ . '/helpers.php';

// Inisialisasi variabel global dari session user
$namaUser = $_SESSION['user']['nama'] ?? null;
$idUser = $_SESSION['user']['id'] ?? null;
$roleUser = $_SESSION['user']['role'] ?? null;
