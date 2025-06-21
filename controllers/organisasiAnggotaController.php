<?php
require_once __DIR__ . '/../includes/init.php';

$idUser = $_SESSION['user']['id'];

$allOrgs = $conn->query("SELECT * FROM organisasi");

$stmt = $conn->prepare("
  SELECT idOrganisasi FROM request_organisasi WHERE idUser = ?
  UNION
  SELECT idOrganisasi FROM user_organisasi WHERE idUser = ?
");
$stmt->bind_param("ii", $idUser, $idUser);
$stmt->execute();
$excluded = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$excludedIds = array_column($excluded, 'idOrganisasi');

include __DIR__ . '/../views/organisasiAnggota.php';
