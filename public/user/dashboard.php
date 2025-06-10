<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TaskMaster - Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-50 text-gray-800 font-sans">
  <!-- Header -->
  <header class="bg-white shadow flex justify-between items-center px-6 py-4">
    <div class="text-xl font-bold text-indigo-600">Ketu <span class="text-sm text-gray-600">Kelola Tugasmu Dengan baik</span></div>
    <div class="flex items-center gap-4">
      <div class="relative">
        <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full"></span>
        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 00-4 0v1.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </div>
      <div class="flex items-center space-x-2">
        <span class="font-semibold">Bram ahimsa nih</span>
        <div class="w-8 h-8 rounded-full bg-indigo-500 text-white flex items-center justify-center">vrim</div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="p-6 space-y-6">
    <!-- Search & Filter -->
    <div class="flex justify-between items-center">
      <input type="text" placeholder="Cari tugas" class="w-1/3 p-2 border border-white rounded-xl shadow-sm bg-gray-50 focus:outline-none focus:ring-transparent focus:border-white" />

      <div class="space-x-2">
        <button class="bg-white border border-gray-300 text-sm px-3 py-1 rounded-full">Kategori: Pekerjaan</button>
        <button class="bg-red-100 text-red-600 text-sm px-3 py-1 rounded-full">Prioritas: Tinggi</button>
        <button class="bg-blue-100 text-blue-600 text-sm px-3 py-1 rounded-full">Status: Belum Selesai</button>
        <button class="text-sm text-gray-600 underline">Hapus Semua</button>
        <button class="bg-indigo-600 text-white text-sm px-4 py-2 rounded-md ml-2">+ Tambah Tugas</button>
      </div>
    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-4 gap-4">
      <div class="bg-white p-4 rounded shadow">
        <p class="text-sm font-medium text-gray-500">Total Tugas</p>
        <p class="text-2xl font-bold">24</p>
        <p class="text-xs text-gray-400">+3 dari minggu lalu</p>
      </div>
      <div class="bg-white p-4 rounded shadow">
        <p class="text-sm font-medium text-gray-500">Tugas Selesai</p>
        <p class="text-2xl font-bold text-green-600">16</p>
        <p class="text-xs text-gray-400">+5 dari minggu lalu</p>
      </div>
      <div class="bg-white p-4 rounded shadow">
        <p class="text-sm font-medium text-gray-500">Tugas Tertunda</p>
        <p class="text-2xl font-bold text-yellow-500">8</p>
        <p class="text-xs text-gray-400">+2 dari minggu lalu</p>
      </div>
      <div class="bg-white p-4 rounded shadow">
        <p class="text-sm font-medium text-gray-500">Prioritas Tinggi</p>
        <p class="text-2xl font-bold text-pink-600">5</p>
        <p class="text-xs text-gray-400">+1 dari minggu lalu</p>
      </div>
    </div>

    <!-- Progres -->
    <div class="bg-white p-4 rounded shadow">
      <p class="text-sm font-medium text-gray-600 mb-2">Progres Tugas</p>
      <div class="w-full bg-gray-200 h-2 rounded-full">
        <div class="bg-indigo-600 h-2 rounded-full" style="width: 67%;"></div>
      </div>
      <div class="flex justify-between text-xs text-gray-500 mt-1">
        <span>0%</span>
        <span>67%</span>
        <span>100%</span>
      </div>
    </div>

    <!-- Kategori -->
    <div>
      <div class="flex justify-between items-center mb-2">
        <h2 class="text-lg font-bold">Kategori</h2>
        <a href="#" class="text-sm text-indigo-600">Lihat Semua</a>
      </div>
      <div class="grid grid-cols-4 gap-4">
        <a href="#">
          <div class="hover:bg-gray-100 bg-white p-4 rounded shadow flex flex-col space-y-1">
            <div class="flex items-center space-x-2 text-indigo-600">
              <svg class="w-5 h-5" fill="none" stroke="currentColor">
                <path d="M9 12h6M9 16h6M13 8h2M9 8h.01" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
              </svg>
              <p class="font-semibold">Pekerjaan</p>
            </div>
            <p class="text-sm text-gray-500">7 tugas</p>
            <div class="w-full bg-gray-200 h-1 rounded-full">
              <div class="bg-indigo-600 h-1 rounded-full" style="width: 40%;"></div>
            </div>
          </div>
        </a>
      </div>
    </div>

    <!-- Daftar Tugas -->
    <div>
      <h2 class="text-lg font-bold mb-2">Daftar Tugas</h2>
      <div id="task-list" class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white p-4 rounded shadow space-y-2 relative task-card">
          <div class="absolute top-2 right-2 flex space-x-2 text-gray-400">
            <button onclick="toggleComplete(this)" title="Tandai selesai">✅</button>
            <button onclick="editTask(this)" title="Edit tugas">✏️</button>
            <button onclick="deleteTask(this)" title="Hapus tugas">🗑️</button>
          </div>
          <span class="text-xs bg-indigo-100 text-indigo-600 px-2 py-0.5 rounded-full">Pekerjaan</span>
          <h3 class="font-semibold task-title">Presentasi Laporan Keuangan Q2</h3>
          <p class="text-sm text-gray-600 task-desc">Menyiapkan slide dan data untuk presentasi laporan keuangan kuartal kedua kepada tim manajemen.</p>
          <div class="flex justify-between text-sm text-gray-500 mt-2">
            <span>📅 10 Juni 2025</span>
            <span class="text-red-600 font-medium">Prioritas Tinggi</span>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Script interaktif -->
  <script>
    function toggleComplete(button) {
      const card = button.closest('.task-card');
      card.classList.toggle('opacity-50');
      button.textContent = button.textContent === '✅' ? '🔄' : '✅';
    }

    function deleteTask(button) {
      const card = button.closest('.task-card');
      if (confirm('Yakin ingin menghapus tugas ini?')) {
        card.remove();
      }
    }

    function editTask(button) {
      const card = button.closest('.task-card');
      const title = card.querySelector('.task-title');
      const desc = card.querySelector('.task-desc');

      const newTitle = prompt('Edit Judul:', title.textContent);
      const newDesc = prompt('Edit Deskripsi:', desc.textContent);

      if (newTitle !== null && newTitle.trim() !== '') title.textContent = newTitle;
      if (newDesc !== null && newDesc.trim() !== '') desc.textContent = newDesc;
    }
  </script>
</body>

</html>
