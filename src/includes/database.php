<?php
$host = 'localhost';
$dbname = 'nama_database';
$user = 'bramahimm'; //ubah aja sesuai user kamorang
$pass = 'bramlafayet123'; //ini juga ubah sandi kamorang

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
