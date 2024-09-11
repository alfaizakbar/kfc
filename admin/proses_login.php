<?php
include 'koneksi.php';
session_start();

$admin_username = $_POST['admin_username'];
$admin_password = $_POST['admin_password'];

$sql = mysqli_query($conn, "SELECT * FROM admin WHERE admin_username='$admin_username' AND admin_password='$admin_password'");
$cek = mysqli_num_rows($sql);

if ($cek == 1) {
    while ($data = mysqli_fetch_array($sql)) {
        $_SESSION['admin_id'] = $data['admin_id'];
        $_SESSION['admin_namalengkap'] = $data['admin_namalengkap'];
    }
    header("location:index.php");
} else {
    $_SESSION['login_error'] = "Username atau password anda salah. Mohon coba lagi.";
    header("location:login.php");
    exit();
}
?>