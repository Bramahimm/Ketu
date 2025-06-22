<?php
$idEdit = (int) $_GET['edit'];
$stmtEdit = $conn->prepare("SELECT * FROM kegiatan WHERE idKegiatan = ? AND idPembuat = ?");
$stmtEdit->bind_param("ii", $idEdit, $_SESSION['user']['id']);
$stmtEdit->execute();
$editData = $stmtEdit->get_result()->fetch_assoc();
?>

<div id="modalEdit" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
  <div class="bg-white rounded-lg shadow-md w-full max-w-lg p-6">
    <div class="flex justify-between items-center mb-4">
      <h3 class="text-xl font-semibold">Edit Kegiatan</h3>
      <a href="index.php?route=jadwal-kegiatan-pengurus" class="text-gray-600 hover:text-gray-900">
        <i class="fas fa-times"></i>
      </a>
    </div>
    <form method="POST" action="index.php?route=jadwal-kegiatan-pengurus">
      <input type="hidden" name="edit_kegiatan" value="1">
      <input type="hidden" name="idKegiatan" value="<?= $editData['idKegiatan'] ?>">
      <div class="space-y-4">
        <input type="text" name="namaKegiatan" value="<?= htmlspecialchars($editData['namaKegiatan']) ?>" class="w-full border rounded p-2" placeholder="Nama Kegiatan" required>
        <textarea name="deskripsi" class="w-full border rounded p-2" rows="3" placeholder="Deskripsi"><?= htmlspecialchars($editData['deskripsi']) ?></textarea>
        <input type="date" name="tanggal" value="<?= $editData['tanggal'] ?>" class="w-full border rounded p-2" required>
        <input type="text" name="lokasi" value="<?= htmlspecialchars($editData['lokasi']) ?>" class="w-full border rounded p-2" placeholder="Lokasi" required>
        <select name="idOrganisasi" class="w-full border rounded p-2" required>
          <?php
          $orgStmt = $conn->prepare("SELECT o.idOrganisasi, o.namaOrganisasi FROM organisasi o
            INNER JOIN user_organisasi uo ON o.idOrganisasi = uo.idOrganisasi
            WHERE uo.idUser = ? AND uo.role = 'pengurus'");
          $orgStmt->bind_param("i", $_SESSION['user']['id']);
          $orgStmt->execute();
          $orgResult = $orgStmt->get_result();
          while ($org = $orgResult->fetch_assoc()): ?>
            <option value="<?= $org['idOrganisasi'] ?>" <?= $org['idOrganisasi'] == $editData['idOrganisasi'] ? 'selected' : '' ?>>
              <?= htmlspecialchars($org['namaOrganisasi']) ?>
            </option>
          <?php endwhile; ?>
        </select>
        <button type="submit" class="w-full bg-yellow-600 hover:bg-yellow-700 text-white py-2 rounded">Update</button>
      </div>
    </form>
  </div>
</div>
