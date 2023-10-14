<?php
session_start();
require '../database/konn.php';

$usernamee = $_SESSION["usernamee"];
// $usernamee = mysqli_real_escape_string($conn, $usernamee);
$pelanggan=queryy("SELECT * FROM pelanggan WHERE usernamee='$usernamee'")[0];

if(isset($_POST['ubah'])){
        if(ubah($_POST) > 0){
                echo "<script>alert('data berhasil di ubah');
                document.location.href = 'blog.php '</script>";
            } else {
                    echo "<script>alert('data gagal di ubah')</script>";
                }
                ;
            }
            ;
            // if ($pelanggan === false) {
            //     die("Error: " . $conn->error); 
            // }
error_reporting(0);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting || KFC Lhokseumawe</title>
    <link rel="shortcut icon" href="img/logokfc.png" type="image/x-icon">
    <link rel="stylesheet" href="setting.css">
    <style>
        <?php include 'header.css' ?>
    </style>
</head>
<body>
<header>
    <div class="header">
        <div class="logo">

            <!-- <li class="logoo"><img src="https://cdn.iconscout.com/icon/premium/png-256-thumb/wifi-zone-14-858430.png?w=128&f=avif" alt=""></li> -->
            <li class="judull"><a href="index.php"><img src="img/logo_header.jpg" alt=""></a></li>
        </div>
        <ul>
            <div class="menu">
                <li><a href="index.php">HOME</a></li>
                <li><a href="menu.php">MENU</a></li>
                <li><a href="#">SERVICE</a></li>
                <li><a href="portofolio.php">GALLERY</a></li>
                <li><a href="blog.php">PESANAN</a></li>
                <li><a href="store.php">STORE</a></li>
            </div>
            <div class="oi">
            <!-- <div class="dropbtnn"><img class="img" src="https://cdn.iconscout.com/icon/free/png-128/person-1780867-1514182.png" alt=""></div> -->
            <div class="dropbtnn"><img class="img" src="../pagehome/img/<?= $pelanggan['foto']?>" alt=""></div>
            <div class="dropdownn-contentt">
            <a href="setting.php">Setting</a>
            <a href="../pelanggan/logout.php">Log Out</a>
            </div>
            </div>
        </ul>
    </div>
    </header>
    <div class="set">
        <h1>Setting</h1>
    </div>  
    <div class="content">
        <form action="" method="post" class="pc" enctype="multipart/form-data">
            <div class="isi">
                <div class="title">
                    
                    <h1>Informasi Akun</h1>
                    <img src="https://cdn.iconscout.com/icon/free/png-128/person-1780867-1514182.png" alt="">
                </div>
                <div class="un">
                    <label class="label" for="usernamee">Username</label>
                    <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan']?>">
                    <input type="text" class="username" id="usernamee" name="usernamee" value="<?= $pelanggan['usernamee']?>" require>
                </div>
                <div class="em">
                    <label class="label" for="email">Email</label>
                    <input type="text" class="email" id="email" name="email" value="<?= $pelanggan['email']?>" require>
                </div>
                <div class="pw">
                    <label class="label" for="password">Password</label>
                    <input type="password" class="password" id="inputPassword" name="password" value="<?= $pelanggan['password']?>" require>
                </div>
                <div class="alamat">
                    <label class="label" for="email">Alamat</label>
                    <input type="text" class="email" id="alamat" name="alamat" value="<?= $pelanggan['alamat']?>" require>
                </div>
                <div class="no_hp">
                    <label class="label" for="email">No HandPhone</label>
                    <input type="text" class="no_hp" id="no_hp" name="no_hp" value="<?= $pelanggan['no_hp']?>"require >
                </div>
                <div class="foto">
                    <label class="label" for="email">Foto</label>
                    <input type="file" class="" id="" name="gambar" value="<?= $pelanggan['foto']?>"require >
                </div>
                <div class="tp">
                    <input type="checkbox" onclick="myFunction()"><p>Tampilkan Password</p>
                </div>
                
                <button class="btn" type="submit" class="ubah" name="ubah">Update</button>
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