<?php
include __DIR__ . '/../../../src/includes/koneksi.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user_id = $_SESSION['user_id'] ?? 0;

// Total tugas
$q_total = mysqli_query($conn, "SELECT COUNT(*) as total FROM tugas WHERE dibuat_oleh = $user_id");
$total = mysqli_fetch_assoc($q_total)['total'];

// Tugas selesai
$q_selesai = mysqli_query($conn, "SELECT COUNT(*) as selesai FROM tugas WHERE dibuat_oleh = $user_id AND status = 'Selesai'");
$selesai = mysqli_fetch_assoc($q_selesai)['selesai'];

// Tugas tertunda
$q_tertunda = mysqli_query($conn, "SELECT COUNT(*) as tertunda FROM tugas WHERE dibuat_oleh = $user_id AND status = 'Belum'");
$tertunda = mysqli_fetch_assoc($q_tertunda)['tertunda'];

// Prioritas tinggi
$q_tinggi = mysqli_query($conn, "SELECT COUNT(*) as tinggi FROM tugas WHERE dibuat_oleh = $user_id AND prioritas = 'Tinggi'");
$tinggi = mysqli_fetch_assoc($q_tinggi)['tinggi'];
?>
