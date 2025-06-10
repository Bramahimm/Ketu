<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register - Ketu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-[#050811]">
    <div class="bg-[#C71585] shadow-lg flex rounded-xl overflow-hidden max-w-2xl w-full p-8">
        <div class="w-full">
            <div class="text-center mb-6">
                <img src="../assets/buku.png" alt="Logo" class="mx-auto w-20 mb-2 rounded-full" />
                <h2 class="text-xl font-semibold text-white">Registrasi</h2>
            </div>
            <form action="process/register.php" method="POST" class="space-y-4">
                <div>
                    <label class="sr-only">Email</label>
                    <input type="email" name="email" placeholder="Email" required class="w-full py-2 px-3 rounded-md focus:outline-none" />
                </div>
                <div>
                    <label class="sr-only">Password</label>
                    <input type="password" name="password" placeholder="Password" required class="w-full py-2 px-3 rounded-md focus:outline-none" />
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="w-32 bg-[#050811] text-white py-2 rounded-md hover:bg-blue-700 transition">Daftar</button>
                </div>
            </form>
            <p class="text-sm text-center mt-4">
                Sudah punya akun? <a href="index.php" class="text-white underline">Login</a>
            </p>
        </div>
    </div>
</body>
</html>