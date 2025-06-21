<?php
$password = 'afgancandra';
$hashed = password_hash($password, PASSWORD_DEFAULT);

echo "Hasil hash: $hashed";
?>
