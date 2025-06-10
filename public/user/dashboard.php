<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TaskMaster - Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-50 text-gray-800 font-sans">

  <!-- Floating Tambah Tugas Button -->
  <button onclick="document.getElementById('task-form').scrollIntoView({ behavior: 'smooth' })"
    class="fixed top-6 right-6 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-full shadow-lg flex items-center space-x-2 z-50">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
    </svg>
    <span>Tambah Tugas</span>
  </button>

  <header class="bg-white shadow flex justify-between items-center px-6 py-4">
    <div class="text-xl font-bold text-indigo-600">Ketu <span class="text-sm text-gray-600">Kelola Tugasmu Dengan baik</span></div>
    <div class="flex items-center gap-4">
      <div class="flex items-center space-x-2">
        <span class="font-semibold">Bram ahimsa nih</span>
        <div class="w-8 h-8 rounded-full bg-indigo-500 text-white flex items-center justify-center">vrim</div>
      </div>
    </div>
  </header>

  <main class="p-6 space-y-6">
    <!-- Form Tambah Tugas -->
    <div id="task-form" class="bg-white p-4 rounded shadow space-y-4">
      <h2 class="text-lg font-bold">Tambah / Edit Tugas</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <input type="text" id="title" placeholder="Judul Tugas" class="p-2 border rounded w-full" />
        <input type="text" id="category" placeholder="Kategori" class="p-2 border rounded w-full" />
        <input type="date" id="dueDate" class="p-2 border rounded w-full" />
      </div>
      <textarea id="description" placeholder="Deskripsi" class="p-2 border rounded w-full"></textarea>
      <select id="priority" class="p-2 border rounded w-full">
        <option value="Tinggi">Prioritas Tinggi</option>
        <option value="Sedang">Prioritas Sedang</option>
        <option value="Rendah">Prioritas Rendah</option>
      </select>
      <button onclick="saveTask()" class="bg-indigo-600 text-white px-4 py-2 rounded">Simpan Tugas</button>
    </div>

    <!-- Daftar Tugas -->
    <div>
      <h2 class="text-lg font-bold mb-2">Daftar Tugas</h2>
      <div id="taskList" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- Tugas akan dirender di sini -->
      </div>
    </div>
  </main>

  <script>
    let tasks = [];
    let editingIndex = null;

    function renderTasks() {
      const container = document.getElementById("taskList");
      container.innerHTML = "";
      tasks.forEach((task, index) => {
        container.innerHTML += `
          <div class="bg-white p-4 rounded shadow space-y-2 relative">
            <div class="flex items-center space-x-2">
              <input type="checkbox" ${task.done ? "checked" : ""} onclick="toggleDone(${index})">
              <span class="text-xs bg-indigo-100 text-indigo-600 px-2 py-0.5 rounded-full">${task.category}</span>
            </div>
            <h3 class="font-semibold ${task.done ? 'line-through text-gray-400' : ''}">${task.title}</h3>
            <p class="text-sm text-gray-600">${task.description}</p>
            <div class="flex justify-between text-sm text-gray-500 mt-2">
              <span>📅 ${task.dueDate}</span>
              <span class="${task.priority === 'Tinggi' ? 'text-red-600' : task.priority === 'Sedang' ? 'text-yellow-600' : 'text-green-600'} font-medium">Prioritas: ${task.priority}</span>
            </div>
            <div class="flex justify-end gap-2 mt-2">
              <button onclick="editTask(${index})" class="text-blue-600 text-sm underline">Edit</button>
              <button onclick="deleteTask(${index})" class="text-red-600 text-sm underline">Hapus</button>
            </div>
          </div>`;
      });
    }

    function saveTask() {
      const title = document.getElementById("title").value;
      const category = document.getElementById("category").value;
      const dueDate = document.getElementById("dueDate").value;
      const description = document.getElementById("description").value;
      const priority = document.getElementById("priority").value;

      if (!title || !category || !dueDate) return alert("Harap isi semua field penting!");

      const newTask = { title, category, dueDate, description, priority, done: false };

      if (editingIndex !== null) {
        tasks[editingIndex] = newTask;
        editingIndex = null;
      } else {
        tasks.push(newTask);
      }

      renderTasks();
      document.getElementById("title").value = "";
      document.getElementById("category").value = "";
      document.getElementById("dueDate").value = "";
      document.getElementById("description").value = "";
      document.getElementById("priority").value = "Tinggi";
    }

    function editTask(index) {
      const task = tasks[index];
      document.getElementById("title").value = task.title;
      document.getElementById("category").value = task.category;
      document.getElementById("dueDate").value = task.dueDate;
      document.getElementById("description").value = task.description;
      document.getElementById("priority").value = task.priority;
      editingIndex = index;
      document.getElementById('task-form').scrollIntoView({ behavior: 'smooth' });
    }

    function deleteTask(index) {
      if (confirm("Hapus tugas ini?")) {
        tasks.splice(index, 1);
        renderTasks();
      }
    }

    function toggleDone(index) {
      tasks[index].done = !tasks[index].done;
      renderTasks();
    }

    renderTasks();
  </script>

</body>

</html>
