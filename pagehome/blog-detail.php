<?php
session_start();
require 'function.php';
$usernamee = $_SESSION["usernamee"];
$pelanggan=queryy("SELECT * FROM pelanggan WHERE usernamee='$usernamee'")[0];


$id = $_GET["id"];
$data = query("SELECT * FROM blog WHERE id = $id");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan || KFC Lhokseumawe</title>
    <link rel="shortcut icon" href="img/logokfc.png" type="image/x-icon">
    <link rel="stylesheet" href="blog-detail8.css">

    <style>
        <?php 
        // include 'header.css'; 
        // include 'header.php';

        include 'blog-detail8.css';
        include 'header3.css';


        ?>
    </style>
</head>

<body>
<?php
include 'header3.php';
?>
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
                        <div class="desk">

                            <h2 class="nama"><?= $row['judul']?></h2>
                            <h4 class="kat">Harga : <?= $row['kategori']?></h4>
                            <!-- <input type="number" name="qty" class="qty" min="1" max="99" value="1" onkeypress="if(this.value.length == 2) return false;"> -->
                            <h4 class="tanggal"><?= $row['tanggal']?></h4>
                        </div>
                        <!-- <p><?= $row ['artikel']?></p> -->
                        <?php }?>
                    </div>
                        
                </div>
                <div class="btnn">

                    <a href="../pelanggan/pembayaran.php?id=<?= $row['id']?>"><h1 class="beli">Order Now</h1></a>
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
    <?php include "footer2.php"; ?>
</html>