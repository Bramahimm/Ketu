<?php
require_once __DIR__ . '/../includes/init.php';
requireRole('admin');
require_once __DIR__ . '/../models/User.php';

$message = '';
$editData = null;

// Tambah
if (isset($_POST['tambah'])) {
  if (User::create($conn, $_POST)) {
    $message = 'User berhasil ditambahkan.';
  } else {
    $message = 'Gagal menambahkan user.';
  }
}

// Edit
if (isset($_POST['update'])) {
  if (User::update($conn, $_POST['idUser'], $_POST)) {
    $message = 'User berhasil diperbarui.';
  } else {
    $message = 'Gagal memperbarui user.';
  }
}

// Ambil data untuk edit
if (isset($_GET['edit'])) {
  $editData = User::getOne($conn, $_GET['edit']);
}

// Hapus
if (isset($_GET['hapus'])) {
  if (User::delete($conn, $_GET['hapus'])) {
    $message = 'User berhasil dihapus.';
  } else {
    $message = 'Gagal menghapus user.';
  }
}

$userList = User::getAll($conn);
$totalUser = count($userList); // Hitung total pengguna


$userList = User::getAll($conn);

include __DIR__ . '/../views/dashboardAdmin.php';
