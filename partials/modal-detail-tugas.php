<div id="modalDetail" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl p-10 relative animate-fade-in-up">
    <!-- Tombol Close -->
    <a href="index.php?route=dashboard"
      class="absolute top-4 right-4 text-gray-500 hover:text-red-600 text-2xl transition">
      <i class="fas fa-times-circle"></i>
    </a>

    <!-- Header -->
    <div class="mb-8 border-b pb-6">
      <h2 class="text-3xl font-bold text-gray-800 flex items-center gap-3">
        <i class="fas fa-info-circle text-blue-500"></i>
        Detail Tugas
      </h2>
      <p class="text-base text-gray-500 mt-1">Informasi lengkap mengenai tugas yang telah dipilih.</p>
    </div>

    <!-- Konten utama -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-base text-gray-700">
      <div>
        <p class="mb-1 text-gray-500">Judul</p>
        <p class="text-xl font-semibold text-gray-900"><?= htmlspecialchars($editData['judul']) ?></p>
      </div>

      <div>
        <p class="mb-1 text-gray-500">Deadline</p>
        <p class="text-lg"><?= date('d M Y', strtotime($editData['deadline'])) ?></p>
      </div>

      <div class="md:col-span-2">
        <p class="mb-1 text-gray-500">Deskripsi</p>
        <div class="p-4 bg-gray-50 rounded border text-base leading-relaxed whitespace-pre-line">
          <?= nl2br(htmlspecialchars($editData['deskripsi'])) ?>
        </div>
      </div>

      <div>
        <p class="mb-1 text-gray-500">Status</p>
        <?php
        $status = strtolower($editData['status']);
        $badgeClass = match ($status) {
          'selesai' => 'bg-green-100 text-green-800 border border-green-200',
          'belum'   => 'bg-red-100 text-red-800 border border-red-200',
          'proses'  => 'bg-yellow-100 text-yellow-800 border border-yellow-200',
          default   => 'bg-gray-100 text-gray-600 border border-gray-200'
        };
        ?>

        <span class="inline-block px-4 py-2 rounded-full border text-sm font-semibold <?= $badgeClass ?>">
          <?= ucfirst($editData['status']) ?>
        </span>
      </div>
    </div>
  </div>
</div>