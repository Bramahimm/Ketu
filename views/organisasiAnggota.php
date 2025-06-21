<?php include __DIR__ . '/../layout/header.php'; ?>
<?php include __DIR__ . '/../layout/navbar.php'; ?>
<?php include __DIR__ . '/../layout/sidebar.php'; ?>

<main class="flex-1 p-6 ml-64 pt-16">
  <h2 class="text-2xl font-bold mb-6">Organisasi yang Tersedia</h2>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php while ($org = $allOrgs->fetch_assoc()): ?>
      <?php if (in_array($org['idOrganisasi'], $excludedIds)) continue; ?>
      <div class="bg-white p-6 rounded shadow border">
        <h3 class="text-lg font-semibold"><?= htmlspecialchars($org['namaOrganisasi']) ?></h3>
        <p class="text-sm text-gray-600 mb-4"><?= nl2br(htmlspecialchars($org['deskripsi'])) ?></p>
        <form method="POST" action="index.php?route=request-organisasi">
          <input type="hidden" name="idOrganisasi" value="<?= $org['idOrganisasi'] ?>">
          <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Minta Bergabung
          </button>
        </form>
      </div>
    <?php endwhile; ?>
  </div>
</main>
<?php include __DIR__ . '/../layout/footer.php'; ?>