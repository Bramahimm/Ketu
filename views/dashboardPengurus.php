<?php
include __DIR__ . '/../layout/header.php';
include __DIR__ . '/../layout/navbar.php';
include __DIR__ . '/../layout/sidebar.php';
?>

<div class="flex pt-16">
  <main class="flex-1 p-6 ml-64">
    <h2 class="text-2xl font-bold mb-4">Daftar Tugas</h2>

    <div class="flex flex-wrap justify-between items-center mb-6 gap-4">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 flex-1">
        <div class="bg-white p-4 rounded-lg shadow text-center">
          <p class="text-2xl font-bold text-blue-600"><?= $tugasAktif ?></p>
          <p class="text-sm text-gray-500">Tugas Aktif</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow text-center">
          <p class="text-2xl font-bold text-green-600"><?= $tugasSelesai ?></p>
          <p class="text-sm text-gray-500">Tugas Selesai</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow text-center">
          <p class="text-2xl font-bold text-purple-600"><?= $tugasMingguIni ?></p>
          <p class="text-sm text-gray-500">Tugas Minggu Ini</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow text-center">
          <p class="text-2xl font-bold text-yellow-600"><?= $kegiatanMingguIni ?></p>
          <p class="text-sm text-gray-500">Kegiatan Minggu Ini</p>
        </div>
      </div>
    </div>

    <?php if (!empty($message)): ?>
      <div class="mb-6 p-4 rounded-lg <?= $messageType === 'success' ? 'bg-green-100 text-green-700 border border-green-200' : 'bg-red-100 text-red-700 border border-red-200' ?>">
        <i class="fas <?= $messageType === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle' ?> mr-2"></i>
        <?= htmlspecialchars($message) ?>
      </div>
    <?php endif; ?>

    <div class="bg-white p-6 rounded-lg shadow">
      <div class="overflow-x-auto">
        <table class="w-full table-auto text-sm">
          <thead class="bg-gray-100 text-left">
            <tr>
              <th class="p-2">No</th>
              <th class="p-2">Judul</th>
              <th class="p-2">Deskripsi</th>
              <th class="p-2">Deadline</th>
              <th class="p-2">Status</th>
              <th class="p-2 text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($tugasList as $data): ?>
              <tr class="border-t hover:bg-gray-50">
                <td class="p-2"><?= $no++ ?></td>
                <td class="p-2 font-semibold"><?= htmlspecialchars($data['judul']) ?></td>
                <td class="p-2"><?= htmlspecialchars($data['deskripsi']) ?></td>
                <td class="p-2"><?= date('d-m-Y', strtotime($data['deadline'])) ?></td>
                <td class="p-2 text-<?= $data['status'] === 'Selesai' ? 'green' : 'red' ?>-600">
                  <?= ucfirst($data['status']) ?>
                </td>
                <td class="p-2 text-center space-x-1">
                  <a href="index.php?route=dashboard&detail=<?= $data['idTugas'] ?>" class="text-blue-600 hover:text-blue-800 px-2 py-1 hover:bg-blue-100 rounded-md">Detail</a>
                  <a href="index.php?route=dashboard&hapus=<?= $data['idTugas'] ?>" onclick="return confirm('Yakin ingin menghapus tugas ini?')" class="text-red-600 hover:text-red-800 px-2 py-1 hover:bg-red-100 rounded-md">Hapus</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>
</div>

<?php include __DIR__ . '/../partials/modal-tambah-tugas.php'; ?>
<?php $editData = $editData ?? null; ?>
<?php if ($editData) include __DIR__ . '/../partials/modal-detail-tugas.php'; ?>
<?php if (isset($editData) && $editData): ?>
  <?php include __DIR__ . '/../partials/modal-detail-tugas.php'; ?>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      showModal('modalDetail');
    });
  </script>
<?php endif; ?>

<?php include __DIR__ . '/../layout/footer.php'; ?>
<script src="../assets/js/modal.js"></script>