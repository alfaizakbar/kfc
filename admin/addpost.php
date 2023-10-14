<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
  }
require "../database/post.php";
error_reporting(0);
if (isset($_POST['tambah'])) {
    if (tambah ($_POST) > 0 ){
        echo "<script>alert('data berhasil ditambahakan');
        document.location.href = 'listpost.php'</script>";
    } else {
        echo "<script>alert('data gagal ditambahakan')</script>";
    }
};

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/addpost.css<?php echo time(); ?>">
    <style>
      <?php include 'css/addpost.css' ?>
    </style>
    <title>Add</title>
</head>
<body>
<?php include 'header_navbar.php'; ?>
<div class="containerr">
    <h1>Add Menu</h1>
    <div class="tabel">
        <form action="" method="post" enctype="multipart/form-data">
        <label for="judul">Menu</label>
        <input type="text" class="title" id="judul" name="judul">
        <div class="kc">
            <div class="k">
                <label for="kategori">Harga</label>
                <input type="text" class="kategori" id="kategori" name="kategori">
            </div>
            <div class="c">
                <label for="gambar" class="ci">Create Image</label>
                <input type="file" class="imgggg" id="gambar" name="gambar">
            </div>
        </div>

        <!-- <label for="artikel">Artikel</label>
        <textarea  rows="4" name="artikel" id="artikel" class="artikel" ></textarea> -->

        <button type="submit" name="tambah" id="tambah">SAVE</button>
    </form>
</div>
</div>
            
    <script>
          let loading = document.getElementById('loading'); 

          window.addEventListener('load', function(){
            loading.style.display= "none";
          })
        </script>
</body>
</html>