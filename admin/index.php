<?php
$data = mysqli_connect('localhost','root','','company_profile');
$result = mysqli_query ($data, "SELECT * FROM user");
$user = mysqli_fetch_assoc($result);

require '../database/koneksi.php';
$data = query("SELECT * FROM user ORDER BY id DESC LIMIT 3");
$data1 = query("SELECT * FROM blog ORDER BY id DESC LIMIT 5");
// $data1 = mysqli_query($conn, "SELECT * FROM user LIMIT 5 ");

$get= mysqli_query($conn, "SELECT *  FROM blog");
$count= mysqli_num_rows($get);

$get1= mysqli_query($conn, "SELECT *  FROM user");
$count1= mysqli_num_rows($get1);


session_start();

if (!isset($_SESSION['username'])) {
  header("location:login.php");
}
error_reporting(0);


;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
  <link rel="stylesheet" href="css/index.css?<?php echo time(); ?>">
  <style>
    <?php include 'css/index.php' ?>
  </style>
</head>
<body>  
  <?php include 'header_navbar.php'; ?>
      <div class="isi">
        <h1>Halaman Dashboard</h1>

       <div class="card-content">
         <div class="content">
           <div class="card">
             <img src="./img/artikel.jpg" alt="">
             <h2><?=$count;?><hr size="1px" width="200px"></h2>
             <h3>Blog</h3>
           </div>
           </div>
         <div class="content">
           <div class="card">
             <img src="./img/userk.png" alt="">
             <h2><?=$count1;?><hr size="1px" width="200px"></h2>
             <h3>User</h3>
           </div>
           </div>
           <div class="content">
           <div class="card">
             <img src="./img/product.png" alt="">
             <h2>6<hr size="1px" width="200px"></h2>
             <h3>Survey</h3>
           </div>
           </div>
           <div class="content">
           <div class="card">
             <img src="./img/user.png" alt="">
             <h2>12<hr size="1px" width="200px"></h2>
             <h3>Konsumen</h3>
           </div>
           </div>
        <div class="tabel">
          <div class="blog">
        <h4>List Menu</h4>
        <table rules="all">
          <thead>

            <tr>
              <th>NO</th>
              <th>TITLE</th>
              <th>CATEGORI</th>
              <th>DATE</th>
            </tr>
          </thead>
          <tbody>

            <?php $i =1; ?>
            <?php foreach($data1 as $row){ ?>
              <tr>
                
                <td><?= $i ?></td>
                <td><?= $row['judul'] ?></td>
                <td><?= $row['kategori'] ?></td>
                <td class="tanggal"><?= $row['tanggal'] ?></td>
              </tr>
              <?php $i++ ?>
              <?php } ?>
            </tbody>
            </table>
          </div>
          
          <div class="user">
         <h4>List User</h4>
         <table rules="all">
          <thead>
            <tr>
              <th>ID</th>
              <th>USERNAME</th>
              <th>EMAIL</th>
            </tr>
          </thead>
            <tbody>
              <?php $i=1; ?>
              <?php foreach($data as $user){ ?>
                <tr>
                  <td><?= $i ?></td>
                  <td><?= $user ['username']?></td>
                  <td><?= $user ['email']?></td>
                </tr>
                <?php $i++ ?>
                <?php } ?>
              </tbody>
    </table>
          </div>
        </div>
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
      