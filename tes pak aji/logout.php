<?php
session_start();
session_unset(); // Menghapus semua data sesi
session_destroy(); // Menghancurkan sesi

// Redirect ke halaman login setelah logout
header('Location: login.php');
exit();
?>
