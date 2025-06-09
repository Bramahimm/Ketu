<?php
session_start();
require_once 'includes/db.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($user_id, $hashed);
    if ($stmt->fetch() && password_verify($password, $hashed)) {
        $_SESSION['user_id'] = $user_id;
        header('Location: pages/dashboard.php');
        exit;
    } else {
        $errors[] = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href=\"https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css\" rel=\"stylesheet\">
</head>

<body class=\"bg-gray-100 flex items-center justify-center min-h-screen\">
    <div class=\"bg-white p-6 rounded shadow-md w-full max-w-sm\">
        <h2 class=\"text-xl font-bold mb-4\">Masuk</h2>
        <?php foreach ($errors as $error): ?>
            <p class=\"text-red-500 text-sm\"><?= $error ?></p>
        <?php endforeach; ?>
        <form method=\"POST\">
            <input name=\"username\" placeholder=\"Username\" required class=\"w-full mb-2 p-2 border rounded\" />
            <input name=\"password\" type=\"password\" placeholder=\"Password\" required class=\"w-full mb-4 p-2 border
                rounded\" />
            <button class=\"bg-blue-500 text-white px-4 py-2 rounded w-full\">Masuk</button>
        </form>
        <p class=\"mt-4 text-sm\">Belum punya akun? <a href=\"register.php\" class=\"text-blue-600
                underline\">Daftar</a></p>
    </div>
</body>

</html>