<?php include __DIR__ . '/../layout/header.php'; ?>
<?php include __DIR__ . '/../layout/navbar.php'; ?>
<?php include __DIR__ . '/../layout/sidebar.php'; ?>

<main class="flex-1 p-6 ml-64 pt-16">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Dashboard Anggota</h2>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold mb-4">Daftar Tugas</h3>
        <div class="overflow-x-auto">
            <table class="w-full table-auto text-sm">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="p-2">No</th>
                        <th class="p-2">Judul Tugas</th>
                        <th class="p-2">Deadline</th>
                        <th class="p-2">Status</th>
                        <th class="p-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($tugasList && $tugasList->num_rows > 0): ?>
                        <?php $no = 1;
                        foreach ($tugasList as $data): ?>
                            <tr class="border-t hover:bg-gray-50">
                                <td class="p-2"><?= $no++ ?></td>
                                <td class="p-2 font-semibold"><?= htmlspecialchars($data['judul']) ?></td>
                                <td class="p-2"><?= date('d-m-Y', strtotime($data['deadline'])) ?></td>
                                <td class="p-2 text-<?= $data['status'] === 'selesai' ? 'green' : 'red' ?>-600">
                                    <?= ucfirst($data['status']) ?>
                                </td>
                                <td class="p-2 text-center">
                                    <a href="index.php?route=dashboard&detail=<?= $data['idTugas'] ?>" class="text-blue-600 hover:text-blue-800 px-2 py-1 hover:bg-blue-100 rounded-md">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center text-gray-500 p-4">Belum ada tugas</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php if (isset($editData) && $editData): ?>
    <?php include __DIR__ . '/../partials/modal-detail-tugas.php'; ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('modalDetail');
            if (modal) modal.style.display = 'flex';
        });
    </script>
<?php endif; ?>

<?php include __DIR__ . '/../layout/footer.php'; ?>
<script src="../assets/js/modal.js"></script>