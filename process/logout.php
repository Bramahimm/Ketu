// logout.php
<?php
session_start();
session_destroy();
header("Location: ../index.php?route=login");

exit;
