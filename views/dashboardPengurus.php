<?php
include __DIR__ . '/../layout/header.php';
include __DIR__ . '/../layout/navbar.php';
include __DIR__ . '/../layout/sidebar.php';
?>

<div class="pt-16 flex flex-col md:flex-row min-h-screen bg-gray-50">
  <main class="flex-1 p-4 sm:p-6 md:ml-64">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Daftar Tugas</h2>

    <!-- Statistik -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
      <div class="bg-white p-4 rounded-lg shadow-md text-center">
        <p class="text-3xl font-bold text-blue-600"><?= $tugasAktif ?></p>
        <p class="text-sm text-gray-500">Tugas Aktif</p>
      </div>
      <div class="bg-white p-4 rounded-lg shadow-md text-center">
        <p class="text-3xl font-bold text-green-600"><?= $tugasSelesai ?></p>
        <p class="text-sm text-gray-500">Tugas Selesai</p>
      </div>
      <div class="bg-white p-4 rounded-lg shadow-md text-center">
        <p class="text-3xl font-bold text-purple-600"><?= $tugasMingguIni ?></p>
        <p class="text-sm text-gray-500">Tugas Minggu Ini</p>
      </div>
      <div class="bg-white p-4 rounded-lg shadow-md text-center">
        <p class="text-3xl font-bold text-yellow-600"><?= $kegiatanMingguIni ?></p>
        <p class="text-sm text-gray-500">Kegiatan Minggu Ini</p>
      </div>
    </div>

    <!-- Alert -->
    <?php if (!empty($message)): ?>
      <div class="mb-6 p-4 rounded-lg <?= $messageType === 'success' ? 'bg-green-100 text-green-800 border border-green-300' : 'bg-red-100 text-red-800 border border-red-300' ?>">
        <i class="fas <?= $messageType === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle' ?> mr-2"></i>
        <?= htmlspecialchars($message) ?>
      </div>
    <?php endif; ?>

    <!-- Tabel -->
    <div class="bg-white rounded-lg shadow-md p-4 sm:p-6 overflow-x-auto">
      <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-100 text-gray-700">
          <tr>
            <th class="px-4 py-2 text-left whitespace-nowrap">No</th>
            <th class="px-4 py-2 text-left whitespace-nowrap">Judul</th>
            <th class="px-4 py-2 text-left whitespace-nowrap">Deskripsi</th>
            <th class="px-4 py-2 text-left whitespace-nowrap">Deadline</th>
            <th class="px-4 py-2 text-left whitespace-nowrap">Status</th>
            <th class="px-4 py-2 text-center whitespace-nowrap">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-100">
          <?php $no = 1;
          foreach ($tugasList as $data): ?>
            <tr class="hover:bg-gray-50">
              <td class="px-4 py-2"><?= $no++ ?></td>
              <td class="px-4 py-2 font-medium text-gray-800"><?= htmlspecialchars($data['judul']) ?></td>
              <td class="px-4 py-2 text-gray-600"><?= htmlspecialchars($data['deskripsi']) ?></td>
              <td class="px-4 py-2 text-gray-600"><?= date('d-m-Y', strtotime($data['deadline'])) ?></td>
              <td class="px-4 py-2 font-semibold <?= $data['status'] === 'Selesai' ? 'text-green-600' : 'text-red-600' ?>">
                <?= ucfirst($data['status']) ?>
              </td>
              <td class="px-4 py-2 text-center space-x-2">
                <a href="index.php?route=dashboard&detail=<?= $data['idTugas'] ?>"
                  class="inline-block px-3 py-1 text-sm text-blue-600 border border-blue-200 hover:bg-blue-100 rounded">
                  Detail
                </a>
                <a href="index.php?route=dashboard&hapus=<?= $data['idTugas'] ?>"
                  onclick="return confirm('Yakin ingin menghapus tugas ini?')"
                  class="inline-block px-3 py-1 text-sm text-red-600 border border-red-200 hover:bg-red-100 rounded">
                  Hapus
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
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