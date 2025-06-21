<?php
require_once __DIR__ . "/../includes/helpers.php";
$title = 'Orgenius - Login';
include __DIR__ . '/../layout/header.php';
?>

<body class="flex items-center justify-center bg-[#ffe4c4] py-8 px-4">
  <!-- max-w-sm di mobile, naik ke max-w-md di sm, baru ke 4xl di md -->
  <div class="bg-white shadow-lg flex flex-col md:flex-row rounded-xl overflow-hidden w-full max-w-sm sm:max-w-md md:max-w-4xl">
    <!-- Gambar kiri, hidden di mobile -->
    <div class="hidden md:block md:w-1/2 relative">
      <img
        src="assets/img/orgenius.png"
        alt="Gedung Rektorat"
        class="object-cover w-full h-full" />
      <div class="absolute bottom-0 left-0 w-full text-black p-4 bg-gray-500 bg-opacity-50">
        <p class="text-sm font-semibold">Sistem Kelola Tugas & Organisasi</p>
      </div>
    </div>

    <!-- Form Login -->
    <div class="w-full md:w-1/2 p-6 md:p-8">
      <div class="text-center mb-6">
        <img
          src="assets/img/orgenius.png"
          alt="Unila"
          class="mx-auto w-16 md:w-20 mb-2" />
        <h2 class="text-xl font-semibold text-gray-700">Silakan Login</h2>

        <?php if (isset($_GET['error'])): ?>
          <p class="text-red-600 text-sm mt-2">
            <?= $_GET['error'] === 'empty'
              ? "Email dan password wajib diisi."
              : ($_GET['error'] === 'invalid'
                ? "Email atau password salah."
                : "") ?>
          </p>
        <?php endif; ?>
      </div>

      <form action="index.php?route=login" method="POST" class="space-y-4">
        <div>
          <label class="sr-only">Email</label>
          <div class="flex items-center border rounded-md overflow-hidden focus-within:ring-2 focus-within:ring-blue-400">
            <span class="px-3 text-gray-500">
              <!-- icon -->
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                  stroke-width="2"
                  d="M16 14a4 4 0 01-8 0m8 0a4 4 0 01-8 0m8 0H8m4 0v4m0 0H8m4 0h4" />
              </svg>
            </span>
            <input type="email" name="email" placeholder="Email" required
              class="w-full py-2 px-3 focus:outline-none" />
          </div>
        </div>

        <div>
          <label class="sr-only">Password</label>
          <div class="flex items-center border rounded-md overflow-hidden focus-within:ring-2 focus-within:ring-blue-400">
            <span class="px-3 text-gray-500">
              <!-- icon -->
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 11c0-1.657 1.343-3 3-3s3 1.343 3 3m-6 0c0-1.657-1.343-3-3-3s-3 1.343-3 3m6 0v2m0 2h6m-6 0H6" />
              </svg>
            </span>
            <input type="password" name="password" placeholder="Password" required
              class="w-full py-2 px-3 focus:outline-none" />
          </div>
        </div>

        <div class="flex justify-center">
          <button type="submit"
            class="w-full sm:w-1/2 bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
            Login
          </button>
        </div>
      </form>

      <p class="text-sm text-center mt-4">
        <a href="index.php?route=register" class="text-blue-600 hover:underline">
          Belum Punya Akun?
        </a>
      </p>
    </div>
  </div>
</body>