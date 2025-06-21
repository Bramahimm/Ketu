<?php
require_once __DIR__ . '/../includes/init.php';
require_once __DIR__ . '/../models/Kegiatan.php';

requireRole('pengurus');

$idUser = $_SESSION['user']['id'];

$message = '';
$messageType = '';
$editData = null;
$query = "SELECT idOrganisasi FROM user_organisasi WHERE idUser = ? AND role = 'pengurus' LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $idUser);
$stmt->execute();
$stmt->bind_result($idOrganisasi);
$stmt->fetch();
$stmt->close();

if (isset($_POST['tambah_kegiatan'])) {
  $result = Kegiatan::tambah($conn, $_POST, $idUser);
  $message = $result['message'];
  $messageType = $result['status'];
}

if (isset($_POST['edit_kegiatan'])) {
  $result = Kegiatan::edit($conn, $_POST, $idUser);
  $message = $result['message'];
  $messageType = $result['status'];
}

if (isset($_GET['hapus'])) {
  $result = Kegiatan::hapus($conn, $_GET['hapus'], $idUser);
  $message = $result['message'];
  $messageType = $result['status'];
}

$kegiatanList = Kegiatan::getByUser($conn, $idUser);

if (isset($_GET['edit'])) {
  $editData = Kegiatan::getOne($conn, $_GET['edit'], $idUser);
}

$title = 'Jadwal Kegiatan Pengurus';
include __DIR__ . '/../views/jadwalKegiatanPengurus.php';
