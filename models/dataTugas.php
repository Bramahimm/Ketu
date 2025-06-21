<?php
function getTugasByIdAndUser($conn, $id, $user_id) {
  $stmt = $conn->prepare("SELECT * FROM tugas WHERE id = ? AND dibuat_oleh = ?");
  $stmt->bind_param("ii", $id, $user_id);
  $stmt->execute();
  $result = $stmt->get_result();
  return $result->fetch_assoc();
}
