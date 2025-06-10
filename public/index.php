<?php
session_start();
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
unset($_SESSION['error']); // supaya error hilang setelah ditampilkan
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - Ketu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-png" href="../assets/logoketu.png">
</head>

<body class="min-h-screen flex items-center justify-center bg-[#050811]">
    <div class="bg-[#C71585] shadow-lg flex rounded-xl overflow-hidden max-w-4xl w-full">
        <!-- Gambar kiri -->
        <div class="w-1/2 hidden md:block relative">
            <img src="../assets/logoketu.png" alt="buku" class="object-cover w-full h-full" />
            <div class="absolute bottom-0 left-0 w-full text-black p-4 bg-gray-500 bg-opacity-50">
                <p class="text-sm font-semibold">Selamat Datang di Kelola TugasMu</p>
            </div>
        </div>

        <!-- Form Login -->
        <div class="w-full md:w-1/2 p-8 relative">
            <div class="text-center mb-6">
                <img src="../assets/logoketu.png" alt="Unila" class="mx-auto w-20 mb-2 rounded-full" />
                <h2 class="text-xl font-semibold text-white">Login</h2>
            </div>

            <!-- Tampilkan error jika ada -->
            <?php if ($error): ?>
                <div class="bg-red-600 text-white p-3 rounded mb-4 text-center">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form action="process/login.php" method="POST" class="space-y-4">
                <div>
                    <label class="sr-only">Email</label>
                    <div class="flex items-center border rounded-md overflow-hidden">
                        <span class="px-3 text-[#050811]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 14a4 4 0 01-8 0m8 0a4 4 0 01-8 0m8 0H8m4 0v4m0 0H8m4 0h4" />
                            </svg>
                        </span>
                        <input type="email" name="email" placeholder="Email" required
                            class="w-full py-2 px-3 focus:outline-none" />
                    </div>
                </div>

                <div>
                    <label class="sr-only">Password</label>
                    <div class="flex items-center border rounded-md overflow-hidden">
                        <span class="px-3 text-[#050811]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 11c0-1.657 1.343-3 3-3s3 1.343 3 3m-6 0c0-1.657-1.343-3-3-3s-3 1.343-3 3m6 0v2m0 2h6m-6 0H6" />
                            </svg>
                        </span>
                        <input type="password" name="password" placeholder="Password" required
                            class="w-full py-2 px-3 focus:outline-none" />
                    </div>
                </div>

                <div class="flex justify-center items-center">
                    <button type="submit"
                        class="w-20 bg-[#050811] text-white py-2 rounded-md hover:bg-blue-700 hover:text-white transition">Login</button>
                </div>
            </form>
            <p class="text-sm text-right mt-2"><a href="register.php" class="text-white hover:underline">Belum Punya akun?</a></p>
        </div>
    </div>
</body>

</html>
