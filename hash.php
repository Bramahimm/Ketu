<?php
$password = 'admin123';
$hashed = password_hash($password, PASSWORD_DEFAULT);

echo "Hasil hash: $hashed";
?>
