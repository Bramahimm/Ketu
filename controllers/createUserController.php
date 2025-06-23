<?php
require_once __DIR__ . '/../includes/init.php';
requireRole('admin');
require_once __DIR__ . '/../models/User.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = $_POST['nama'] ?? '';
  $email = $_POST['email'] ?? '';
  $role = $_POST['role'] ?? 'anggota';
  $password = $_POST['password'] ?? '';

  if ($nama && $email && $password) {
    $result = User::create($conn, [
      'nama' => $nama,
      'email' => $email,
      'role' => $role,
      'password' => $password
    ]);

    if ($result['status'] === 'success') {
      header("Location: index.php?route=dashboardAdmin&success=" . urlencode($result['message']));
      exit;
    } else {
      $message = $result['message'];
    }
  } else {
    $message = 'Semua field wajib diisi.';
  }
}

include __DIR__ . '/../views/createUser.php';
