<?php
require '../database/konn.php';

if( isset($_POST["submit"])){
    if( registrasii($_POST) > 0){
        echo "<script>
        alert('user baru berhasil ditambahkan!');
        document.location.href='loginn.php';
        </script>";
    }else{
            echo "<script>
            alert('Data gagal ditambahkan');
            document.location.href='loginn.php';
            </script>";
        }
    };




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register || KFC Lhokseumawe</title>
</head>
<link rel="shortcut icon" href="../pagehome/img/logokfc.png" type="image/x-icon">

<link rel="stylesheet" href="css/login.css">
<body>
    <a href="../pagehome/index.php"><img class="left" src="../pagehome/img/left-arrow.png" alt=""></a>
    <div class="h1">
        <h1>Sebelum Melakukan Pemesanan, Silahkan Login Terlebih Dahulu</h1>
        <h1>Tekan Check Box Jika Kalian belum pernah Login.</h1>
    </div>
    <div class="container">
        <div class="foto">
            <img src="../pagehome/img/logokfc.png" alt="">
        </div>
<div class="wrapper">
        <div class="card-switch">
            <label class="switch">
               <input type="checkbox" class="toggle">
               <span class="slider"></span>
               <span class="card-side"></span>
               <div class="flip-card__inner">
                  <div class="flip-card__front">
                     <div class="title">Log in</div>
                     <form class="flip-card__form" action="cekloginpel.php" method="post">
                        <input class="flip-card__input" name="usernamee" placeholder="Username" type="username">
                        <input class="flip-card__input" name="password" id="inputPassword" placeholder="Password" type="password">
                        <div class="tp">
                    <input type="checkbox" onclick="myFunction()"><p>Tampilkan Password</p>
                </div>
                        <button class="flip-card__btn" id="submit-btn" type="submit" name="tambahh" value="Login">Login</button>
                     </form>
                  </div>
                  <div class="flip-card__back">
                     <div class="title">Sign up</div>
                     <form class="flip-card__form" action="" method="post" enctype="multipart/form-data">
                        <input class="flip-card__input" name="usernamee" placeholder="Username" type="name">
                        <input class="flip-card__input" name="email" placeholder="Email" type="email">
                        <input class="flip-card__input" name="password" placeholder="Password" type="text">
                        <input class="flip-card__input" name="alamat" placeholder="Alamat" type="text">
                        <input class="flip-card__input" name="no_hp" placeholder="No HandPhone" type="text">
                        <input class="gambar" name="gambar" placeholder="gambar" type="file">
                        <button class="flip-card__btn" type="submit" name="submit" value="login">Confirm!</button>
                    </form>
                </div>
            </div>
        </label>
    </div>   
</div>
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
    <!-- <header>

    </header>


<form action="cekloginpel.php" method="post">
<div class="bungkus">

    
    <h1>Masuk</h1>
    <div class="input">
        <label for="usernamee">Username</label>
        <input type="text" name="usernamee" id="name" placeholder="username" required>
    </div>      
    <div class="niput">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="password" required>
    </div>
    <center>
        <input id="submit-btn" type="submit" name="tambahh" value="Login">
        <a href="register.php" id="sign-up">Belum Punya akun?</a>
    </center>    
</form>
</div> -->