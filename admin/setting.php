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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting</title>
    <link rel="stylesheet" href="css/setting.css?<?php echo time(); ?>">
    <style>
        <?php include 'css/setting.php' ?>
    </style>
</head>
<body>
    <?php include 'header_navbar.php'; ?> 
    <div class="set">
        <h1>Setting</h1>
    </div>  
    <div class="content">
        <form action="" method="post" class="pc">
            <div class="isi">
                <div class="title">

                    <h1>Informasi Akun</h1>
                    <img src="https://cdn.iconscout.com/icon/free/png-128/person-1780867-1514182.png" alt="">
                </div>
                <div class="un">
                    <label for="username">Username</label>
                    <input type="hidden" name="id" value="<?= $orang['id']?>">
                    <input type="text" class="username" id="username" name="username" value="<?= $orang['username']?>" require>
                </div>
                <div class="em">
                    <label for="email">Email</label>
                    <input type="text" class="email" id="email" name="email" value="<?= $orang['email']?>" require>
                </div>
                <div class="pw">
                    <label for="password">Password</label>
                    <input type="password" class="password" id="inputPassword" name="password" value="<?= $orang['password']?>" require>
                </div>
                <div class="tp">
                    <input type="checkbox" onclick="myFunction()"><p>Tampilkan Password</p>
                </div>
                
                <button class="btn" type="submit" name="apa">Update</button>
            </div>
        </form>
    </div>

    <script>
        function myFunction() {
            var x = document.getElementById("inputPassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>
</html> 