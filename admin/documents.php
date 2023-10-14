<?php
require '../database/post.php';



$data = query("SELECT * FROM pembayaran ORDER BY id_pembayaran DESC");

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
    <meta http-equiv="refresh" content="5">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin KFC || Pesanan Pelanggan</title>
    <link rel="stylesheet" href="css/document.css?<?php echo time(); ?>">
    <style>
        <?php include 'css/document.php' ?>
    </style>
</head>
<body>
<?php include 'header_navbar.php'; ?>
<audio id="myAudio">
        <source src="../audio/notif.mp3" type="audio/mpeg">
    </audio>
    <div class="itu">
        <h1>Pesanan Pelanggan</h1>   
        <div class="tabel">
            <table rules="all">
                <thead>
                    <tr>
                        <th class="tanggal">TANGGAL & WAKTU PEMBAYARAN</th>
                        <th class="nama">ALAMAT</th>
                        <th class="nama">NO HANDPHONE</th>
                        <th class="nama">NAMA PELANGGAN</th>
                        <th class="tipe">NAMA MAKANAN</th>
                        <th class="tanggal">HARGA</th>
                        <th class="jumlah_makanan">JUMLAH MAKANAN</th>
                        <th class="detail">AKSI</th>
                    </tr>
                </thead>

                        <?php $i =1; ?>
                            <?php
                            foreach($data as $row){?> 
                <tbody>
                    <tr>
                        <td><?=date('d-m-Y H:i:s', strtotime($row['tanggal_pembayaran']))?></td>
                        <td><?=$row['alamat']?></td>
                        <td><?=$row['no_hp']?></td>
                        <td>
                            <?= $row['nama_pelanggan']?>
                        </td>
                        <td><?= $row['judul']?></td>
                        <td><?= $row['kategori'] ?></td>
                        <td><?= $row['jumlah_makanan']?></td>
                        <td class="foto">
                            <a href="cetak.php?id_pembayaran=<?=$row['id_pembayaran']?>"><img src="./img/unduh.png" alt=""></a>
                            <a href="delete_pesanan.php?id_pembayaran=<?= $row['id_pembayaran'] ?>"onclick = "return confirm('yakin untuk menghapus?')"><img src="./img/tong.png" alt=""></a>
                        </td>
                        <?php $i++ ?>
                                        <?php }?> 
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>  
    <script>
        setTimeout(function(){
            location.reload();
        }, 5000); // 5000 milidetik = 5 detik
    </script>
</body>
</html>