<?php
require '../database/post.php';



$id_pembayaran = $_GET["id_pembayaran"];
$data = query("SELECT * FROM pembayaran WHERE id_pembayaran = $id_pembayaran");

error_reporting(0);
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cetak.css">
    <title>Cetak || Admin KFC Lhokseumawe</title>
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300&family=Roboto:ital,wght@1,100&display=swap');
</style>
</head>
<body>
    <div class="container">
        <img src="../pagehome/img/gallery/logo_kfc.avif" alt="">
        <p>DEPAN ISLAMIC CENTRE, Jl. Merdeka No.25, Simpang Empat, Kec. Banda Sakti, Kabupaten Aceh Utara, Aceh 24355</p>
        
        <?php $i =1; ?>
        <?php
                           foreach($data as $row){?> 
                           -------------------------------
                    <div class="isi">
                        <h3><?= $row['judul']?>     ||   <?= $row['kategori'] ?></h3>
                        <h3>Jumlah Pesanan: <?= $row['jumlah_makanan']?></h3>
                        <h3>Sub Total   : <input type="text"></h3>
                           ------------------------------------------

                        <p class="info"><?= $row['jumlah_makanan']?> Items,  <?=date('d-m-Y H:i:s', strtotime($row['tanggal_pembayaran']))?><br/> <?= $row['nama_pelanggan']?></p>
                        
                        
                    </div>
                    
                        <?php $i++ ?>
                        <?php }?> 
                    
                        
                        <p class="footer">DAPATKAN INFO LOWONGAN KFC</p>
                        <p class="footerr">DI HTTP://KARIR.KFCU.COM</p>
                    </div>
                </body>
<script>
    window.print();
</script>
</html>