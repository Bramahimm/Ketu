<?php include __DIR__ . '/../layout/header.php'; ?>
<?php include __DIR__ . '/../layout/navbar.php'; ?>
<?php include __DIR__ . '/../layout/sidebar.php'; ?>

<main class="ml-64 pt-16 px-6 bg-gray-50 min-h-screen">
  <div class="max-w-xl mx-auto bg-white rounded-lg shadow-lg p-6 mt-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Edit Pengguna</h2>

    <form method="POST" class="space-y-5">
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
        <input type="text" name="nama" value="<?= htmlspecialchars($userData['nama']) ?>"
          class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-3 py-2" required>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" name="email" value="<?= htmlspecialchars($userData['email']) ?>"
          class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-3 py-2" required>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
        <select name="role"
          class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-3 py-2" required>
          <option value="pengurus" <?= $userData['role'] === 'pengurus' ? 'selected' : '' ?>>Pengurus</option>
          <option value="anggota" <?= $userData['role'] === 'anggota' ? 'selected' : '' ?>>Anggota</option>
          <option value="admin" <?= $userData['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
        </select>
      </div>

      <div class="flex items-center justify-between">
        <button type="submit"
          class="bg-yellow-600 hover:bg-yellow-700 text-white px-5 py-2 rounded-md shadow">
          Simpan Perubahan
        </button>
        <a href="index.php?route=kelola-pengguna" class="text-blue-600 hover:underline text-sm">← Kembali</a>
      </div>
    </form>
  </div>
</main>


<?php include __DIR__ . '/../layout/footer.php'; ?>