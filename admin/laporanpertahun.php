<?php
require '../database/post.php';
$data = query("SELECT * FROM pembayaran");
    if(isset($_POST["cari"])){
        $data = cari($_POST["keyword"]);
    }



// $data = query("SELECT * FROM pembayaran ORDER BY id_pembayaran DESC");
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin KFC || Laporan Per Tahun</title>
    <link rel="stylesheet" href="css/document.css?<?php echo time(); ?>">
    <style>
        <?php include 'css/document.php' ?>
    </style>
</head>
<body>
<?php include 'header_navbar.php'; ?>
    <div class="itu">
        <h1>Laporan Per Tahun</h1>   
        <div class="tabel">
            <table rules="all">
                <form action="" method="post">
                    <div class="tgl">
                    <?php
                    $tahun=date("Y");
                    ?>
                        <input type="text" name="keyword" id="date" value="<?php echo $tahun; ?>">
                        <button type="submit" name="cari">Cari</button>
                    </div>
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
                            <img src="./img/unduh.png" alt="">
                            <a href="delete_pesanan.php?id_pembayaran=<?= $row['id_pembayaran'] ?>"onclick = "return confirm('yakin untuk menghapus?')"><img src="./img/tong.png" alt=""></a>
                        </td>
                        <?php $i++ ?>
                        <?php }?> 
                    </tr>
                    
                </tbody>
            </form>
            </table>
        </div>
    </div>  
</body>
</html>