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
  $query = "
    SELECT k.*, o.namaOrganisasi
    FROM kegiatan k
    JOIN organisasi o ON k.idOrganisasi = o.idOrganisasi
    WHERE k.idOrganisasi IN ($organisasiIdsIn)
    ORDER BY k.tanggal ASC
  ";
  $kegiatanList = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
}

include __DIR__ . '/../views/jadwalKegiatanAnggota.php';
