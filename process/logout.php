<?php
session_start();
session_unset(); // hapus semua data sesi
session_destroy(); // hancurkan sesi
header("Location: /ketu/public/index.php");

exit;
