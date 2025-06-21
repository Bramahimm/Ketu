<?php
class Tugas {
  public static function getAllByUser($conn, $idUser) {
    $query = "SELECT * FROM tugas WHERE idUser = ? ORDER BY deadline ASC";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idUser);
    $stmt->execute();
    return $stmt->get_result();
  }

  public static function getOne($conn, $idTugas, $idUser) {
    $query = "SELECT * FROM tugas WHERE idTugas = ? AND idUser = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $idTugas, $idUser);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
  }

  public static function tambah($conn, $data, $idUser) {
    $judul = $data['judul'] ?? '';
    $deskripsi = $data['deskripsi'] ?? '';
    $deadline = $data['deadline'] ?? '';
    $status = $data['status'] ?? 'Belum';

    $query = "INSERT INTO tugas (judul, deskripsi, deadline, status, idUser) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssi", $judul, $deskripsi, $deadline, $status, $idUser);

    if ($stmt->execute()) {
      return ['status' => 'success', 'message' => 'Tugas berhasil ditambahkan.'];
    } else {
      return ['status' => 'error', 'message' => 'Gagal menambahkan tugas.'];
    }
  }

  public static function update($conn, $data, $idUser) {
    $idTugas = $data['idTugas'] ?? 0;
    $judul = $data['judul'] ?? '';
    $deskripsi = $data['deskripsi'] ?? '';
    $deadline = $data['deadline'] ?? '';
    $status = $data['status'] ?? 'Belum';

    $query = "UPDATE tugas SET judul = ?, deskripsi = ?, deadline = ?, status = ? WHERE idTugas = ? AND idUser = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssii", $judul, $deskripsi, $deadline, $status, $idTugas, $idUser);

    if ($stmt->execute()) {
      return ['status' => 'success', 'message' => 'Tugas berhasil diupdate.'];
    } else {
      return ['status' => 'error', 'message' => 'Gagal mengupdate tugas.'];
    }
  }

  public static function hapus($conn, $idTugas, $idUser) {
    $query = "DELETE FROM tugas WHERE idTugas = ? AND idUser = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $idTugas, $idUser);

    if ($stmt->execute()) {
      return ['status' => 'success', 'message' => 'Tugas berhasil dihapus.'];
    } else {
      return ['status' => 'error', 'message' => 'Gagal menghapus tugas.'];
    }
  }

  public static function countAktifByUser($conn, $idUser) {
    $query = "SELECT COUNT(*) as total FROM tugas WHERE idUser = ? AND status != 'Selesai'";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idUser);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    return $result['total'] ?? 0;
  }

  public static function countSelesaiByUser($conn, $idUser) {
    $query = "SELECT COUNT(*) as total FROM tugas WHERE idUser = ? AND status = 'Selesai'";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idUser);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    return $result['total'] ?? 0;
  }

  public static function countThisWeekByUser($conn, $idUser) {
    $query = "SELECT COUNT(*) as total FROM tugas 
              WHERE idUser = ? AND deadline BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idUser);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    return $result['total'] ?? 0;
  }
}
