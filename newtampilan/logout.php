<?php
session_start();

// Hancurkan sesi pelanggan, tidak menghancurkan sesi admin
if (isset($_SESSION['nama_pelanggan'])) {
    unset($_SESSION['nama_pelanggan']);
}

// Redirect ke halaman login
header('Location: login.php');
exit;
?>
