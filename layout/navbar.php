<?php
if (!isset($namaUser) && isset($_SESSION['user']['nama'])) {
  $namaUser = $_SESSION['user']['nama'];
}
?>

<nav class="bg-blue-500 shadow-md px-4 sm:px-6 py-3 flex justify-between items-center fixed w-full top-0 left-0 z-50">
  <!-- Tambahkan sebelum logo di navbar.php -->
  <button class="block md:hidden mr-3" onclick="toggleSidebar()">
    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M4 6h16M4 12h16M4 18h16" />
    </svg>
  </button>
  <!-- Logo kiri -->
  <div class="flex items-center gap-3">
    <img src="assets/img/orgenius.png" class="w-10 h-10" alt="Logo">
    <h1 class="text-lg sm:text-xl font-bold text-blue-700">Ketu</h1>
  </div>

  <!-- Profil kanan (responsif) -->
  <div class="flex items-center gap-2 sm:gap-3">
    <span class="hidden xs:inline font-medium text-gray-800 text-sm sm:text-base">
      <?= htmlspecialchars($namaUser ?? 'Pengguna') ?>
    </span>
    <img
      src="https://ui-avatars.com/api/?name=<?= urlencode($namaUser ?? 'U') ?>"
      alt="Avatar"
      class="w-9 h-9 sm:w-10 sm:h-10 rounded-full border border-blue-200 shadow-sm">
  </div>
</nav>