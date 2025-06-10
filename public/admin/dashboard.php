<?php
session_start();
require_once '../../src/includes/koneksi.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

$totalPengguna = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM users"))['total'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-50 text-gray-800 font-sans">
    <!-- Header -->
    <header class="bg-white shadow flex justify-between items-center px-6 py-4">
        <div class="text-xl font-bold text-indigo-600">Admin Panel <span class="text-sm text-gray-600">Kelola Pengguna</span></div>
        <div class="flex items-center gap-4">
            <div class="flex items-center space-x-2">
                <span class="font-semibold"><?php echo $_SESSION['email']; ?></span>
                <div class="w-8 h-8 rounded-full bg-indigo-500 text-white flex items-center justify-center">
                    <?php echo strtoupper(substr($_SESSION['email'], 0, 1)); ?>
                </div>
            </div>
            <form action="../../src/includes/logout.php" method="post">
                <button type="submit" class="text-sm text-red-600 hover:underline ml-4">Logout</button>
            </form>
        </div>
    </header>

    <!-- Main Content -->
    <main class="p-6 space-y-6">
        <!-- Menu Navigasi -->
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Halo, Admin!</h1>
            <a href="kelola_pengguna.php" class="bg-blue-600 text-white text-sm px-4 py-2 rounded-md">Kelola Pengguna</a>
        </div>

        <!-- Statistik Pengguna -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            <div class="bg-white p-6 rounded shadow text-center">
                <p class="text-sm font-medium text-gray-500">Total Pengguna</p>
                <p class="text-3xl font-bold text-indigo-600"><?php echo $totalPengguna; ?></p>
                <p class="text-xs text-gray-400 mt-1">Jumlah akun yang terdaftar</p>
            </div>
        </div>
    </main>
</body>
</html>
