<?php
session_start();
require_once '../src/includes/database.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $role = isset($_POST['role']) ? $_POST['role'] : '';

    if (!empty($nama) && !empty($email) && !empty($password) && !empty($role)) {
        // Hash password agar lebih aman
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $conn->prepare("INSERT INTO user (nama, email, password, role) VALUES (?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("ssss", $nama, $email, $hashedPassword, $role);
            if ($stmt->execute()) {
                header('Location: ../public/index.php');
                exit;
            } else {
                $errors[] = "Gagal menyimpan data.";
            }
            $stmt->close();
        } else {
            $errors[] = "Kesalahan dalam query database.";
        }
    } else {
        $errors[] = "Harap isi semua bidang.";
    }
    mysqli_close($conn);
}
?>