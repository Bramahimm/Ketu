<?php
require_once __DIR__ . '/../includes/init.php';
require_once __DIR__ . '/../models/Tugas.php';

if (!isset($_SESSION['user'])) {
  header("Location: index.php?route=login");
  exit;
}

$idUser = $_SESSION['user']['id'];
$namaUser = $_SESSION['user']['nama'];

$tugasList = Tugas::getAllByUser($conn, $idUser);
$title = 'Orgenius - Anggota';

include __DIR__ . '/../views/dashboardAnggota.php';
