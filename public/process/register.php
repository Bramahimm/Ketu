<?php
session_start();
include '../koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

// Cek apakah email sudah ada
$cek = $conn->prepare("SELECT id FROM users WHERE email = ?");
$cek->bind_param("s", $email);
$cek->execute();
$cek->store_result();

if ($cek->num_rows > 0) {
    echo "Email sudah terdaftar!";
    exit();
}

// Hash password dan simpan sebagai user
$hashed = password_hash($password, PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO users (email, password, role) VALUES (?, ?, 'user')");
$stmt->bind_param("ss", $email, $hashed);

if ($stmt->execute()) {
    header("Location: ../index.php?success=1");
    exit();
} else {
    echo "Gagal mendaftar. Silakan coba lagi.";
}
?>
