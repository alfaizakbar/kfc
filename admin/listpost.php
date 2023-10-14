<?php
require '../database/post.php';



$data = query("SELECT * FROM blog ORDER BY id DESC");
error_reporting(0);

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
    <title>List Post</title>
    <link rel="stylesheet"  href="css/listpost.css<?php echo time(); ?>">
    <style>
        <?php include 'css/listpost.css' ?>
    </style>
</head>
<body>
<?php include 'header_navbar.php'; ?>
        <div class="tbl">
            <div class="pra">
                <h1>List Post</h1>
                 <a href="addpost.php"><button>Addpost</button></a>
            </div>
    <table>
    <thead class="siuu">
        <tr>
            <th >
                No
            </th>
            <th>
                NAMA MAKANAN
            </th>
            <th>
                HARGA
            </th>
            <th>
                DATE
            </th>
            <th>
                ACTION
            </th>
        </tr>
    </thead>
    <tbody>
    <?php $i =1; ?>
    <?php foreach($data as $row){ ?>
        <tr>
            
            <td><?= $i ?></td>
            <td><?= $row['judul'] ?></td>
            <td><?= $row['kategori'] ?></td>
            <td><?= $row['tanggal'] ?></td>
            <td class="yakin">
            <a href="halamandetail1.php?id=<?= $row['id'] ?>" class="hd">Detail</a>
            </td>
        </tr>
        <?php $i++ ?>
        <?php } ?>
    </tbody>
    </table>
            
        </div>

    <script>
          let loading = document.getElementById('loading'); 

          window.addEventListener('load', function(){
            loading.style.display= "none";
          })
        </script>
</body>
</html>