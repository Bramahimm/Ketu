<?php
// Ambil idOrganisasi yang dikelola pengurus
$idPengurus = $_SESSION['user']['id'];
$organisasiResult = mysqli_query($conn, "SELECT idOrganisasi FROM user_organisasi WHERE idUser = $idPengurus AND role = 'pengurus'");
$orgIds = [];
while ($row = mysqli_fetch_assoc($organisasiResult)) {
  $orgIds[] = $row['idOrganisasi'];
}
$orgList = implode(",", $orgIds);

// Ambil user yang minta join organisasi tersebut
$query = "SELECT uo.idUser, u.nama, o.namaOrganisasi, uo.idOrganisasi
          FROM user_organisasi uo
          JOIN users u ON uo.idUser = u.idUser
          JOIN organisasi o ON uo.idOrganisasi = o.idOrganisasi
          WHERE uo.role IS NULL AND uo.idOrganisasi IN ($orgList)";
