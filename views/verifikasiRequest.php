<?php
// File: views/verifikasiRequest.php
include __DIR__ . '/../layout/header.php';
include __DIR__ . '/../layout/navbar.php';
include __DIR__ . '/../layout/sidebar.php';
?>
<div class="flex pt-16">
  <main class="flex-1 p-6 ml-64">
    <h2 class="text-2xl font-bold mb-6">Permintaan Bergabung</h2>

    <?php if ($requests && $requests->num_rows > 0): ?>
      <div class="overflow-x-auto">
        <table class="w-full text-sm">
          <thead class="bg-gray-100">
            <tr>
              <th class="p-2">Nama</th>
              <th class="p-2">Organisasi</th>
              <th class="p-2">Tanggal</th>
              <th class="p-2 text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($requests as $req): ?>
              <tr class="border-t hover:bg-gray-50">
                <td class="p-2"><?= htmlspecialchars($req['nama']) ?></td>
                <td class="p-2"><?= htmlspecialchars($req['namaOrganisasi']) ?></td>
                <td class="p-2"><?= date('d M Y', strtotime($req['tanggalRequest'])) ?></td>
                <td class="p-2 text-center space-x-2">
                  <a href="index.php?route=verifikasi-request&action=accept&id=<?= $req['idRequest'] ?>"
                    class="bg-green-100 text-green-700 px-3 py-1 rounded hover:bg-green-200">Terima</a>
                  <a href="index.php?route=verifikasi-request&action=reject&id=<?= $req['idRequest'] ?>"
                    class="bg-red-100 text-red-700 px-3 py-1 rounded hover:bg-red-200">Tolak</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php else: ?>
      <div class="bg-white p-6 rounded shadow text-center">
        <i class="fas fa-user-friends text-4xl text-gray-400 mb-3"></i>
        <p class="text-gray-600">Tidak ada permintaan bergabung saat ini.</p>
      </div>
    <?php endif; ?>
  </main>
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>