<?php
include __DIR__ . '/../layout/header.php';
include __DIR__ . '/../layout/navbar.php';
include __DIR__ . '/../layout/sidebar.php';
?>

<main class="flex-1 p-6 ml-64 pt-16">
  <div class="max-w-xl mx-auto bg-white shadow rounded p-6">
    <h2 class="text-xl font-semibold mb-4">Tambah Pengguna Baru</h2>

    <?php if (!empty($message)): ?>
      <div class="mb-4 p-3 rounded-lg <?= $messageType === 'success' ? 'bg-green-100 text-green-700 border border-green-300' : 'bg-red-100 text-red-700 border border-red-300' ?>">
        <?= htmlspecialchars($message) ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="index.php?route=tambah-pengguna">
      <div class="mb-4">
        <label class="block mb-1 font-medium">Nama</label>
        <input type="text" name="nama" class="w-full border p-2 rounded" required>
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-medium">Email</label>
        <input type="email" name="email" class="w-full border p-2 rounded" required>
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-medium">Password</label>
        <input type="password" name="password" class="w-full border p-2 rounded" required>
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-medium">Role</label>
        <select name="role" class="w-full border p-2 rounded" required>
          <option value="pengurus">Pengurus</option>
          <option value="anggota">Anggota</option>
        </select>
      </div>

      <button type="submit" name="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
        Tambah Pengguna
      </button>
    </form>
  </div>
</main>

<?php include __DIR__ . '/../layout/footer.php'; ?>