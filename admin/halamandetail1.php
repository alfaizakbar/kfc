<?php
require '../database/post.php';

$id = $_GET["id"];
$dataa = query("SELECT * FROM blog WHERE id=$id")[0];

session_start();

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
    <title><?= $dataa['judul'] ?></title>
    <link rel="stylesheet" href="css/detail.css">
    <style>
        <?php include'css/detail.css' ?>
    </style>

</head>
<body>
    <?php include 'header_navbar.php'; ?>
    <div class="containerr">
        <div class="post">
            <h3>POST</h3>
        </div>
            <div class="ou">
            <div class="fitur">
                        <a <button href="halamanupdate.php?id=<?= $dataa['id'] ?>" class="up">Update</button></a>
                        <a <button href="../pagehome/delete.php?id=<?= $dataa['id'] ?>"onclick = "return confirm('yakin untuk menghapus?')" class="uh">Hapus</button></a>
                    </div>
            </div>
        <div class="gambar">
        <div class="gambarr">
            <img src="./img/<?= $dataa['foto'] ?>" alt="" height="300px">
            <p>ukuran Gambar Di sarankan 1440 x 1080</p> 
        </div>
            <div class="tulisan">
                <div class="ou">
                    <h1><?= $dataa['judul'] ?></h1>
                    
                </div>
                <h6><?= $dataa['kategori'] ?></h6>
                <h5><?= $dataa['tanggal']?></h5>
                <p><?= $dataa['artikel'] ?><br/></p>
            </div>
        </div>
    </div>
</body>
</html>