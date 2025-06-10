<!-- untuk header dashboard -->
<header class="bg-white shadow flex justify-between items-center px-6 py-4">
    <div class="text-xl font-bold text-indigo-600">Ketu <span class="text-sm text-gray-600">Kelola Tugasmu Dengan baik</span></div>
    <div class="flex items-center gap-4">
        <div class="relative">
            <button id="profileButton" class="flex items-center space-x-2 focus:outline-none">
                <span class="font-semibold">Bram Ahimsa Simbolon</span>
                <ion-avatar class="w-8 h-8">
                    <img src="../../assets/fotoSayaa.jpg" alt="Avatar" class="w-full h-full object-cover rounded-full">
                </ion-avatar>
            </button>
            <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg p-2 hidden">
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100"><i class="fas fa-user mr-2"></i>Profil Saya</a>
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100"><i class="fas fa-cog mr-2"></i>Pengaturan</a>
                <a href="../../src/includes/logout.php" class="block px-4 py-2 text-red-600 hover:bg-red-100"><i class="fas fa-sign-out-alt mr-2"></i>Keluar</a>
            </div>
        </div>
    </div>
</header>
