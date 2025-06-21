<?php include __DIR__ . '/../layout/header.php'; ?>
<?php include __DIR__ . '/../layout/navbar.php'; ?>
<?php include __DIR__ . '/../layout/sidebar.php'; ?>

<main class="flex-1 p-6 ml-64 pt-16">
  <h2 class="text-2xl font-bold mb-6">Permintaan Bergabung</h2>

  <?php if (empty($daftarPermintaan)): ?>
    <div class="bg-white rounded p-6 text-center text-gray-500 border">
      <i class="fas fa-users text-4xl mb-2"></i>
      <p>Tidak ada permintaan bergabung saat ini.</p>
    </div>
  <?php else: ?>
    <div class="bg-white p-4 rounded shadow">
      <table class="w-full table-auto text-sm">
        <thead class="bg-gray-100">
          <tr>
            <th class="p-2">Nama</th>
            <th class="p-2">Email</th>
            <th class="p-2">Organisasi</th>
            <th class="p-2">Tanggal</th>
            <th class="p-2">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($daftarPermintaan as $row): ?>
            <tr class="border-t">
              <td class="p-2"><?= htmlspecialchars($row['nama']) ?></td>
              <td class="p-2"><?= htmlspecialchars($row['email']) ?></td>
              <td class="p-2"><?= htmlspecialchars($row['namaOrganisasi']) ?></td>
              <td class="p-2"><?= date('d/m/Y H:i', strtotime($row['tanggalRequest'])) ?></td>
              <td class="p-2 space-x-2">
                <a href="index.php?route=permintaan&terima=<?= $row['idRequest'] ?>"
                  class="text-green-600 hover:underline">Terima</a>
                <a href="index.php?route=permintaan&tolak=<?= $row['idRequest'] ?>"
                  class="text-red-600 hover:underline">Tolak</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</main>
<?php include __DIR__ . '/../layout/footer.php'; ?>