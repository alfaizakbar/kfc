<?php
session_start();

include 'koneksi.php';

$nama_pelanggan = $_POST['nama_pelanggan'];
$password = $_POST['password'];


$login = mysqli_query($conn, "SELECT * FROM pelanggan WHERE nama_pelanggan='$nama_pelanggan' and password='$password'");

$cek = mysqli_num_rows($login);

if ($cek > 0) {
    $dataa = mysqli_fetch_assoc($login);

    $_SESSION['nama_pelanggan'] = $nama_pelanggan;
    $_SESSION['password'] = $password;
    header("location:../pagehome/blog.php");
}
;
if (isset($_POST['tambah'])) {

    if (($_POST)>0){
        echo "
        <script>
        alert('User Tidak Di Temukan');
        document.location.href = '../pelanggan/loginn.php';
        </script>
        ";
    }
    return mysqli_affected_rows($conn);
}


?>