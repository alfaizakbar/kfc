<?php
session_start();

include '../database/konn.php';

$usernamee = $_POST['usernamee'];
$password = $_POST['password'];


$login = mysqli_query($conn, "SELECT * FROM pelanggan WHERE usernamee='$usernamee' and password='$password'");

$cek = mysqli_num_rows($login);

if ($cek > 0) {
    $dataa = mysqli_fetch_assoc($login);

    $_SESSION['usernamee'] = $usernamee;
    $_SESSION['password'] = $password;

    header("location:../pagehome/blog.php");
}
;
if (isset($_POST['tambahh'])) {

    if (($_POST)>0){
        echo "
        <script>
        alert('User Tidak Di Temukan');
        document.location.href = 'loginn.php';
        </script>
        ";
    }
    return mysqli_affected_rows($conn);
}


?>