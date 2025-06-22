<?php
require_once __DIR__ . '/../includes/init.php';

$route = $_GET['route'] ?? 'kelola-pengguna';

// Daftar pengguna
if ($route === 'kelola-pengguna') {
  $stmt = $conn->query("SELECT idUser, nama, email, role FROM user ORDER BY role ASC, nama ASC");
  $users = $stmt->fetch_all(MYSQLI_ASSOC);

  $message = $_SESSION['flash_message'] ?? '';
  $messageType = $_SESSION['flash_type'] ?? '';
  unset($_SESSION['flash_message'], $_SESSION['flash_type']);

  include __DIR__ . '/../views/kelolaPengguna.php';
  exit;
}

// Tambah pengguna
if ($route === 'tambah-pengguna') {
  $message = '';
  $messageType = '';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    // Cek email sudah terdaftar?
    $check = $conn->prepare("SELECT idUser FROM user WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $checkResult = $check->get_result();

    if ($checkResult->num_rows > 0) {
      $message = 'Email sudah digunakan.';
      $messageType = 'error';
    } else {
      $stmt = $conn->prepare("INSERT INTO user (nama, email, password, role) VALUES (?, ?, ?, ?)");
      $stmt->bind_param("ssss", $nama, $email, $password, $role);
      if ($stmt->execute()) {
        $_SESSION['flash_message'] = 'Pengguna berhasil ditambahkan.';
        $_SESSION['flash_type'] = 'success';
        header("Location: index.php?route=kelola-pengguna");
        exit;
      } else {
        $message = 'Gagal menambahkan pengguna.';
        $messageType = 'error';
      }
    }
  }

  include __DIR__ . '/../views/tambahPengguna.php';
  exit;
}

// Detail pengguna
if ($route === 'detail-pengguna') {
  $userDetail = null;
  $id = (int) ($_GET['id'] ?? 0);

  if ($id > 0) {
    $stmt = $conn->prepare("SELECT idUser, nama, email, role FROM user WHERE idUser = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $userDetail = $stmt->get_result()->fetch_assoc();
  }

  include __DIR__ . '/../views/detailPengguna.php';
  exit;
}

// Hapus pengguna
if ($route === 'hapus-pengguna') {
  $id = (int) ($_GET['id'] ?? 0);

  if ($id > 0) {
    $stmt = $conn->prepare("DELETE FROM user WHERE idUser = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $_SESSION['flash_message'] = 'Pengguna berhasil dihapus.';
    $_SESSION['flash_type'] = 'success';
  } else {
    $_SESSION['flash_message'] = 'Gagal menghapus pengguna.';
    $_SESSION['flash_type'] = 'error';
  }

  header("Location: index.php?route=kelola-pengguna");
  exit;
}
// Edit pengguna
if ($route === 'edit-pengguna') {
  $id = (int) ($_GET['id'] ?? 0);

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $role = $_POST['role'];

    $stmt = $conn->prepare("UPDATE user SET nama = ?, email = ?, role = ? WHERE idUser = ?");
    $stmt->bind_param("sssi", $nama, $email, $role, $id);

    if ($stmt->execute()) {
      $_SESSION['flash_message'] = 'Pengguna berhasil diperbarui.';
      $_SESSION['flash_type'] = 'success';
    } else {
      $_SESSION['flash_message'] = 'Gagal memperbarui pengguna.';
      $_SESSION['flash_type'] = 'error';
    }

    header("Location: index.php?route=kelola-pengguna");
    exit;
  }

  $stmt = $conn->prepare("SELECT * FROM user WHERE idUser = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $userData = $stmt->get_result()->fetch_assoc();

  include __DIR__ . '/../views/editPengguna.php';
  exit;
}
