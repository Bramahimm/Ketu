<?php
require_once __DIR__ . '/../includes/init.php';
requireRole('admin');
require_once __DIR__ . '/../models/User.php';

$id = $_GET['id'] ?? null;
$editData = $id ? User::getOne($conn, $id) : null;
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $result = User::update($conn, $_POST['idUser'], $_POST);

  if ($result['status'] === 'success') {
    header("Location: index.php?route=dashboardAdmin&success=" . urlencode($result['message']));
    exit;
  } else {
    $message = $result['message'];
  }
}

include __DIR__ . '/../views/editUser.php';
