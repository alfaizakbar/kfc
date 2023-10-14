

<?php
// require '../pagehome/function.php';





session_start();
require '../database/konn.php';

if (isset($_POST['bayarr'])) {
  if (bayarr ($_POST) > 0 ){
    echo "<script>alert('Pemesanan Berhasil! Silahkan Tunggu Makanan Anda!');
    document.location.href = '../pagehome/menu.php'
    </script>";
  } else {
    echo "<script>alert('Pembayaran Gagal')</script>";
  }
};

error_reporting(0);


$usernamee = $_SESSION["usernamee"];
$pelanggan=queryy("SELECT * FROM pelanggan WHERE usernamee='$usernamee'")[0];

$id = $_GET["id"];

// $sql = $sql = "SELECT * FROM pembayaran WHERE user_id = $id_pelanggan";
$data = query("SELECT * FROM blog WHERE id = $id");
// $data - queryy("SELECT * FROM pelanggan WHERE id_pelanggan = $id_pelanggan ");
// $data2 = query("SELECT DISTINCT kategori FROM blog");
// $data1 = query("SELECT * FROM blog ORDER BY id DESC LIMIT 1 ");
// $data3 = query("SELECT * FROM blog ORDER BY id DESC LIMIT 2 ");



// if (!isset($_SESSION['usernamee'])) {
//   header("location:loginn.php");
// }
// error_reporting(0);


// require '../database/konn.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran || KFC Lhokseumawe</title>
  </head>
  <link rel="stylesheet" href="css/pembayaran.css">
<link rel="shortcut icon" href="../pagehome/img/logokfc.png" type="image/x-icon">

  <body> 
    <header>
      <a href="../pagehome/blog.php"><img class="left" src="../pagehome/img/left-arrow.png" alt=""></a>
      <a href="logout.php"><img class="logout" src="../pagehome/img/logout.png" alt=""></a>

    </header>
    <div class="h1">
      <input type="hidden" name="id" value="<?= $pelanggan['id_pelanggan']?>">
      <h1>Selamat Datang <?= $pelanggan['usernamee']?></h1>
      <h1>Silahkan Melakukan Confirm Jika Ingin Membayar</h1>
    </div>
      
    <audio id="myAudio">
        <source src="../admin/audio/notif.mp3" type="audio/mpeg">
    </audio>
  <?php
      foreach($data as $row){?> 
    <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan']?>">
      
      <div class="card">
        <div class="img">
          <img src="../admin/img/<?= $row['foto']?>" alt="" class="fotoone">
        </div>
        <div class="isi_pembayaran">
          <label for="">Nama Pelanggan: </label>
          <input type="text" id="nama_pelanggan" name="nama_pelanggan" value="<?= $pelanggan['usernamee']?>">
        </br>
        <label for="">Nama Makanan: </label>
        <input type="name" id="judul" name="judul" value="<?= $row['judul']?>">
      </br>
      <label for="">Harga: </label>
      <input type="text" id="kategori" name="kategori" value="<?= $row['kategori']?>">
    </br>
    <label for="">Alamat: </label>
      <input type="text" id="alamat" name="alamat" value="<?= $pelanggan['alamat']?>">
    </br>
    <label for="">No HandPhone: </label>
      <input type="text" id="no_hp" name="no_hp" value="<?= $pelanggan['no_hp']?>">
    </br>
    <label for="">Total: </label>
    <input type="number" name="jumlah_makanan" class="jumlah_makanan" min="1" max="99" value="1" onkeypress="if(this.value.length == 2) return false;">
  </div>
  </br>
    <button type="submit" name="bayarr" id="bayarr" onclick="tambahData()">Bayar</button>
  </div>
  <?php }?> 
</form>
  
<!-- <script>
        function tambahData() {
          if (isset($_POST['bayarr'])) {
  if (bayarr ($_POST) > 0 ){
    echo alert('Pemesanan Berhasil! Silahkan Tunggu Makanan Anda!');
    document.location.href = '../pagehome/menu.php';
  } else {
    echo alert('Pembayaran Gagal');
  }
};          // Setelah berhasil, jalankan perintah berikut untuk memainkan suara
            var audio = document.getElementById("myAudio");
            audio.play();
        }
    </script> -->
</body>
</html>