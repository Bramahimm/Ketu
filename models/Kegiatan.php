<?php
class Kegiatan {
  public static function tambah($conn, $data, $idUser) {
    $nama = $data['namaKegiatan'] ?? '';
    $deskripsi = $data['deskripsi'] ?? '';
    $tanggal = $data['tanggal'] ?? '';
    $lokasi = $data['lokasi'] ?? '';
    $idOrganisasi = $data['idOrganisasi'] ?? null;

    $query = "INSERT INTO kegiatan (namaKegiatan, deskripsi, tanggal, lokasi, idPembuat, idOrganisasi)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssii", $nama, $deskripsi, $tanggal, $lokasi, $idUser, $idOrganisasi);

    if ($stmt->execute()) {
      return ['status' => 'success', 'message' => 'Kegiatan berhasil ditambahkan.'];
    } else {
      return ['status' => 'error', 'message' => 'Gagal menambahkan kegiatan.'];
    }
  }


  public static function countByUser($conn, $idUser) {
    $query = "SELECT COUNT(*) as total FROM kegiatan WHERE idPembuat = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idUser);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    return $result['total'] ?? 0;
  }

  public static function edit($conn, $data, $idUser) {
    $id = mysqli_real_escape_string($conn, $data['idKegiatan']);
    $nama = mysqli_real_escape_string($conn, $data['namaKegiatan']);
    $deskripsi = mysqli_real_escape_string($conn, $data['deskripsi']);
    $tanggal = mysqli_real_escape_string($conn, $data['tanggal']);
    $lokasi = mysqli_real_escape_string($conn, $data['lokasi']);

    $query = "UPDATE kegiatan SET namaKegiatan='$nama', deskripsi='$deskripsi', 
                  tanggal='$tanggal', lokasi='$lokasi' 
                  WHERE idKegiatan='$id' AND idPembuat='$idUser'";

    if (mysqli_query($conn, $query)) {
      return ['status' => 'success', 'message' => 'Kegiatan berhasil diupdate!'];
    }
    return ['status' => 'error', 'message' => mysqli_error($conn)];
  }

  public static function hapus($conn, $id, $idUser) {
    $id = mysqli_real_escape_string($conn, $id);
    $query = "DELETE FROM kegiatan WHERE idKegiatan='$id' AND idPembuat='$idUser'";

    if (mysqli_query($conn, $query)) {
      return ['status' => 'success', 'message' => 'Kegiatan berhasil dihapus!'];
    }
    return ['status' => 'error', 'message' => mysqli_error($conn)];
  }

  public static function getByUser($conn, $idUser) {
    $query = "SELECT * FROM kegiatan WHERE idPembuat = '$idUser' ORDER BY tanggal ASC";
    return mysqli_query($conn, $query);
  }

  public static function getOne($conn, $idKegiatan, $idUser) {
    $id = mysqli_real_escape_string($conn, $idKegiatan);
    $query = "SELECT * FROM kegiatan WHERE idKegiatan='$id' AND idPembuat='$idUser'";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
  }
  public static function countThisWeekByUser($conn, $idUser) {
    $query = "SELECT COUNT(*) as total FROM kegiatan 
              WHERE idPembuat = ? AND tanggal BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idUser);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    return $result['total'] ?? 0;
  }
}
