<?php
require_once __DIR__ . '/init.php';

$nama = $_POST['nama'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$role = $_POST['role'] ?? '';
$namaOrganisasi = $_POST['namaOrganisasi'] ?? '';

if (!$nama || !$email || !$password || !$role || ($role === 'pengurus' && !$namaOrganisasi)) {
  header("Location: index.php?route=register&error=Lengkapi semua data.");
  exit;
}

// Cek email unik
$stmt = $conn->prepare("SELECT idUser FROM user WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
  header("Location: index.php?route=register&error=Email sudah digunakan.");
  exit;
}

// Hash password
$hashed = password_hash($password, PASSWORD_DEFAULT);

// Simpan user
$stmt = $conn->prepare("INSERT INTO user (nama, email, password, role) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nama, $email, $hashed, $role);
$stmt->execute();
$idUser = $stmt->insert_id;

// Jika role pengurus, buat organisasi baru dan simpan ke relasi
if ($role === 'pengurus') {
  $stmtOrg = $conn->prepare("INSERT INTO organisasi (namaOrganisasi, deskripsi) VALUES (?, '')");
  $stmtOrg->bind_param("s", $namaOrganisasi);
  $stmtOrg->execute();
  $idOrganisasi = $stmtOrg->insert_id;

  $stmtUO = $conn->prepare("INSERT INTO user_organisasi (idUser, idOrganisasi, role) VALUES (?, ?, 'pengurus')");
  $stmtUO->bind_param("ii", $idUser, $idOrganisasi);
  $stmtUO->execute();
}

header("Location: index.php?route=login");
exit;
