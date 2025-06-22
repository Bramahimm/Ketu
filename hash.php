<?php
$password = "admin123"; // Ganti dengan password yang ingin kamu hash
$hash = password_hash($password, PASSWORD_DEFAULT);
echo $hash;
