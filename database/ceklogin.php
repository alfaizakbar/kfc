<?php
session_start();

include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];


$login = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' and password='$password'");

$cek = mysqli_num_rows($login);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);

    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    header("location:../admin/index.php");
}
;
if (isset($_POST['tambah'])) {

    if (($_POST)>0){
        echo "
        <script>
        alert('User Tidak Di Temukan');
        document.location.href = '../admin/login.php';
        </script>
        ";
    }
    return mysqli_affected_rows($conn);
}


?>