<?php
session_start();
include '../../src/includes/koneksi.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: /ketu/public/index.php");
  exit;
}

if (isset($_POST['update_tugas'])) {
  $id = intval($_POST['id']);
  $judul = $_POST['judul'];
  $deskripsi = $_POST['deskripsi'];
  $kategori = $_POST['kategori'];
  $deadline = $_POST['deadline'];
  $prioritas = $_POST['prioritas'];
  $user_id = $_SESSION['user_id'];

  $sql = "UPDATE tugas SET judul = ?, deskripsi = ?, kategori = ?, deadline = ?, prioritas = ? 
          WHERE id = ? AND dibuat_oleh = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssssii", $judul, $deskripsi, $kategori, $deadline, $prioritas, $id, $user_id);

  if ($stmt->execute()) {
    header("Location: /ketu/public/user/dashboard.php");
    exit;
  } else {
    echo "Gagal update: " . $stmt->error;
  }
}
?>