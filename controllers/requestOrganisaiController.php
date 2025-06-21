<?php
require_once __DIR__ . '/../includes/init.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'anggota') {
  header("Location: index.php?route=login");
  exit;
}

$idUser = $_SESSION['user']['id'];
$message = '';
$messageType = '';

if (isset($_POST['request_gabung'])) {
  $idOrganisasi = (int) $_POST['idOrganisasi'];
  $stmt = $conn->prepare("SELECT * FROM request_organisasi WHERE idUser = ? AND idOrganisasi = ? AND status = 'pending'");
  $stmt->bind_param("ii", $idUser, $idOrganisasi);
  $stmt->execute();
  $check = $stmt->get_result();

  if ($check->num_rows > 0) {
    $message = 'Anda sudah mengajukan permintaan ke organisasi ini sebelumnya.';
    $messageType = 'error';
  } else {
    $stmt = $conn->prepare("INSERT INTO request_organisasi (idUser, idOrganisasi, status, tanggalRequest) VALUES (?, ?, 'pending', NOW())");
    $stmt->bind_param("ii", $idUser, $idOrganisasi);
    if ($stmt->execute()) {
      $message = 'Permintaan bergabung berhasil dikirim.';
      $messageType = 'success';
    } else {
      $message = 'Terjadi kesalahan.';
      $messageType = 'error';
    }
  }
}

$title = 'Gabung Organisasi';
include __DIR__ . '/../views/requestOrganisasi.php';
