<?php
include __DIR__ . '/../layout/header.php';
include __DIR__ . '/../layout/navbar.php';
include __DIR__ . '/../layout/sidebar.php';
?>

<main class="flex-1 p-6 ml-64 pt-16 bg-gray-50 min-h-screen">
  <div class="max-w-md mx-auto bg-white border border-gray-200 shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Detail Pengguna</h2>

    <?php if (!$userDetail): ?>
      <div class="text-center text-red-500 font-medium">Pengguna tidak ditemukan.</div>
    <?php else: ?>
      <div class="space-y-4">
        <div>
          <p class="text-sm text-gray-500">Nama</p>
          <p class="text-lg font-semibold text-gray-800"><?= htmlspecialchars($userDetail['nama']) ?></p>
        </div>
        <div>
          <p class="text-sm text-gray-500">Email</p>
          <p class="text-lg text-gray-700"><?= htmlspecialchars($userDetail['email']) ?></p>
        </div>
        <div>
          <p class="text-sm text-gray-500">Role</p>
          <span class="inline-block px-3 py-1 text-sm rounded-full 
            <?= $userDetail['role'] === 'admin' ? 'bg-blue-100 text-blue-700' : ($userDetail['role'] === 'pengurus' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700') ?>">
            <?= htmlspecialchars(ucfirst($userDetail['role'])) ?>
          </span>
        </div>
      </div>

      <div class="mt-8 text-center">
        <a href="index.php?route=dashboardAdmin" class="inline-block text-sm text-blue-600 hover:underline">← Kembali ke Daftar Pengguna</a>
      </div>
    <?php endif; ?>
  </div>
</main>

<?php include __DIR__ . '/../layout/footer.php'; ?>