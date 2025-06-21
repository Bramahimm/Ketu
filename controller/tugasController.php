<?php
require_once __DIR__ . '/../includes/init.php';
require_once __DIR__ . '/../models/Tugas.php';

if (!isset($_SESSION['user'])) {
  header("Location: ../index.php");
  exit;
}

$idUser = $_SESSION['user']['id'];
$roleUser = $_SESSION['user']['role'];

// Handle form tambah tugas
if (isset($_POST['tambah_task'])) {
  $result = Tugas::tambah($conn, $_POST, $idUser);
  $message = $result['message'];
  $messageType = $result['status'];
}

// Handle update tugas
if (isset($_POST['edit_task'])) {
  $result = Tugas::update($conn, $_POST, $idUser);
  $message = $result['message'];
  $messageType = $result['status'];
}

// Handle hapus tugas
if (isset($_GET['hapus'])) {
  $idTugas = (int) $_GET['hapus'];
  $result = Tugas::hapus($conn, $idTugas, $idUser);
  $message = $result['message'];
  $messageType = $result['status'];
}

// Ambil semua tugas user ini
$tugasList = Tugas::getAllByUser($conn, $idUser);

// Jika ada tugas yang akan diedit
$editData = null;
if (isset($_GET['edit'])) {
  $editData = Tugas::getOne($conn, (int) $_GET['edit'], $idUser);
}

$title = 'Tugas';
include __DIR__ . '/../views/tugas.php';
