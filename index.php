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
        
}
