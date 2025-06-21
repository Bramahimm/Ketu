function openModal(id) {
  const modal = document.getElementById(id);
  if (modal) {
    modal.classList.remove('hidden');
  }
}

function closeModal(id) {
  const modal = document.getElementById(id);
  if (modal) {
    modal.classList.add('hidden');
  }
}


// Utility to fill modal content for task detail
function fillTaskModal(taskData) {
  document.getElementById('modal-id').textContent = taskData.idTugas || '-';
  document.getElementById('modal-judul').textContent = taskData.judul || '-';
  document.getElementById('modal-deskripsi').textContent = taskData.deskripsi || '-';
  document.getElementById('modal-iduser')?.textContent = taskData.idUser || '-';

  if (taskData.deadline) {
    const date = new Date(taskData.deadline);
    const formatted = date.toLocaleDateString('id-ID', {
      day: '2-digit', month: '2-digit', year: 'numeric'
    });
    document.getElementById('modal-deadline').textContent = formatted;
  } else {
    document.getElementById('modal-deadline').textContent = '-';
  }

  const statusEl = document.getElementById('modal-status');
  if (statusEl) {
    const status = taskData.status || '-';
    statusEl.textContent = status.charAt(0).toUpperCase() + status.slice(1);
    statusEl.className = 'font-semibold ' + (status === 'Selesai' ? 'text-green-600' : 'text-red-600');
  }

  showModal('taskModal');
}

// Event listeners for global modal control
window.addEventListener('click', function(event) {
  const modal = document.getElementById('taskModal');
  if (event.target === modal) closeModal('taskModal');
});

document.addEventListener('keydown', function(event) {
  if (event.key === 'Escape') closeModal('taskModal');
});

function confirmHapus(id) {
    const modal = document.getElementById('modalHapus');
    const link = document.getElementById('btnHapusLink');
    if (modal && link) {
        link.href = `index.php?route=tugas&hapus=${id}`;
        modal.classList.remove('hidden');
    }
}
