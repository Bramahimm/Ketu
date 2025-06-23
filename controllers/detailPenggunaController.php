<?php
require_once __DIR__ . '/../includes/init.php';
$route = $_GET['route'] ?? 'kelola-pengguna';

if ($route === 'detailPengguna') {
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
