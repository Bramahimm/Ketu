<?php
$password = '$2y$10$4tQVl.sK.PlPZGchSsLtZuqLcebEYJ8xPexY5yxL76l0THp7kJSZi';
$hashed = password_hash($password, PASSWORD_DEFAULT);

echo "Hasil hash: $hashed";
?>
