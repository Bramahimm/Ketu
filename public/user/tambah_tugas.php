<?php
session_start();
include '../../src/includes/koneksi.php';

if (!isset($_SESSION['user_id'])) {
  echo "Error: Anda harus login!";
  exit();
}

if (isset($_POST['simpan_tugas'])) {
  if (empty($_POST['judul']) || empty($_POST['deskripsi']) || empty($_POST['kategori']) || empty($_POST['deadline']) || empty($_POST['prioritas'])) {
    echo "Harap lengkapi semua data!";
    exit();
  }

  $judul = htmlspecialchars($_POST['judul']);
  $deskripsi = htmlspecialchars($_POST['deskripsi']);
  $kategori = htmlspecialchars($_POST['kategori']);
  $deadline = $_POST['deadline'];
  $prioritas = $_POST['prioritas'];
  $dibuat_oleh = $_SESSION['user_id'];

  $sql = "INSERT INTO tugas (judul, deskripsi, kategori, deadline, prioritas, dibuat_oleh) VALUES (?, ?, ?, ?, ?, ?)";

  if (!$stmt = $conn->prepare($sql)) {
    echo "Error dalam mempersiapkan query: " . $conn->error;
    exit();
  }

  $stmt->bind_param("sssssi", $judul, $deskripsi, $kategori, $deadline, $prioritas, $dibuat_oleh);

  if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    header("Location: dashboard.php");
    exit();
  } else {
    echo "Gagal menyimpan tugas: " . $stmt->error;
  }
}
?>