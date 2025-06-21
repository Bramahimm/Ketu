<?php ?>
<div id="modalTambah" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
  <div class="bg-white rounded-lg shadow-md w-full max-w-md p-6">
    <div class="flex justify-between items-center mb-4">
      <h3 class="text-lg font-semibold">Tambah Tugas</h3>
      <button onclick="closeModal('modalTambah')" class="text-gray-600 hover:text-gray-900">
        <i class="fas fa-times"></i>
      </button>
    </div>
    <form method="POST">
      <div class="space-y-4">
        <input type="text" name="judul" class="w-full border rounded p-2" placeholder="Judul Tugas" required>
        <textarea name="deskripsi" class="w-full border rounded p-2" rows="3" placeholder="Deskripsi"></textarea>
        <input type="date" name="deadline" class="w-full border rounded p-2" required>
        <select name="status" class="w-full border rounded p-2">
          <option value="Belum">Belum</option>
          <option value="Selesai">Selesai</option>
        </select>
        <button type="submit" name="tambah_task" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded">Simpan</button>
      </div>
    </form>
  </div>
</div>