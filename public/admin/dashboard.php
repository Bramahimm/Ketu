<!-- admin/dashboard.php -->
<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}
?>
<h1>Selamat datang, Admin <?php echo $_SESSION['email']; ?>!</h1>
