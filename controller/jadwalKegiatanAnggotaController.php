<?php
require_once __DIR__ . '/../includes/init.php';
require_once __DIR__ . '/../models/Kegiatan.php';

$idUser = $_SESSION['user']['id'];

// Ambil organisasi yang diikuti user
$stmt = $conn->prepare("SELECT idOrganisasi FROM user_organisasi WHERE idUser = ?");
$stmt->bind_param("i", $idUser);
$stmt->execute();
$orgs = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

$organisasiIds = array_column($orgs, 'idOrganisasi');
$organisasiIdsIn = implode(',', array_map('intval', $organisasiIds));

$kegiatanList = [];
if (!empty($organisasiIdsIn)) {
  $query = "SELECT * FROM kegiatan WHERE idOrganisasi IN ($organisasiIdsIn) ORDER BY tanggal ASC";
  $kegiatanList = $conn->query($query);
}

include __DIR__ . '/../views/jadwalKegiatanAnggota.php';
