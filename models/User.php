<?php
class User {
  public static function getAll($conn) {
    $query = "SELECT * FROM user ORDER BY idUser DESC";
    $result = $conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public static function getOne($conn, $idUser) {
    $stmt = $conn->prepare("SELECT * FROM user WHERE idUser = ?");
    $stmt->bind_param("i", $idUser);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
  }

  public static function getById($conn, $idUser) {
    return self::getOne($conn, $idUser);
  }

  public static function create($conn, $data) {
    $nama = $data['nama'];
    $email = $data['email'];
    $role = $data['role'];
    $password = password_hash($data['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO user (nama, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama, $email, $password, $role);

    if ($stmt->execute()) {
      return ['status' => 'success', 'message' => 'User berhasil ditambahkan.'];
    } else {
      return ['status' => 'error', 'message' => 'Gagal menambahkan user.'];
    }
  }

  public static function update($conn, $idUser, $data) {
    $nama = $data['nama'];
    $email = $data['email'];
    $role = $data['role'];
    $params = [$nama, $email, $role];
    $types = "sss";
    $setQuery = "nama = ?, email = ?, role = ?";

    if (!empty($data['password'])) {
      $password = password_hash($data['password'], PASSWORD_DEFAULT);
      $setQuery .= ", password = ?";
      $params[] = $password;
      $types .= "s";
    }

    $params[] = $idUser;
    $types .= "i";

    $query = "UPDATE user SET $setQuery WHERE idUser = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param($types, ...$params);

    if ($stmt->execute()) {
      return ['status' => 'success', 'message' => 'User berhasil diperbarui.'];
    } else {
      return ['status' => 'error', 'message' => 'Gagal memperbarui user.'];
    }
  }

  public static function delete($conn, $idUser) {
    $stmt = $conn->prepare("DELETE FROM user WHERE idUser = ?");
    $stmt->bind_param("i", $idUser);
    return $stmt->execute();
  }

  public static function getUserByEmail($conn, $email) {
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
  }
}
