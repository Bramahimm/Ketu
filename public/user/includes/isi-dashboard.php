<?php
session_start();
include '../../src/includes/koneksi.php';

// Pastikan user telah login
if (!isset($_SESSION['user_id'])) {
    echo "<p class='text-center text-red-500'>Error: User tidak dikenali!</p>";
    exit();
}

$user_id = $_SESSION['user_id'];

// Gunakan prepared statement untuk keamanan
$stmt = $conn->prepare("SELECT * FROM tugas WHERE dibuat_oleh = ? ORDER BY deadline ASC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

?>

<main class="p-6 space-y-6">
    <!-- Search & Filter -->
    <div class="flex justify-between items-center">
        <div class="w-1/3 bg-white rounded-xl shadow-sm px-0.5 py-0.5">
            <input type="text" placeholder="Cari tugas"
                class="w-full bg-transparent border-none outline-none focus:ring-0 placeholder-gray-400 appearance-none" />
        </div>
        <div class="space-x-2">
            <button class="bg-white border border-gray-300 text-sm px-3 py-1 rounded-full">Kategori: Pekerjaan</button>
            <button class="bg-red-100 text-red-600 text-sm px-3 py-1 rounded-full">Prioritas: Tinggi</button>
            <button class="bg-blue-100 text-blue-600 text-sm px-3 py-1 rounded-full">Status: Belum Selesai</button>
            <button class="text-sm text-gray-600 underline">Hapus Semua</button>
            <button onclick="bukaModal()" class="bg-indigo-600 text-white text-sm px-4 py-2 rounded-md ml-2">+ Tambah Tugas</button>
        </div>
    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-4 gap-4">
        <div class="bg-white p-4 rounded shadow">
            <p class="text-sm font-medium text-gray-500">Total Tugas</p>
            <p class="text-2xl font-bold">24</p>
            <p class="text-xs text-gray-400">+3 dari minggu lalu</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <p class="text-sm font-medium text-gray-500">Tugas Selesai</p>
            <p class="text-2xl font-bold text-green-600">16</p>
            <p class="text-xs text-gray-400">+5 dari minggu lalu</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <p class="text-sm font-medium text-gray-500">Tugas Tertunda</p>
            <p class="text-2xl font-bold text-yellow-500">8</p>
            <p class="text-xs text-gray-400">+2 dari minggu lalu</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <p class="text-sm font-medium text-gray-500">Prioritas Tinggi</p>
            <p class="text-2xl font-bold text-pink-600">5</p>
            <p class="text-xs text-gray-400">+1 dari minggu lalu</p>
        </div>
    </div>

    <!-- Daftar Tugas -->
    <div>
        <h2 class="text-lg font-bold mb-2">Daftar Tugas</h2>
        <div id="task-list" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <?php if ($result->num_rows == 0): ?>
                <p class="text-center text-gray-500">Belum ada tugas yang dibuat.</p>
            <?php else: ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="bg-white p-4 rounded-xl shadow relative group">
                        <span class="text-xs bg-purple-100 text-purple-600 px-2 py-0.5 rounded-full"><?= htmlspecialchars($row['kategori']) ?></span>
                        <div class="flex items-start gap-2 mt-2">
                            <div>
                                <h3 class="font-semibold text-gray-800"><?= htmlspecialchars($row['judul']) ?></h3>
                                <p class="text-sm text-gray-600"><?= htmlspecialchars($row['deskripsi']) ?></p>
                            </div>
                        </div>
                        <div class="flex justify-between text-sm text-gray-500 mt-2">
                            <span class="flex items-center gap-1">
                                <i class="fas fa-calendar-alt"></i> <?= date('d M Y', strtotime($row['deadline'])) ?>
                            </span>
                            <span class="text-red-600 font-medium"><i class="fas fa-flag mr-1"></i>Prioritas <?= htmlspecialchars($row['prioritas']) ?></span>
                        </div>
                        <div class="absolute top-3 right-3">
                            <button onclick="toggleMenu(this)" class="text-gray-500 hover:text-gray-800 p-1 rounded-full">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <div class="hidden mt-2 w-40 bg-white rounded-lg shadow-lg absolute right-0 z-10 border text-sm">
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100"><i class="fas fa-pen mr-2"></i>Edit</a>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100"><i class="fas fa-copy mr-2"></i>Duplikat</a>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100"><i class="fas fa-check mr-2"></i>Tandai Selesai</a>
                                <a href="#" class="block px-4 py-2 text-red-600 hover:bg-red-100"><i class="fas fa-trash-alt mr-2"></i>Hapus</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</main>
