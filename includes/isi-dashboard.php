    <main class="p-6 space-y-6">
        <!-- Search & Filter -->
        <div class="flex justify-between items-center">
            <div class="w-1/3 bg-white rounded-xl shadow-sm px-0.5 py-0.5">
                <input type="text" placeholder="Cari tugas"
                    class="w-full bg-transparent border-none outline-none focus:ring-0 placeholder-gray-400 appearance-none" />
            </div>
            <div class="space-x-2">
                <button class="bg-white border border-gray-300 text-sm px-3 py-1 rounded-full"><i
                        class="fas fa-briefcase mr-1"></i>Kategori: Pekerjaan</button>
                <button class="bg-red-100 text-red-600 text-sm px-3 py-1 rounded-full"><i
                        class="fas fa-flag mr-1"></i>Prioritas: Tinggi</button>
                <button class="bg-blue-100 text-blue-600 text-sm px-3 py-1 rounded-full"><i
                        class="fas fa-tasks mr-1"></i>Status: Belum Selesai</button>
                <button class="text-sm text-gray-600 underline">Hapus Semua</button>
                <button onclick="bukaModal()" class="bg-indigo-600 text-white text-sm px-4 py-2 rounded-md ml-2"><i
                        class="fas fa-plus mr-1"></i>Tambah Tugas</button>
            </div>
        </div>

        <!-- Statistik -->
        <div class="grid grid-cols-4 gap-4">
            <div class="bg-white p-4 rounded shadow">
                <p class="text-sm font-medium text-gray-500">Total Tugas</p>
                <p class="text-2xl font-bold">24</p>
                <p class="text-xs text-gray-400">+3 dari minggu lalu</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <p class="text-sm font-medium text-gray-500">Tugas Selesai</p>
                <p class="text-2xl font-bold text-green-600">16</p>
                <p class="text-xs text-gray-400">+5 dari minggu lalu</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <p class="text-sm font-medium text-gray-500">Tugas Tertunda</p>
                <p class="text-2xl font-bold text-yellow-500">8</p>
                <p class="text-xs text-gray-400">+2 dari minggu lalu</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <p class="text-sm font-medium text-gray-500">Prioritas Tinggi</p>
                <p class="text-2xl font-bold text-pink-600">5</p>
                <p class="text-xs text-gray-400">+1 dari minggu lalu</p>
            </div>
        </div>

        <!-- Progress Bar -->
        <div class="bg-white p-4 rounded shadow">
            <p class="text-sm font-medium text-gray-600 mb-2">Progres Tugas</p>
            <div class="w-full bg-gray-200 h-2 rounded-full">
                <div class="bg-indigo-600 h-2 rounded-full" style="width: 67%;"></div>
            </div>
            <div class="flex justify-between text-xs text-gray-500 mt-1">
                <span>0%</span>
                <span>67%</span>
                <span>100%</span>
            </div>
        </div>

        <!-- Kategori -->
        <div>
            <div class="flex justify-between items-center mb-2">
                <h2 class="text-lg font-bold">Kategori</h2>
                <a href="#" class="text-sm text-indigo-600">Lihat Semua</a>
            </div>
            <div class="grid grid-cols-4 gap-4">
                <a href="#">
                    <div class="hover:bg-gray-100 bg-white p-4 rounded shadow flex flex-col space-y-1">
                        <div class="flex items-center space-x-2 text-indigo-600">
                            <i class="fas fa-briefcase"></i>
                            <p class="font-semibold">Pekerjaan</p>
                        </div>
                        <p class="text-sm text-gray-500">7 tugas</p>
                        <div class="w-full bg-gray-200 h-1 rounded-full">
                            <div class="bg-indigo-600 h-1 rounded-full" style="width: 40%;"></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Daftar Tugas -->
        <div>
            <h2 class="text-lg font-bold mb-2">Daftar Tugas</h2>
            <div id="task-list" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white p-4 rounded-xl shadow relative group">
                    <span class="text-xs bg-purple-100 text-purple-600 px-2 py-0.5 rounded-full"><i
                            class="fas fa-briefcase mr-1"></i>Pekerjaan</span>
                    <div class="flex items-start gap-2 mt-2">
                        <div>
                            <h3 class="font-semibold text-gray-800">Presentasi Laporan Keuangan Q2</h3>
                            <p class="text-sm text-gray-600">Menyiapkan slide dan data untuk presentasi laporan kuartal
                                kedua kepada tim manajemen.</p>
                        </div>
                    </div>
                    <div class="flex justify-between text-sm text-gray-500 mt-2">
                        <span class="flex items-center gap-1">
                            <i class="fas fa-calendar-alt"></i> 10 Juni 2025
                        </span>
                        <span class="text-red-600 font-medium"><i class="fas fa-flag mr-1"></i>Prioritas Tinggi</span>
                    </div>
                    <div class="absolute top-3 right-3">
                        <button onclick="toggleMenu(this)" class="text-gray-500 hover:text-gray-800 p-1 rounded-full">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div
                            class="hidden mt-2 w-40 bg-white rounded-lg shadow-lg absolute right-0 z-10 border text-sm">
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100"><i
                                    class="fas fa-pen mr-2"></i>Edit</a>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100"><i
                                    class="fas fa-copy mr-2"></i>Duplikat</a>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100"><i
                                    class="fas fa-check mr-2"></i>Tandai Selesai</a>
                            <a href="#" class="block px-4 py-2 text-red-600 hover:bg-red-100"><i
                                    class="fas fa-trash-alt mr-2"></i>Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>