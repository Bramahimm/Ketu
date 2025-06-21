<?php
// File: views/requestOrganisasi.php
include __DIR__ . '/../layout/header.php';
include __DIR__ . '/../layout/navbar.php';
include __DIR__ . '/../layout/sidebar.php';
?>
<div class="flex pt-16">
  <main class="flex-1 p-6 ml-64">
    <h2 class="text-2xl font-bold mb-6">Ajukan Permintaan Gabung Organisasi</h2>

    <?php if (!empty($message)): ?>
      <div class="mb-6 p-4 rounded-lg <?= $messageType === 'success' ? 'bg-green-100 text-green-700 border border-green-200' : 'bg-red-100 text-red-700 border border-red-200' ?>">
        <?= htmlspecialchars($message) ?>
      </div>
    <?php endif; ?>

    <button onclick="openModal('modalGabung')" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
      + Ajukan Gabung Organisasi
    </button>
  </main>
</div>
<?php include __DIR__ . '/../partials/modal-request-gabung.php'; ?>
<?php include __DIR__ . '/../layout/footer.php'; ?>