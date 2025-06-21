<?php
// controller/TugasController.php

include_once __DIR__ . '/../model/Tugas.php';
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: /ketu/public/index.php");
  exit;
}

$id = intval($_GET['id'] ?? 0);
$user_id = $_SESSION['user_id'];

$task = getTugasByIdAndUser($conn, $id, $user_id);

if (!$task) {
  die("Tugas tidak ditemukan atau bukan milik Anda.");
}

include __DIR__ . '/../view/tugas/edit.php';
