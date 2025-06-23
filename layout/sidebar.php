<?php
require_once __DIR__ . '/../includes/helpers.php';
$role = $_SESSION['user']['role'] ?? 'anggota';
$pendingCount = ($role === 'pengurus') ? getPendingRequestCount($conn, $_SESSION['user']['id']) : 0;
?>

<!-- SIDEBAR -->
<aside id="sidebar"
  class="w-64 bg-white shadow-md h-screen fixed top-16 left-0 transform -translate-x-full md:translate-x-0 transition-transform duration-200 ease-in-out z-40 md:z-auto">

  <nav class="p-6">
    <ul class="space-y-3">
      <!-- DASHBOARD -->
      <li>
        <a href="index.php?route=dashboard" class="flex items-center p-3 rounded-md hover:bg-gray-100">
          <i class="fas fa-home w-5"></i>
          <span class="ml-3">Dashboard</span>
        </a>
      </li>

      <!-- TUGAS (admin, pengurus, anggota) -->
      <li>
        <a href="index.php?route=tugas" class="flex items-center p-3 rounded-md hover:bg-gray-100">
          <i class="fas fa-tasks w-5"></i>
          <span class="ml-3">Tugas</span>
        </a>
      </li>

      <!-- JADWAL (hanya non-admin) -->
      <?php if ($role !== 'admin'): ?>
        <li>
          <a href="index.php?route=jadwal-kegiatan-<?= $role ?>" class="flex items-center p-3 rounded-md hover:bg-gray-100">
            <i class="fas fa-calendar w-5"></i>
            <span class="ml-3">Jadwal Kegiatan</span>
          </a>
        </li>
      <?php endif; ?>

      <!-- VERIFIKASI (pengurus saja) -->
      <?php if ($role === 'pengurus'): ?>
        <li>
          <a href="index.php?route=verifikasi-request" class="flex items-center p-3 rounded-md hover:bg-gray-100">
            <i class="fas fa-user-clock w-5"></i>
            <span class="ml-3 flex items-center gap-1">Permintaan
              <?php if ($pendingCount > 0): ?>
                <span class="ml-1 px-2 py-0.5 text-xs font-bold text-white bg-red-600 rounded-full">
                  <?= $pendingCount ?>
                </span>
              <?php endif; ?>
            </span>
          </a>
        </li>
      <?php endif; ?>

      <!-- ORGANISASI (anggota saja) -->
      <?php if ($role === 'anggota'): ?>
        <li>
          <a href="index.php?route=organisasi"
            class="flex items-center p-3 rounded-md <?= activeClass('organisasi') ?> hover:bg-gray-100">
            <i class="fas fa-building w-5"></i>
            <span class="ml-3">Organisasi</span>
          </a>
        </li>
      <?php endif; ?>

      <!-- LOGOUT -->
      <li class="pt-4 border-t">
        <a href="process/logout.php" class="flex items-center p-3 hover:bg-red-100 text-red-700 rounded-md">
          <i class="fas fa-sign-out-alt w-5"></i>
          <span class="ml-3">Logout</span>
        </a>
      </li>
    </ul>
  </nav>
</aside>

<script>
  function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("-translate-x-full");
  }
</script>
