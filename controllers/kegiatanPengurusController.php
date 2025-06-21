<?php
require_once __DIR__ . '/../includes/init.php';
require_once __DIR__ . '/../models/Kegiatan.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'pengurus') {
  header("Location: index.php?route=login");
  exit;
}

$idUser = $_SESSION['user']['id'];
$message = '';
$messageType = '';
$editData = null;

if (isset($_POST['edit_kegiatan'])) {
  $result = Kegiatan::edit($conn, $_POST, $idUser);
  $message = $result['message'];
  $messageType = $result['status'];
}

if (isset($_POST['tambah_kegiatan'])) {
  $result = Kegiatan::tambah($conn, $_POST, $idUser);
  $message = $result['message'];
  $messageType = $result['status'];
}

if (isset($_GET['hapus'])) {
  $result = Kegiatan::hapus($conn, $_GET['hapus'], $idUser);
  $message = $result['message'];
  $messageType = $result['status'];
}

$orgQuery = $conn->prepare("SELECT idOrganisasi FROM user_organisasi WHERE idUser = ? AND role = 'pengurus'");
$orgQuery->bind_param("i", $idUser);
$orgQuery->execute();
$orgResult = $orgQuery->get_result();

$organisasiIds = [];
while ($row = $orgResult->fetch_assoc()) {
  $organisasiIds[] = $row['idOrganisasi'];
}

if (empty($organisasiIds)) {
  $kegiatanList = [];
} else {
  $placeholders = implode(',', array_fill(0, count($organisasiIds), '?'));
  $stmt = $conn->prepare("SELECT * FROM kegiatan WHERE idOrganisasi IN ($placeholders) ORDER BY tanggal ASC");
  $stmt->bind_param(str_repeat('i', count($organisasiIds)), ...$organisasiIds);
  $stmt->execute();
  $kegiatanList = $stmt->get_result();
}

if (isset($_GET['edit'])) {
  $idEdit = (int) $_GET['edit'];
  $stmtEdit = $conn->prepare("SELECT * FROM kegiatan WHERE idKegiatan = ? AND idPembuat = ?");
  $stmtEdit->bind_param("ii", $idEdit, $idUser);
  $stmtEdit->execute();
  $editData = $stmtEdit->get_result()->fetch_assoc();
}

$title = 'Jadwal Kegiatan Pengurus';
include __DIR__ . '/../views/jadwalKegiatanPengurus.php';
