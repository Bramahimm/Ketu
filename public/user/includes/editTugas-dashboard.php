<?php
session_start();
include '../../../src/includes/koneksi.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: /ketu/public/index.php");
  exit;
}

$id = intval($_GET['id'] ?? 0);
$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT * FROM tugas WHERE id = ? AND dibuat_oleh = ?");
$stmt->bind_param("ii", $id, $user_id);
$stmt->execute();
$result = $stmt->get_result();
$task = $result->fetch_assoc();

if (!$task) {
  echo "Tugas tidak ditemukan atau bukan milik Anda.";
  exit;
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Edit Tugas</title>
</head>

<body>
  <form action="../edit_tugas.php" method="POST">
    <input type="hidden" name="id" value="<?= $task['id'] ?>">
    <label>Judul:</label><input type="text" name="judul" value="<?= htmlspecialchars($task['judul']) ?>" required><br>
    <label>Deskripsi:</label><textarea name="deskripsi"
      required><?= htmlspecialchars($task['deskripsi']) ?></textarea><br>
    <label>Kategori:</label><input type="text" name="kategori" value="<?= htmlspecialchars($task['kategori']) ?>"
      required><br>
    <label>Deadline:</label><input type="date" name="deadline" value="<?= $task['deadline'] ?>" required><br>
    <label>Prioritas:</label>
    <select name="prioritas" required>
      <option <?= $task['prioritas'] == 'Rendah' ? 'selected' : '' ?> value="Rendah">Rendah</option>
      <option <?= $task['prioritas'] == 'Sedang' ? 'selected' : '' ?> value="Sedang">Sedang</option>
      <option <?= $task['prioritas'] == 'Tinggi' ? 'selected' : '' ?> value="Tinggi">Tinggi</option>
    </select><br>
    <button type="submit" name="update_tugas">Update Tugas</button>
  </form>
</body>

</html>