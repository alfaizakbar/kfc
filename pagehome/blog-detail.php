<?php
session_start();
require 'function.php';
// $data = query("SELECT * FROM blog WHERE id='1'");
$usernamee = $_SESSION["usernamee"];
$pelanggan=queryy("SELECT * FROM pelanggan WHERE usernamee='$usernamee'")[0];


$id = $_GET["id"];
$data = query("SELECT * FROM blog WHERE id = $id");
// $data2 = query("SELECT DISTINCT kategori FROM blog");
// $data1 = query("SELECT * FROM blog ORDER BY id DESC LIMIT 1 ");
// $data3 = query("SELECT * FROM blog ORDER BY id DESC LIMIT 2 ");





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan || KFC Lhokseumawe</title>
    <link rel="shortcut icon" href="img/logokfc.png" type="image/x-icon">
    <link rel="stylesheet" href="blog-detail7.css">

    <style>
        <?php 
        // include 'header.css'; 
        // include 'header.php';

        include 'blog-detail7.css';
        include 'header.css';


        ?>
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
    <div class="blog">
        <ul>
            <li><h1>Info Pesanan.</h1></li>
        </ul>
    </div>
        <div class="bungkus">
            <div class="content">
                <!-- <input type="hidden" name="id" value="<?= $data["id"];?>"> -->
                <?php foreach($data as $row){?> 
                        <img src="../admin/img/<?= $row['foto']?>" alt="" class="fotoone">
                        <h2 class="nama"><?= $row['judul']?></h2>
                        <h4 class="kat">Harga : <?= $row['kategori']?></h4>
                        <!-- <input type="number" name="qty" class="qty" min="1" max="99" value="1" onkeypress="if(this.value.length == 2) return false;"> -->
                        <h4 class="tanggal"><?= $row['tanggal']?></h4>
                        <!-- <p><?= $row ['artikel']?></p> -->
                        <?php }?>
                        
                    </div>
                        <a href="../pelanggan/pembayaran.php?id=<?= $row['id']?>"><h1 class="beli">beli di sini</h1></a>
            </div>
            <!-- <div class="sidebar">
                <div class="container">
                        <div class="sidebar">
                            <div class="search2">
                                <form action="" method="post">
                                    <input type="text" class="car" name="keyword" placeholder="Seacrh Keyword">
                                    <button type="submit" class="btn" name="cari">Search</button>
                                </form>
                            </div>
                                <div class="category1">
                                    <h2>Category</h2>
                                    <hr class="b">
                                        <ul>
                                        <?php foreach($data2 as $row){?>  
                                            <li><h4 class="kat"><?= $row['kategori']?></h4></li>
                                            <li><hr class="g"></li>
                                            <?php } ?>
                                        </ul>
                                </div>
                        </div>
                </div>  
            </div> -->


        <!-- KOMENTAR!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->

        


    </body>
    <?php include "footer.php"; ?>
</html>