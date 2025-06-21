<?php
?>
<div id="modalGabung" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
  <div class="bg-white rounded-lg shadow-md w-full max-w-lg p-6">
    <div class="flex justify-between items-center mb-4">
      <h3 class="text-xl font-semibold">Gabung Organisasi</h3>
      <button onclick="closeModal('modalGabung')" class="text-gray-600 hover:text-gray-900">
        <i class="fas fa-times"></i>
      </button>
    </div>
    <form method="POST" action="index.php?route=request-organisasi">
      <input type="hidden" name="request_gabung" value="1">
      <div class="space-y-4">
        <select name="idOrganisasi" class="w-full border rounded p-2" required>
          <option value="">-- Pilih Organisasi --</option>
          <?php
          $query = $conn->query("SELECT idOrganisasi, namaOrganisasi FROM organisasi");
          while ($org = $query->fetch_assoc()): ?>
            <option value="<?= $org['idOrganisasi'] ?>"><?= htmlspecialchars($org['namaOrganisasi']) ?></option>
          <?php endwhile; ?>
        </select>
        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded">Ajukan Permintaan</button>
      </div>
    </form>
  </div>
</div>