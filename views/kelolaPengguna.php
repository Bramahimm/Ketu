<?php
include __DIR__ . '/../layout/header.php';
include __DIR__ . '/../layout/navbar.php';
include __DIR__ . '/../layout/sidebar.php';
?>

<main class="flex-1 px-6 py-8 ml-64 pt-16 bg-gray-50 min-h-screen">
  <div class="max-w-6xl mx-auto">
    <div class="flex items-center justify-between mb-6">
      <h2 class="text-2xl font-bold text-gray-800">Kelola Pengguna</h2>
      <a href="index.php?route=tambah-pengguna"
        class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
        <i class="fas fa-user-plus mr-2"></i> Tambah Pengguna
      </a>
    </div>

    <?php if (!empty($message)): ?>
      <div class="mb-4 p-4 rounded-lg border
        <?= $messageType === 'success'
          ? 'bg-green-50 text-green-700 border-green-300'
          : 'bg-red-50 text-red-700 border-red-300' ?>">
        <?= htmlspecialchars($message) ?>
      </div>
    <?php endif; ?>

    <div class="bg-white shadow rounded-lg overflow-x-auto">
      <table class="min-w-full text-sm text-left border-collapse">
        <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
          <tr>
            <th class="px-4 py-3">No</th>
            <th class="px-4 py-3">Nama</th>
            <th class="px-4 py-3">Email</th>
            <th class="px-4 py-3">Role</th>
            <th class="px-4 py-3 text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="text-gray-700 divide-y">
          <?php if (!empty($users)): ?>
            <?php $no = 1;
            foreach ($users as $user): ?>
              <tr class="hover:bg-gray-50">
                <td class="px-4 py-3"><?= $no++ ?></td>
                <td class="px-4 py-3"><?= htmlspecialchars($user['nama']) ?></td>
                <td class="px-4 py-3"><?= htmlspecialchars($user['email']) ?></td>
                <td class="px-4 py-3 capitalize">
                  <span class="inline-block px-2 py-1 text-xs rounded-full 
                    <?= $user['role'] === 'admin' ? 'bg-blue-100 text-blue-700' : ($user['role'] === 'pengurus' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600') ?>">
                    <?= htmlspecialchars($user['role']) ?>
                  </span>
                </td>
                <td class="px-4 py-3 text-center space-x-3">
                  <a href="index.php?route=detail-pengguna&id=<?= $user['idUser'] ?>"
                    class="text-blue-600 hover:underline">Detail</a>
                  <a href="index.php?route=hapus-pengguna&id=<?= $user['idUser'] ?>"
                    onclick="return confirm('Yakin ingin menghapus pengguna ini?')"
                    class="text-red-600 hover:underline">Hapus</a>
                  <a href="index.php?route=edit-pengguna&id=<?= $user['idUser'] ?>"
                    class="text-yellow-600 hover:underline text-sm">Edit</a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="5" class="px-4 py-6 text-center text-gray-400 italic">
                Tidak ada pengguna.
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</main>


<?php include __DIR__ . '/../layout/footer.php'; ?>