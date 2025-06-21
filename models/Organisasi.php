<?php
class Organisasi {
  public static function getJumlahAnggotaPerOrganisasi($conn, $idUser) {
    $stmt = $conn->prepare("
      SELECT o.namaOrganisasi, COUNT(uo_anggota.idUser) AS jumlahAnggota
      FROM user_organisasi uo_pengurus
      JOIN organisasi o ON o.idOrganisasi = uo_pengurus.idOrganisasi
      JOIN user_organisasi uo_anggota ON uo_pengurus.idOrganisasi = uo_anggota.idOrganisasi
      WHERE uo_pengurus.idUser = ? AND uo_pengurus.role = 'pengurus' AND uo_anggota.role = 'anggota'
      GROUP BY o.namaOrganisasi
    ");
    $stmt->bind_param('i', $idUser);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = [];
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }

    return $data;
  }
}
