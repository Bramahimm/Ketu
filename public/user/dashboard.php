<!-- user/dashboard.php -->
<?php
session_start();
if ($_SESSION['role'] !== 'user') {
    header("Location: ../index.php");
    exit();
}
?>
<h1>Selamat datang, User <?php echo $_SESSION['email']; ?>!</h1>
    