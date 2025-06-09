<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "kelola_tugasmu";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
