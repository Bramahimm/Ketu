<?php
// File: controllers/verifikasiRequestController.php
require_once __DIR__ . '/../includes/init.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'pengurus') {
  header("Location: index.php?route=login");
  exit;
}

$idUser = $_SESSION['user']['id'];
$message = '';
$messageType = '';

// Ambil organisasi yang dikelola user ini
$orgQuery = $conn->prepare("SELECT idOrganisasi FROM user_organisasi WHERE idUser = ? AND role = 'pengurus'");
$orgQuery->bind_param("i", $idUser);
$orgQuery->execute();
$orgResult = $orgQuery->get_result();

$orgIds = [];
while ($row = $orgResult->fetch_assoc()) {
  $orgIds[] = $row['idOrganisasi'];
}

if (empty($orgIds)) {
  $requests = [];
} else {
  $in = implode(',', array_fill(0, count($orgIds), '?'));
  $types = str_repeat('i', count($orgIds));
  $stmt = $conn->prepare("SELECT r.idRequest, u.nama, o.namaOrganisasi, r.status, r.tanggalRequest
    FROM request_organisasi r
    JOIN user u ON r.idUser = u.idUser
    JOIN organisasi o ON r.idOrganisasi = o.idOrganisasi
    WHERE r.idOrganisasi IN ($in) AND r.status = 'pending'");
  $stmt->bind_param($types, ...$orgIds);
  $stmt->execute();
  $requests = $stmt->get_result();
}

if (isset($_GET['action'], $_GET['id'])) {
  $idRequest = (int) $_GET['id'];
  $status = ($_GET['action'] === 'accept') ? 'diterima' : 'ditolak';

  // Update status
  $update = $conn->prepare("UPDATE request_organisasi SET status = ? WHERE idRequest = ?");
  $update->bind_param("si", $status, $idRequest);
  if ($update->execute() && $status === 'diterima') {
    // Tambahkan ke tabel user_organisasi jika diterima
    $get = $conn->prepare("SELECT idUser, idOrganisasi FROM request_organisasi WHERE idRequest = ?");
    $get->bind_param("i", $idRequest);
    $get->execute();
    $res = $get->get_result()->fetch_assoc();

    $insert = $conn->prepare("INSERT IGNORE INTO user_organisasi (idUser, idOrganisasi, role) VALUES (?, ?, 'anggota')");
    $insert->bind_param("ii", $res['idUser'], $res['idOrganisasi']);
    $insert->execute();
  }

  header("Location: index.php?route=verifikasi-request");
  exit;
}

$title = 'Verifikasi Permintaan';
include __DIR__ . '/../views/verifikasiRequest.php';
