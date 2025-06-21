<?php
// Hash bcrypt yang ingin dicek
$hash = '$2y$10$4tQVl.sK.PlPZGchSsLtZuqLcebEYJ8xPexY5yxL76l0THp7kJSZi';

// Daftar tebakan password (bisa dari form input atau array lokal)
$passwords = [
    'password',
    'admin123',
    'bram123',
    '123456',
    'rahasiabanget',
    'sayauserbiasa',
    'tebakanmu',   // <-- tambahkan tebakan lain di sini
];

// Cek satu per satu
foreach ($passwords as $pwd) {
    if (password_verify($pwd, $hash)) {
        echo "✅ Password cocok ditemukan: $pwd\n";
        exit;
    }
}

echo "❌ Tidak ada password yang cocok dengan hash tersebut.\n";
?>
