<?php
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/database.php';
require_once __DIR__ . '/User.php';

session_start();

// ngambil input login
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

// ngevalidasi input
if (!$email || !$password) {
    redirectWithError('empty');
}

// buat ngambil user dari database
$user = getUserByEmail($conn, $email);

// buat ngecek kecocokan password
if (!$user || !password_verify($password, $user['password'])) {
    redirectWithError('invalid');
}

// ini untuk nyimpan session
$_SESSION['user'] = [
    'id'    => $user['idUser'],
    'nama'  => $user['nama'],
    'role'  => $user['role'],
];

// Redirect ke dashboard sesuai role
redirectToDashboard($user['role']);
