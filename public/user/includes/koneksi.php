<?php
$host = "localhost";
$user = "bramahimm";
$pass = "bramlafayet123";
$db   = "kelola_tugasmu"; // GANTI dengan nama database kamu

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
