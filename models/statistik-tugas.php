<?php
function getTotalTugas($conn, $user_id) {
  $q = mysqli_query($conn, "SELECT COUNT(*) as total FROM tugas WHERE dibuat_oleh = $user_id");
  return mysqli_fetch_assoc($q)['total'];
}

function getTugasSelesai($conn, $user_id) {
  $q = mysqli_query($conn, "SELECT COUNT(*) as selesai FROM tugas WHERE dibuat_oleh = $user_id AND status = 'Selesai'");
  return mysqli_fetch_assoc($q)['selesai'];
}

function getTugasTertunda($conn, $user_id) {
  $q = mysqli_query($conn, "SELECT COUNT(*) as tertunda FROM tugas WHERE dibuat_oleh = $user_id AND status = 'Belum'");
  return mysqli_fetch_assoc($q)['tertunda'];
}

function getPrioritasTinggi($conn, $user_id) {
  $q = mysqli_query($conn, "SELECT COUNT(*) as tinggi FROM tugas WHERE dibuat_oleh = $user_id AND prioritas = 'Tinggi'");
  return mysqli_fetch_assoc($q)['tinggi'];
}
