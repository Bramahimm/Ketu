<?php
session_start();
require_once '/../includes/koneksi.php'; // ini pathnya sudah benar sesuai struktur folder kamu

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, email, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($user_id, $user_email, $hashed, $role);

    if ($stmt->fetch() && password_verify($password, $hashed)) {
        $_SESSION['user_id'] = $user_id;
        $_SESSION['email'] = $user_email;
        $_SESSION['role'] = $role;

        if ($role === 'admin') {
            header('Location: ../admin/dashboard.php');
        } else {
            header('Location: ../user/dashboard.php');
        }
        exit;
    } else {
        $errors[] = "Email atau password salah.";
    }
}
?>
