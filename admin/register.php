<?php
require '../database/koneksi.php';

if( isset($_POST["submit"])){
    if( registrasi($_POST) > 0){
        echo "<script>
        alert('user baru berhasil ditambahkan!');
        document.location.href='login.php';
        </script>";
    }else{
            echo "<script>
            alert('Data gagal ditambahkan');
            document.location.href='register.php';
            </script>";
        }
    };




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
<link rel="stylesheet" href="css/register.css">
<body>
    <form action="" method="post">
    <div class="container">
        <div class="bungkus">
            <h1>Register</h1>
            <div class="input">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="username" require>
            </div>    
            <div class="putin">
                <label for="eml">Email</label>
                <input type="email" name="email" id="email" placeholder="email" require>
            </div>
            <div class="niput">
                <label for="psw">Password</label>
                <input type="password" name="password" id="password" placeholder="password" require>
            </div>
            <center>
                <input id="submit-btn" type="submit" name="submit" value="login">
            </center>    
        </div>
    </div>
    </form>

</body>
</html>

    

