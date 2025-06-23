<?php include __DIR__ . '/../layout/header.php'; ?>
<?php include __DIR__ . '/../layout/navbar.php'; ?>
<?php include __DIR__ . '/../layout/sidebar.php'; ?>

<main class="flex-1 p-6 ml-64 pt-16">
  <h2 class="text-2xl font-bold mb-6">Tambah Pengguna Baru</h2>

  <?php if (!empty($message)): ?>
    <div class="mb-4 p-3 rounded text-white bg-red-600"><?= htmlspecialchars($message) ?></div>
  <?php endif; ?>

  <div class="bg-white p-6 rounded-lg shadow">
    <form method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div>
        <label class="block text-sm font-medium">Nama</label>
        <input type="text" name="nama" required class="w-full border rounded px-3 py-2">
      </div>

      <div>
        <label class="block text-sm font-medium">Email</label>
        <input type="email" name="email" required class="w-full border rounded px-3 py-2">
      </div>

      <div>
        <label class="block text-sm font-medium">Role</label>
        <select name="role" class="w-full border rounded px-3 py-2" required>
          <option value="anggota">Anggota</option>
          <option value="pengurus">Pengurus</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <div>
        <label class="block text-sm font-medium">Password</label>
        <input type="password" name="password" required class="w-full border rounded px-3 py-2">
      </div>

      <div class="col-span-2 text-right">
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
          Simpan
        </button>
      </div>
    </form>
  </div>
</main>

<?php include __DIR__ . '/../layout/footer.php'; ?>
