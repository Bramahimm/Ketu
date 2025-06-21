<?php
require_once __DIR__ . '/../includes/init.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'pengurus') {
  header('Location: index.php');
  exit;
}

$idUser = $_SESSION['user']['id'];

// Ambil organisasi yang dikelola
$queryOrganisasi = "SELECT o.idOrganisasi, o.namaOrganisasi
                    FROM organisasi o
                    JOIN user_organisasi uo ON o.idOrganisasi = uo.idOrganisasi
                    WHERE uo.idUser = ? AND uo.role = 'pengurus'";
$stmt = $conn->prepare($queryOrganisasi);
$stmt->bind_param('i', $idUser);
$stmt->execute();
$organisasiResult = $stmt->get_result();

$daftarPermintaan = [];

while ($org = $organisasiResult->fetch_assoc()) {
  $idOrg = $org['idOrganisasi'];

  $q = "SELECT r.idRequest, u.nama, u.email, r.status, r.tanggalRequest, r.idOrganisasi 
          FROM request_organisasi r
          JOIN user u ON r.idUser = u.idUser
          WHERE r.idOrganisasi = ? AND r.status = 'pending'";
  $stmt2 = $conn->prepare($q);
  $stmt2->bind_param('i', $idOrg);
  $stmt2->execute();
  $result = $stmt2->get_result();

  while ($req = $result->fetch_assoc()) {
    $req['namaOrganisasi'] = $org['namaOrganisasi'];
    $daftarPermintaan[] = $req;
  }
}

// TERIMA permintaan
if (isset($_GET['terima'])) {
  $idRequest = (int) $_GET['terima'];
  $req = $conn->query("SELECT * FROM request_organisasi WHERE idRequest = $idRequest")->fetch_assoc();
  if ($req && $req['status'] === 'pending') {
    $conn->query("INSERT INTO user_organisasi (idUser, idOrganisasi, role) VALUES ({$req['idUser']}, {$req['idOrganisasi']}, 'anggota')");
    $conn->query("UPDATE request_organisasi SET status = 'diterima' WHERE idRequest = $idRequest");
  }
  header('Location: index.php?route=permintaan');
  exit;
}

// TOLAK permintaan
if (isset($_GET['tolak'])) {
  $idRequest = (int) $_GET['tolak'];
  $conn->query("UPDATE request_organisasi SET status = 'ditolak' WHERE idRequest = $idRequest");
  header('Location: index.php?route=permintaan');
  exit;
}

include __DIR__ . '/../views/permintaanBergabung.php';
// Terima atau Tolak
if (isset($_GET['terima'])) {
  $idRequest = (int) $_GET['terima'];
  // Ambil info request
  $req = $conn->query("SELECT * FROM request_organisasi WHERE idRequest = $idRequest")->fetch_assoc();
  if ($req && $req['status'] === 'pending') {
    // Tambah ke user_organisasi
    $conn->query("INSERT INTO user_organisasi (idUser, idOrganisasi, role) VALUES (
            {$req['idUser']}, {$req['idOrganisasi']}, 'anggota'
        )");
    // Update status
    $conn->query("UPDATE request_organisasi SET status = 'diterima' WHERE idRequest = $idRequest");
  }
  header('Location: index.php?route=permintaan');
  exit;
}

if (isset($_GET['tolak'])) {
  $idRequest = (int) $_GET['tolak'];
  $conn->query("UPDATE request_organisasi SET status = 'ditolak' WHERE idRequest = $idRequest");
  header('Location: index.php?route=permintaan');
  exit;
}
