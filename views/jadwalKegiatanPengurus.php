<?php
include __DIR__ . '/../layout/header.php';
include __DIR__ . '/../layout/navbar.php';
include __DIR__ . '/../layout/sidebar.php';
?>
<div class="flex pt-16">
  <main class="flex-1 p-6 ml-64">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-2xl font-bold">Jadwal Kegiatan</h2>
      <button onclick="openModal('modalTambah')"
        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition duration-200">
        <i class="fas fa-plus"></i> Tambah Kegiatan
      </button>
    </div>

    <?php if (!empty($message)): ?>
      <div class="mb-6 p-4 rounded-lg <?= $messageType === 'success' ? 'bg-green-100 text-green-700 border border-green-200' : 'bg-red-100 text-red-700 border border-red-200' ?>">
        <i class="fas <?= $messageType === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle' ?> mr-2"></i>
        <?= htmlspecialchars($message) ?>
      </div>
    <?php endif; ?>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php if ($kegiatanList && $kegiatanList->num_rows > 0): ?>
        <?php while ($data = $kegiatanList->fetch_assoc()): ?>
          <div class="bg-white p-4 rounded-lg shadow border border-gray-200">
            <h3 class="text-lg font-semibold mb-1"><?= htmlspecialchars($data['namaKegiatan']) ?></h3>
            <p class="text-sm text-gray-600 mb-1">Tanggal: <?= date('d-m-Y', strtotime($data['tanggal'])) ?></p>
            <p class="text-sm text-gray-600 mb-1">Lokasi: <?= htmlspecialchars($data['lokasi']) ?></p>
            <?php if (!empty($data['deskripsi'])): ?>
              <p class="text-sm text-gray-600 mb-2">Deskripsi: <?= htmlspecialchars($data['deskripsi']) ?></p>
            <?php endif; ?>
            <div class="flex justify-end gap-2 mt-2">
              <a href="index.php?route=jadwal-kegiatan-pengurus&edit=<?= $data['idKegiatan'] ?>"
                class="text-blue-600 hover:underline text-sm">Edit</a>
              <a href="index.php?route=jadwal-kegiatan-pengurus&hapus=<?= $data['idKegiatan'] ?>"
                onclick="return confirm('Yakin ingin menghapus kegiatan ini?')"
                class="text-red-600 hover:underline text-sm">Hapus</a>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p class="text-gray-500 col-span-full">Belum ada kegiatan terdaftar.</p>
      <?php endif; ?>
    </div>
  </main>
</div>
<script>
  function openModal(id) {
    const modal = document.getElementById(id);
    if (modal) {
      modal.classList.remove('hidden');
    }
  }

  function closeModal(id) {
    const modal = document.getElementById(id);
    if (modal) {
      modal.classList.add('hidden');
    }
  }
</script>
<?php include __DIR__ . '/../partials/modal-tambah-kegiatan.php'; ?>
<?php if (!empty($_GET['edit'])) include __DIR__ . '/../partials/modal-edit-kegiatan.php'; ?>
<?php include __DIR__ . '/../layout/footer.php'; ?>