<!-- Modal buat nambah Tugas -->
<div id="modalTambahTugas" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center hidden z-50">
    <div class="bg-white w-full max-w-lg p-6 rounded-xl shadow-lg relative">
        <h4 class="text-xl font-medium mb-4">Tambah Tugas Baru</h4>

        <form action="tambah_tugas.php" method="POST">
            <div class="space-y-3">
                <label for="judulTugas" class="text-black">Judul Tugas</label>
                <input type="text" name="judul" id="judulTugas" placeholder="Masukkan judul tugas"
                    class="w-full rounded border-gray-300 focus:ring-indigo-500" required />

                <label for="deskripsiTugas" class="text-black">Deskripsi Tugas</label>
                <textarea name="deskripsi" id="deskripsiTugas" placeholder="Masukkan deskripsi tugas"
                    class="w-full rounded border-gray-300 focus:ring-indigo-500" required></textarea>

                <div class="grid grid-cols-2 gap-4">
                    <select name="kategori" id="kategoriTugas"
                        class="w-full rounded border-gray-300 focus:ring-indigo-500" required>
                        <option disabled selected>Pilih Kategori</option>
                        <option value="Pekerjaan">Pekerjaan</option>
                        <option value="Organisasi">Organisasi</option>
                        <option value="Akademik">Akademik</option>
                    </select>
                    <input type="date" name="deadline" id="tenggatTugas"
                        class="w-full rounded border-gray-300 focus:ring-indigo-500" required />
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-700 mb-1">Prioritas</p>
                    <div class="flex gap-4">
                        <label class="flex items-center gap-1">
                            <input type="radio" name="prioritas" value="Rendah" checked>
                            🏳️ Rendah
                        </label>
                        <label class="flex items-center gap-1">
                            <input type="radio" name="prioritas" value="Sedang">
                            🏴 Sedang
                        </label>
                        <label class="flex items-center gap-1">
                            <input type="radio" name="prioritas" value="Tinggi">
                            🚩 Tinggi
                        </label>
                    </div>
                </div>


            </div>

            <div class="mt-5 flex justify-end gap-2">
                <button type="button" onclick="tutupModal()" class="px-4 py-2 rounded border">Batal</button>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded" name="simpan_tugas">Simpan
                    Tugas</button>
            </div>
        </form>

        <!-- Tombol close -->
        <button onclick="tutupModal()"
            class="absolute top-3 right-3 text-gray-400 hover:text-gray-700 text-xl">&times;</button>
    </div>
</div>