<?php
$host = "localhost";
$user = "bramahimm";
$pass = "bramlafayet123";
$db = "kelola_tugasmu";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
