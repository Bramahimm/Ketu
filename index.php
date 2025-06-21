<?php
session_start();

$route = $_GET['route'] ?? 'login';

// Tangani detail tugas anggota (modal)
if ($route === 'dashboard' && isset($_GET['detail'])) {
    require_once 'includes/init.php';
    $idTugas = (int) $_GET['detail'];
    $stmt = $conn->prepare("SELECT * FROM tugas WHERE idTugas = ?");
    $stmt->bind_param("i", $idTugas);
    $stmt->execute();
    $result = $stmt->get_result();
    $editData = $result->fetch_assoc();

    include 'controllers/dashboardAnggotaController.php';
    exit;
}

switch ($route) {
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once __DIR__ . '/includes/auth.php';
        } else {
            include __DIR__ . '/process/login.php';
        }
        break;

    case 'register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once 'includes/register.php';
        } else {
            include 'views/register.php';
        }
        break;

    case 'dashboard':
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?route=login");
            exit;
        }

        $role = $_SESSION['user']['role'];

        if ($role === 'pengurus') {
            include 'controllers/dashboardPengurusController.php';
        } elseif ($role === 'anggota') {
            include 'controllers/dashboardAnggotaController.php';
        }
        break;

    case 'tugas':
        include 'controllers/tugasController.php';
        break;

    case 'jadwal-kegiatan-pengurus':
        include 'controllers/kegiatanPengurusController.php';
        break;

    case 'jadwal-kegiatan-anggota':
        include 'controllers/jadwalKegiatanAnggotaController.php';
        break;

    case 'request-organisasi':
        require_once 'includes/init.php';
        $idUser = $_SESSION['user']['id'];
        $idOrganisasi = (int) ($_POST['idOrganisasi'] ?? 0);

        if ($idOrganisasi > 0) {
            $stmt = $conn->prepare("INSERT INTO request_organisasi (idUser, idOrganisasi) VALUES (?, ?)");
            $stmt->bind_param("ii", $idUser, $idOrganisasi);
            $stmt->execute();
        }

        header("Location: index.php?route=organisasi");
        exit;

    case 'verifikasi-request':
        include 'controllers/verifikasiRequestController.php';
        break;

    case 'organisasi':
        include 'controllers/organisasiAnggotaController.php';
        break;

    case 'permintaan':
        include 'controllers/PermintaanController.php';
        break;

    default:
        http_response_code(404);
        echo "<h1>404 - Halaman tidak ditemukan</h1>";
        break;
}
