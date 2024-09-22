<?php
session_start();
require '../database/post.php';

$username = $_SESSION["username"];
$orang=query("SELECT * FROM user WHERE username='$username'")[0];
if(isset($_POST['apa'])){
    if(apa($_POST) > 0){
        echo "<script>alert('data berhasil di ubah');
            document.location.href = 'index.php'</script>";
    } else {
        echo "<script>alert('data gagal di ubah')</script>";
    }
    ;
}
;

if (!isset($_SESSION['username'])) {
  header("location:login.php");
}
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <!-- Tambahkan CSS styling jika diperlukan -->
    <script>
        function confirmEdit() {
            return confirm("Yakin ingin mengedit profile?");
        }
    </script>
</head>
<body>
    <header>
        <h1>Edit Profile</h1>
    </header>

    <nav>
        <!-- Navigasi menu, jika ada -->
    </nav>

    <main>
        <h2>Edit Profile</h2>

        <form method="post" action="edit_profile.php" onsubmit="return confirmEdit()">
            <label for="newUsername">Username Baru:</label>
            <input type="text" name="username" id="newUsername" value="<?= $orang['username'] ?>" required>

            <label for="newPassword">Password Baru:</label>
            <input type="password" name="password" id="newPassword">
            <small>Kosongkan jika tidak ingin mengganti password</small>

            <label for="newEmail">Email Baru:</label> <!-- Added line -->
            <input type="email" name="newEmail" id="newEmail" value="<?= $orang['email'] ?>" required> <!-- Added line -->


            <button type="submit" name="apa" value="Simpan">Simpan</button>
        </form>

        <script>
            // Menambahkan alert setelah formulir di-submit
            // document.querySelector('form').addEventListener('submit', function() {
            //     alert("Yakin ingin menyimpan perubahan?");
            // });
        </script>
    </main>
</body>
</html>
