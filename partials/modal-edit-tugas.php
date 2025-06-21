<?php  ?>
<?php if ($editData): ?>
  <div id="modalEdit" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-md w-full max-w-md p-6">
      <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-semibold">Edit Tugas</h3>
        <a href="index.php?route=tugas" class="text-gray-600 hover:text-gray-900">
          <i class="fas fa-times"></i>
        </a>
      </div>
      <form method="POST">
        <input type="hidden" name="idTugas" value="<?= $editData['idTugas'] ?>">
        <div class="space-y-4">
          <input type="text" name="judul" class="w-full border rounded p-2" value="<?= htmlspecialchars($editData['judul']) ?>" required>
          <textarea name="deskripsi" class="w-full border rounded p-2" rows="3"><?= htmlspecialchars($editData['deskripsi']) ?></textarea>
          <input type="date" name="deadline" class="w-full border rounded p-2" value="<?= $editData['deadline'] ?>" required>
          <select name="status" class="w-full border rounded p-2">
            <option value="Belum" <?= $editData['status'] === 'Belum' ? 'selected' : '' ?>>Belum</option>
            <option value="Selesai" <?= $editData['status'] === 'Selesai' ? 'selected' : '' ?>>Selesai</option>
          </select>
          <button type="submit" name="edit_task" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded">Update</button>
        </div>
      </form>
    </div>
  </div>
<?php endif; ?>
