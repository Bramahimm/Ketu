<?php
require_once __DIR__ . '/../includes/helpers.php';
$title = 'Ketu - Register';
include __DIR__ . '/../layout/header.php'; // pastikan header.php sudah berisi <meta name="viewport"...>
?>

<body class="flex items-center justify-center bg-red-800 py-8 px-4 min-h-screen">
  <div class="bg-white shadow-lg flex flex-col md:flex-row rounded-xl overflow-hidden w-full max-w-sm sm:max-w-md md:max-w-4xl">
    <!-- Gambar kiri, hidden di mobile -->
    <div class="hidden md:block md:w-1/2 relative">
      <img
        src="assets/img/logoKetu.png"
        alt="Illustration"
        class="object-cover w-full h-full" />
      <div class="absolute bottom-0 left-0 w-full text-black p-4 bg-gray-500 bg-opacity-50">
        <p class="text-sm font-semibold">Sistem Kelola Tugas & Organisasi (SiKetu)</p>
      </div>
    </div>

    <!-- Form Registrasi -->
    <div class="w-full md:w-1/2 p-6 md:p-8">
      <div class="text-center mb-6">
        <img src="assets/img/logoKetu.png" alt="Unila" class="mx-auto w-16 md:w-20 mb-2" />
        <h2 class="text-xl font-semibold text-gray-700">Silakan Daftar</h2>

        <?php if (isset($_GET['error'])): ?>
          <p class="text-red-600 text-sm mt-2"><?= htmlspecialchars($_GET['error']) ?></p>
        <?php endif; ?>
      </div>

      <form action="index.php?route=register" method="POST" class="space-y-4">
        <div>
          <label class="sr-only">Nama Lengkap</label>
          <input
            type="text" name="nama" placeholder="Nama Lengkap" required
            class="w-full py-2 px-3 border rounded-md focus:outline-none focus-within:ring-2 focus-within:ring-blue-400" />
        </div>

        <div>
          <label class="sr-only">Email</label>
          <input
            type="email" name="email" placeholder="Email" required
            class="w-full py-2 px-3 border rounded-md focus:outline-none focus-within:ring-2 focus-within:ring-blue-400" />
        </div>

        <div>
          <label class="sr-only">Password</label>
          <input
            type="password" name="password" placeholder="Password" required
            class="w-full py-2 px-3 border rounded-md focus:outline-none focus-within:ring-2 focus-within:ring-blue-400" />
        </div>

        <div>
          <label class="sr-only">Peran</label>
          <select
            name="role" id="roleSelect" required
            class="w-full py-2 px-3 border rounded-md focus:outline-none focus-within:ring-2 focus-within:ring-blue-400">
            <option value="">Pilih Peran</option>
            <option value="anggota">Anggota</option>
            <option value="pengurus">Pengurus</option>
          </select>
        </div>

        <div id="orgGroup" class="hidden">
          <label class="sr-only">Nama Organisasi</label>
          <input
            type="text" name="namaOrganisasi" id="orgInput" placeholder="Nama Organisasi"
            class="w-full py-2 px-3 border rounded-md focus:outline-none focus-within:ring-2 focus-within:ring-blue-400" />
        </div>

        <div class="flex justify-center">
          <button
            type="submit" name="register"
            class="w-full sm:w-1/2 bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
            Daftar
          </button>
        </div>
      </form>

      <p class="text-sm text-center mt-4">
        Sudah punya akun?
        <a href="index.php?route=login" class="text-blue-600 hover:underline">Login</a>
      </p>
    </div>
  </div>

  <script>
    const roleSelect = document.getElementById('roleSelect');
    const orgGroup = document.getElementById('orgGroup');
    const orgInput = document.getElementById('orgInput');

    roleSelect.addEventListener('change', function() {
      if (this.value === 'pengurus') {
        orgGroup.classList.remove('hidden');
        orgInput.setAttribute('required', 'required');
      } else {
        orgGroup.classList.add('hidden');
        orgInput.removeAttribute('required');
      }
    });
  </script>
</body>