<div id="modalTambah" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
  <div class="bg-white rounded-lg shadow-md w-full max-w-lg p-6">
    <div class="flex justify-between items-center mb-4">
      <h3 class="text-xl font-semibold">Tambah Kegiatan</h3>
      <button onclick="closeModal('modalTambah')" class="text-gray-600 hover:text-gray-900">
        <i class="fas fa-times"></i>
      </button>
    </div>
    <form method="POST" action="index.php?route=jadwal-kegiatan-pengurus">
      <input type="hidden" name="idOrganisasi" value="<?= htmlspecialchars($idOrganisasi) ?>">
      <input type="hidden" name="tambah_kegiatan" value="1">
      <div class="space-y-4">
        <input type="text" name="namaKegiatan" class="w-full border rounded p-2" placeholder="Nama Kegiatan" required>
        <textarea name="deskripsi" class="w-full border rounded p-2" rows="3" placeholder="Deskripsi"></textarea>
        <input type="date" name="tanggal" class="w-full border rounded p-2" required>
        <input type="text" name="lokasi" class="w-full border rounded p-2" placeholder="Lokasi" required>
        <select name="idOrganisasi" class="w-full border rounded p-2" required>
          <option value="">-- Pilih Organisasi --</option>
          <?php
          $orgStmt = $conn->prepare("SELECT o.idOrganisasi, o.namaOrganisasi FROM organisasi o
            INNER JOIN user_organisasi uo ON o.idOrganisasi = uo.idOrganisasi
            WHERE uo.idUser = ? AND uo.role = 'pengurus'");
          $orgStmt->bind_param("i", $_SESSION['user']['id']);
          $orgStmt->execute();
          $orgResult = $orgStmt->get_result();
          while ($org = $orgResult->fetch_assoc()): ?>
            <option value="<?= $org['idOrganisasi'] ?>"><?= htmlspecialchars($org['namaOrganisasi']) ?></option>
          <?php endwhile; ?>
        </select>
        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded">Simpan</button>
      </div>
    </form>
  </div>
</div>