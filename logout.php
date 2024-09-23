<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php"); // Setelah logout kembali ke halaman utama
exit();
?>
