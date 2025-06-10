<!-- Modal buat nambah Tugas -->
    <div id="modalTambahTugas"
        class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center hidden z-50">
        <div class="bg-white w-1/8 max-w-lg p-6 rounded-xl shadow-lg relative">
            <h2 class="text-xl font-bold mb-4">Tambah Tugas Baru</h2>

            <div class="space-y-3">
                <p class="text-black">Judul Tugas</p>
                <input type="text" id="judulTugas" placeholder="Masukkan judul tugas"
                    class="w-full rounded border-gray-300 focus:ring-indigo-500" />
                <p class="text-black">Deskripsi Tugas</p>
                <textarea id="deskripsiTugas" placeholder="Masukkan deskripsi tugas"
                    class="w-full rounded border-gray-300 focus:ring-indigo-500"></textarea>

                <div class="grid grid-cols-2 gap-4">
                    <select id="kategoriTugas" class="w-full rounded border-gray-300 focus:ring-indigo-500">
                        <option disabled selected>Pilih Kategori</option>
                        <option value="Pekerjaan">Pekerjaan</option>
                        <option value="Organisasi">Organisasi</option>
                        <option value="Akademik">Akademik</option>
                    </select>
                    <input type="date" id="tenggatTugas" class="w-full rounded border-gray-300 focus:ring-indigo-500" />
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-700 mb-1">Prioritas</p>
                    <div class="flex gap-2">
                        <button onclick="pilihPrioritas(this, 'Rendah')"
                            class="prioritas-btn border px-3 py-1 rounded-full text-black">🏳️ Rendah</button>
                        <button onclick="pilihPrioritas(this, 'Sedang')"
                            class="prioritas-btn border px-3 py-1 rounded-full text-black">🏴 Sedang</button>
                        <button onclick="pilihPrioritas(this, 'Tinggi')"
                            class="prioritas-btn border px-3 py-1 rounded-full text-black">🚩 Tinggi</button>
                    </div>
                </div>
            </div>

            <div class="mt-5 flex justify-end gap-2">
                <button onclick="tutupModal()" class="px-4 py-2 rounded border">Batal</button>
                <button onclick="simpanTugas()" class="px-4 py-2 bg-indigo-600 text-white rounded">Simpan Tugas</button>
            </div>

            <!-- Tombol close -->
            <button onclick="tutupModal()"
                class="absolute top-3 right-3 text-gray-400 hover:text-gray-700 text-xl">&times;</button>
        </div>
    </div>