let prioritasTerpilih = "";

function pilihPrioritas(button, level) {
    document.querySelectorAll(".prioritas-btn").forEach(btn => {
        btn.classList.remove("bg-indigo-600", "text-white");
    });
    button.classList.add("bg-indigo-600", "text-white");
    prioritasTerpilih = level;
}

function bukaModal() {
    document.getElementById("modalTambahTugas").classList.remove("hidden");
}

function tutupModal() {
    document.getElementById("modalTambahTugas").classList.add("hidden");
    prioritasTerpilih = "";
}

function simpanTugas() {
    const judul = document.getElementById("judulTugas").value;
    const deskripsi = document.getElementById("deskripsiTugas").value;
    const kategori = document.getElementById("kategoriTugas").value;
    const tenggat = document.getElementById("tenggatTugas").value;

    if (!judul || !deskripsi || !kategori || !tenggat || !prioritasTerpilih) {
        alert("Harap lengkapi semua field!");
        return;
    }

    const taskList = document.getElementById("task-list");
    const newCard = document.createElement("div");
    newCard.className = "bg-white p-4 rounded-xl shadow relative group";
    newCard.innerHTML = `
        <span class="text-xs bg-purple-100 text-purple-600 px-2 py-0.5 rounded-full"><i class="fas fa-briefcase mr-1"></i>${kategori}</span>
        <div class="flex items-start gap-2 mt-2">
            <div>
                <h3 class="font-semibold text-gray-800">${judul}</h3>
                <p class="text-sm text-gray-600">${deskripsi}</p>
            </div>
        </div>
        <div class="flex justify-between text-sm text-gray-500 mt-2">
            <span class="flex items-center gap-1"><i class="fas fa-calendar-alt"></i> ${tenggat}</span>
            <span class="text-red-600 font-medium"><i class="fas fa-flag mr-1"></i>Prioritas ${prioritasTerpilih}</span>
        </div>`;
    taskList.appendChild(newCard);
    tutupModal();
}
