<?php
session_start();

// Hancurkan sesi pelanggan, tidak menghancurkan sesi admin
if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
}

// Redirect ke halaman login
header('Location: login.php');
exit;
?>
