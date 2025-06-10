<?php
require_once '../src/includes/database.php';
include '../src/process/register.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded shadow-md w-full max-w-sm">
        <h2 class="text-xl font-bold mb-4">Daftar Akun</h2>
        <?php if (!empty($errors)): ?>
            <?php foreach ($errors as $error): ?>
                <p class="text-red-500 text-sm"><?= htmlspecialchars($error); ?></p>
            <?php endforeach; ?>
        <?php endif; ?>

        <form method="POST">
            <input name="nama" placeholder="Nama Lengkap" required class="w-full mb-2 p-2 border rounded" />
            <input name="email" type="email" placeholder="Email" required class="w-full mb-2 p-2 border rounded" />
            <input name="password" type="password" placeholder="Password" required class="w-full mb-2 p-2 border rounded" />
            
            <input name="role" placeholder="role" required class="w-full mb-2 p-2 border rounded" />

            <button class="bg-green-500 text-white px-4 py-2 rounded w-full hover:bg-green-600 transition">Daftar</button>
        </form>
        <p class="mt-4 text-sm">Sudah punya akun? <a href="../index.php" class="text-blue-600 underline">Login</a></p>
    </div>
</body>

</html>
