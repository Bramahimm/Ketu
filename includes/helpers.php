<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

function requireRole($role) {
  if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== $role) {
    header("Location: ../index.php");
    exit;
  }
}

function activeClass($file) {
  $current = basename($_SERVER['PHP_SELF']);
  return $current === $file ? 'bg-blue-600 text-white' : 'hover:bg-gray-100 text-black';
}

function getUserId() {
  return $_SESSION['user']['id'] ?? null;
}

function getUserName() {
  return $_SESSION['user']['nama'] ?? 'Pengguna';
}


function isPengurus() {
  return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'pengurus';
}

function isAnggota() {
  return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'anggota';
}
function redirectWithError($type) {
  header("Location: index.php?route=login&error=$type");
  exit;
}

function redirectToDashboard($role) {
  $target = $role === 'pengurus' ? 'dashboard' : 'dashboard';
  header("Location: index.php?route=$target");
  exit;
}
function getPendingRequestCount($conn, $idUser) {
  $stmt = $conn->prepare("SELECT COUNT(*) as total FROM request_organisasi r
    JOIN user_organisasi uo ON r.idOrganisasi = uo.idOrganisasi
    WHERE uo.idUser = ? AND uo.role = 'pengurus' AND r.status = 'pending'");
  $stmt->bind_param("i", $idUser);
  $stmt->execute();
  $result = $stmt->get_result()->fetch_assoc();
  return $result['total'] ?? 0;
}
