<?php
require_once __DIR__ . '/../includes/init.php';

// Cek role user (harus anggota)
$roleUser = $_SESSION['user']['role'] ?? null;
if ($roleUser !== 'anggota') {
    header("Location: index.php?route=dashboard");
    exit;
}

include __DIR__ . '/../layout/header.php';
include __DIR__ . '/../layout/navbar.php';
include __DIR__ . '/../layout/sidebar.php';
?>

<main class="flex-1 p-6 ml-64 pt-16">
    <h2 class="text-2xl font-bold mb-6">Jadwal Kegiatan Organisasi</h2>

    <?php if (!empty($kegiatanList)): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($kegiatanList as $kegiatan): ?>
                <?php
                $tanggal = new DateTime($kegiatan['tanggal']);
                $hariIni = new DateTime();
                $selisih = (int)$hariIni->diff($tanggal)->format('%r%a');

                if ($selisih < 0) {
                    $status = 'Sudah Berlalu';
                    $badge = 'bg-gray-200 text-gray-600';
                } elseif ($selisih <= 3) {
                    $status = 'Segera Dimulai';
                    $badge = 'bg-red-200 text-red-800';
                } elseif ($selisih <= 7) {
                    $status = 'Minggu Ini';
                    $badge = 'bg-yellow-200 text-yellow-800';
                } else {
                    $status = 'Akan Datang';
                    $badge = 'bg-blue-200 text-blue-800';
                }
                ?>
                <div class="bg-white shadow-md rounded-lg p-5 border-l-4 <?= $badge ?>">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-semibold mb-1 text-gray-800"><?= htmlspecialchars($kegiatan['namaKegiatan']) ?></h3>
                            <span class="text-xs font-semibold px-2 py-1 rounded-full <?= $badge ?>"><?= $status ?></span>
                        </div>
                    </div>
                    <div class="mt-3 text-sm text-gray-600 space-y-1">
                        <?php if (!empty($kegiatan['namaOrganisasi'])): ?>
                            <div><i class="fas fa-building mr-2"></i><strong>Organisasi:</strong> <?= htmlspecialchars($kegiatan['namaOrganisasi']) ?></div>
                        <?php endif; ?>
                        <div><i class="fas fa-calendar-alt mr-2"></i><?= date('d F Y', strtotime($kegiatan['tanggal'])) ?></div>
                        <div><i class="fas fa-map-marker-alt mr-2"></i><?= htmlspecialchars($kegiatan['lokasi']) ?></div>
                        <?php if (!empty($kegiatan['deskripsi'])): ?>
                            <div><i class="fas fa-align-left mr-2"></i><?= nl2br(htmlspecialchars($kegiatan['deskripsi'])) ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="bg-white p-12 text-center shadow rounded">
            <i class="fas fa-calendar-times text-4xl text-gray-400 mb-4"></i>
            <h3 class="text-xl font-semibold text-gray-600">Belum Ada Kegiatan</h3>
            <p class="text-gray-500">Kegiatan dari organisasi yang kamu ikuti akan muncul di sini.</p>
        </div>
    <?php endif; ?>
</main>

<?php include __DIR__ . '/../layout/footer.php'; ?>
