<?php 
session_start();
require_once 'function.php'; // Mengimpor fungsi dari file function.php

// Cek apakah pelanggan sudah login, jika belum redirect ke login page
if (!isset($_SESSION['nama_pelanggan'])) {
    header("Location: login.php");
    exit;
}

// Mengambil data pelanggan berdasarkan session
$nama_pelanggan = $_SESSION["nama_pelanggan"];
$pelanggan = queryy("SELECT * FROM pelanggan WHERE nama_pelanggan = '$nama_pelanggan'")[0];

// Mengambil semua data blog
$data = queryy("SELECT * FROM blog");

// Jika tombol cari ditekan, ambil data berdasarkan keyword pencarian
if (isset($_POST["cari"])) {
    $data = cari($_POST["keyword"]);
}

// Matikan error reporting untuk produksi (gunakan error_reporting(E_ALL) untuk pengembangan)
error_reporting(0);

// Fungsi untuk mencari data berdasarkan keyword (nama makanan)
// function cari($keyword) {
//     $query = "SELECT * FROM blog WHERE nama_makanan LIKE '%$keyword%'";
//     return queryy($query);
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>AAFood | Menu</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon"> -->
  <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <h1 class="sitename">AAFood</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="menu.php">Menu</a></li>
          <li><a href="pesanan.php" class="active">Pesanan</a></li>
          <li><a href="keranjang.php">Keranjang</a></li>
          <li><a href="list-pesanan.php">List Pesanan</a></li>
          <li><a href="gallery.php">Gallery</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li class="dropdown">
            <a href="profile.php"><span>Akun</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="profile.php">Profile</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
      <img src="assets/img/hero-bg-2.jpg" alt="" class="hero-bg">

      <div class="container">
        <div class="row gy-4 justify-content-between">
          <div class="col-lg-4 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-in">
            <h1><span>Pesanan</span></h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Soluta, ipsa?</p>
          </div>

        </div>
      </div>

      <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none">
        <defs>
          <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
        </defs>
        <g class="wave1">
          <use xlink:href="#wave-path" x="50" y="3"></use>
        </g>
        <g class="wave2">
          <use xlink:href="#wave-path" x="50" y="0"></use>
        </g>
        <g class="wave3">
          <use xlink:href="#wave-path" x="50" y="9"></use>
        </g>
      </svg>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Pesanan</h2>
        <div><span>Check Our</span> <span class="description-title">Pesanan</span></div>
      </div><!-- End Section Title -->

      <!-- Form Pencarian -->
      <div class="container" data-aos="fade-up">
        <form action="" method="POST" class="d-flex justify-content-center my-4">
          <input type="text" name="keyword" class="form-control w-50" placeholder="Cari nama makanan..." autofocus>
          <button type="submit" name="cari" class="btn btn-primary ms-2">Cari</button>
        </form>
      </div>

      <!-- Gallery Section -->
      <div class="container" data-aos="fade" data-aos-delay="100">
        <div class="row">
          <?php if (empty($data)) : ?>
            <!-- Jika hasil pencarian kosong -->
            <div class="col-12">
              <h5 class="text-center">Menu tidak tersedia</h5>
            </div>
          <?php else : ?>
            <!-- Jika ada hasil pencarian -->
            <?php $i =1; ?>
            <?php $data = array_reverse($data); ?>
            <?php foreach($data as $row) { ?>  
            <div class="col-lg-2 col-md-12 mb-4 mb-lg-0 my-4">
              <img src="../admin/img/<?= $row['foto'] ?>" class="w-100 shadow-1-strong rounded mb-4 img-fixed-height" alt="<?= $row['nama_makanan'] ?>" />
              <a href="detail.php?id=<?= $row['id'] ?>"><h5 class="text-center"><?= $row['nama_makanan'] ?></h5></a>
            </div>
            <?php $i++ ?>
            <?php } ?>
          <?php endif; ?>
        </div>
      </div>

    </section><!-- /Contact Section -->

  </main>

  <?php
    include 'footer.php';
  ?>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>
