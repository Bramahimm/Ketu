<?php ?>
<div id="modalHapus" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
  <div class="bg-white rounded-lg shadow-md w-full max-w-sm p-6">
    <h3 class="text-lg font-semibold mb-4">Konfirmasi Hapus</h3>
    <p class="text-gray-700 mb-6">Apakah kamu yakin ingin menghapus tugas ini?</p>
    <div class="flex justify-end gap-2">
      <button onclick="closeModal('modalHapus')" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Batal</button>
      <a id="btnHapusLink" href="#"
        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Hapus</a>
    </div>
  </div>
</div>