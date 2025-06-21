<?php
require_once __DIR__ . '/../includes/init.php';
requireRole('pengurus');

require_once __DIR__ . '/../models/Tugas.php';
require_once __DIR__ . '/../models/Kegiatan.php';

$idUser = $_SESSION['user']['id'] ?? null;
$message = '';
$messageType = '';
$editData = null;
$tugasAktif = Tugas::countAktifByUser($conn, $idUser);
$tugasSelesai = Tugas::countSelesaiByUser($conn, $idUser);
$tugasMingguIni = Tugas::countThisWeekByUser($conn, $idUser);
$kegiatanMingguIni = Kegiatan::countThisWeekByUser($conn, $idUser);


$tugasList = Tugas::getAllByUser($conn, $idUser);

$title = 'Dashboard Pengurus';

if (isset($_GET['hapus'])) {
  $result = Tugas::hapus($conn, (int)$_GET['hapus'], $idUser);
  $message = $result['message'];
  $messageType = $result['status'];
}

if (isset($_GET['detail'])) {
  $editData = Tugas::getOne($conn, (int)$_GET['detail'], $idUser);
}


include __DIR__ . '/../views/dashboardPengurus.php';
