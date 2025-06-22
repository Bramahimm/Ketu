<?php include __DIR__ . '/../layout/header.php'; ?>
<?php include __DIR__ . '/../layout/navbar.php'; ?>
<?php include __DIR__ . '/../layout/sidebar.php'; ?>

<main class="flex-1 p-6 ml-64 pt-16">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Manajemen Pengguna</h2>
  </div>

  <?php if (!empty($_GET['success'])): ?>
    <div class="mb-4 p-3 rounded text-white bg-green-600">
      <?= htmlspecialchars($_GET['success']) ?>
    </div>
  <?php endif; ?>

  <!-- Statistik Jumlah Pengguna + Tombol Tambah -->
  <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
    <!-- Kartu Statistik -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 w-full md:w-auto">
      <div class="bg-white p-4 rounded-lg shadow-md text-center">
        <p class="text-3xl font-bold text-indigo-600"><?= $totalUser ?></p>
        <p class="text-sm text-gray-500">Total Pengguna</p>
      </div>
    </div>

    <!-- Tombol Tambah -->
    <a href="index.php?route=createUser"
      class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition-all duration-300 ease-out transform hover:-translate-y-1 hover:scale-105 whitespace-nowrap">
      <i class="fas fa-plus"></i> Tambah Pengguna
    </a>
  </div>


  <!-- Tabel User -->
  <div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="px-4 sm:px-6 py-4 bg-gray-50 border-b">
      <h3 class="text-lg font-semibold text-gray-800">Daftar Pengguna</h3>
    </div>
    <div class="overflow-x-auto">
      <table class="w-full text-sm text-left text-gray-700">
        <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
          <tr>
            <th class="px-4 py-3 whitespace-nowrap">No</th>
            <th class="px-4 py-3 whitespace-nowrap">Nama</th>
            <th class="px-4 py-3 whitespace-nowrap">Email</th>
            <th class="px-4 py-3 whitespace-nowrap">Role</th>
            <th class="px-4 py-3 whitespace-nowrap text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <?php if (!empty($userList)): ?>
            <?php $no = 1;
            foreach ($userList as $user): ?>
              <?php
              $role = $user['role'];
              $roleColor = match ($role) {
                'admin' => 'bg-blue-100 text-blue-800',
                'pengurus' => 'bg-yellow-100 text-yellow-800',
                'anggota' => 'bg-green-100 text-green-800',
                default => 'bg-gray-100 text-gray-600'
              };
              ?>
              <tr class="hover:bg-gray-50">
                <td class="px-4 py-3"><?= $no++ ?></td>
                <td class="px-4 py-3 font-medium"><?= htmlspecialchars($user['nama']) ?></td>
                <td class="px-4 py-3"><?= htmlspecialchars($user['email']) ?></td>
                <td class="px-4 py-3">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?= $roleColor ?>">
                    <?= ucfirst($role) ?>
                  </span>
                </td>
                <td class="px-4 py-3 text-center">
                  <div class="flex justify-center gap-2">
                    <a href="index.php?route=editUser&id=<?= $user['idUser'] ?>"
                      class="text-blue-600 hover:text-blue-900 bg-blue-100 hover:bg-blue-200 px-3 py-1 rounded text-center">Edit</a>
                    <a href="index.php?route=detailPengguna&id=<?= $user['idUser'] ?>"
                      class="text-blue-600 hover:underline">Detail</a>
                    <a href="index.php?route=dashboardAdmin&hapus=<?= $user['idUser'] ?>"
                      onclick="return confirm('Yakin ingin menghapus user ini?')"
                      class="text-red-600 hover:text-red-900 bg-red-100 hover:bg-red-200 px-3 py-1 rounded text-center">Hapus</a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="5" class="text-center py-4 text-gray-500">
                <i class="fas fa-users-slash text-3xl mb-2"></i>
                <p>Belum ada pengguna.</p>
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include __DIR__ . '/../layout/footer.php'; ?>