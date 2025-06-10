<?php
session_start();
require_once '../../src/includes/koneksi.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

// Tambah pengguna
if (isset($_POST['tambah'])) {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    mysqli_query($conn, "INSERT INTO users (email, password, role) VALUES ('$email', '$password', '$role')");
    header("Location: kelola_pengguna.php");
    exit;
}

// Hapus pengguna
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM users WHERE id = $id");
    header("Location: kelola_pengguna.php");
    exit;
}

// Ambil semua pengguna
$pengguna = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

    <!-- Header -->
    <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-indigo-600">Kelola Pengguna</h1>
        <a href="dashboard.php" class="text-sm text-blue-600 hover:underline">Kembali ke Dashboard</a>
    </header>

    <!-- Konten -->
    <main class="p-6 space-y-6">

        <!-- Form Tambah Pengguna -->
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold mb-4">Tambah Pengguna Baru</h2>
            <form method="post" class="space-y-4">
                <input type="email" name="email" placeholder="Email" required class="w-full p-2 border rounded">
                <input type="password" name="password" placeholder="Password" required class="w-full p-2 border rounded">
                <select name="role" required class="w-full p-2 border rounded">
                    <option value="">Pilih Role</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit" name="tambah" class="bg-green-600 text-white px-4 py-2 rounded">Tambah</button>
            </form>
        </div>

        <!-- Daftar Pengguna -->
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold mb-4">Daftar Pengguna</h2>
            <div class="overflow-auto">
                <table class="w-full table-auto text-sm border">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-2 border">#</th>
                            <th class="p-2 border">Email</th>
                            <th class="p-2 border">Role</th>
                            <th class="p-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; while ($row = mysqli_fetch_assoc($pengguna)) : ?>
                        <tr class="hover:bg-gray-100">
                            <td class="p-2 border text-center"><?php echo $no++; ?></td>
                            <td class="p-2 border"><?php echo htmlspecialchars($row['email']); ?></td>
                            <td class="p-2 border text-center"><?php echo $row['role']; ?></td>
                            <td class="p-2 border text-center">
                                <a href="?hapus=<?php echo $row['id']; ?>" onclick="return confirm('Hapus pengguna ini?')" class="text-red-600 hover:underline text-sm">Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

</body>
</html>
