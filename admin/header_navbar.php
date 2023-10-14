
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/header.css">
    <style>
        <?php include 'css/header.css' ?>
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container">
    <div class="profile">
        <div class="op">
           <h2><a href="../pagehome/index.php">DASHBOARD KFC</a></h2>
        </div>
        <div class="oi">
            <div class="dropbtnn"><img class="img" src="https://cdn.iconscout.com/icon/free/png-128/person-1780867-1514182.png"  alt=""></div>
            <div class="dropdownn-contentt">
            <a href="../database/logout.php">Log Out</a>
            </div>
        </div>
    </div>
    <!-- sidebar -->
    <div class="sidebar">
        <div class="navbar">
        <ul id="menu_dropdown">
   <li class="menu_utama"><a href="index.php">Home</a></li>
   <li class="menu_utama"><a href="listpost.php">All Post</a>
   <ul class="menu_sub">
     <li><a href="listpost.php">List Post</a></li>
     <li><a href="addpost.php">Add Post</a></li>
   </ul>
   </li>
   <!-- <li class="menu_utama"><a href="survey.php">Survey</a></li> -->
   <li class="menu_utama"><a href="documents.php">Pesanan</a></li>
   <li class="menu_utama"><a href="#">Laporan</a>
   <ul class="menu_sub">
     <li><a href="laporanperhari.php">Laporan Per Hari</a></li>
     <li><a href="laporanperbulan.php">Laporan Per Bulan</a></li>
     <li><a href="laporanpertahun.php">Laporan Per Tahun</a></li>
   </ul>
   </li>
   <li class="menu_utama"><a href="setting.php">Setting</a></li>
  

</ul>
        </div>
    </div>
</body>
</html>