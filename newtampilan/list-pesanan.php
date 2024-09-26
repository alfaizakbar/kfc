<?php
session_start();
require_once 'function.php';

// Cek apakah pelanggan sudah login, jika belum redirect ke login page
if (!isset($_SESSION['nama_pelanggan'])) {
    header("Location: login.php");
    exit;
}

$nama_pelanggan = $_SESSION['nama_pelanggan'];


// Query untuk mendapatkan data pesanan dari pelanggan yang login
$query = "SELECT id_pembayaran, nama_pelanggan, nama_makanan, jumlah_makanan, total_harga, waktu_pemesanan, status
          FROM detail_pesanan
          WHERE nama_pelanggan = '$nama_pelanggan'";

$detail_pesanan = queryy($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>AAfood | List Pesanan</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon"> -->
  <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

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

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">AAFood</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php" >Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="menu.php">Menu</a></li>
          <li><a href="pesanan.php">Pesanan</a></li>
          <li><a href="keranjang.php" >Keranjang</a></li>
          <li><a href="list-pesanan.php"class="active">List Pesanan</a></li>
          <li><a href="gallery.php">Gallery</a></li>
          <li><a href="contact.php"class="">Contact</a></li>
          <li class="dropdown"><a href="profile.php"><span>Akun</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
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
            <!-- <img src="assets/img/hero-img.png" class="img-fluid animated" alt=""> -->
          </div>

          <div class="col-lg-6  d-flex flex-column justify-content-center" data-aos="fade-in">
            <h1> <span>List Pesanan</span></h1>
            <p>Hubungi kami untuk pertanyaan atau informasi lebih lanjut. Kami siap membantu Anda.</p>
            <div class="d-flex">
              <!-- <a href="#about" class="btn-get-started">Get Started</a> -->
              <!-- <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
            </div>
          </div>

        </div>
      </div>

      <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
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
    <section class="contact section">
      <div class="container">
        <h1>List Pesanan</h1>
        <div class="table-responsive shadow-lg p-4 mb-5 bg-white rounded-4">
          <table class="table table-hover table-bordered align-middle mb-0 bg-light">
            <thead class="bg-gradient-primary text-white">
              <tr class="text-center align-middle">
                <th>Nama Pelanggan</th>
                <th>Nama Makanan</th>
                <th>Jumlah Makanan</th>
                <th>Harga</th>
                <th>Tanggal & Waktu Pemesanan</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($detail_pesanan as $row): ?>
                <tr class="bg-white align-middle">
                  <td class="text-center "><?= ($row['nama_pelanggan']) ?></td>
                  <td class="text-center"><?= ($row['nama_makanan']) ?></td>
                  <td class="text-center"><?= ($row['jumlah_makanan']) ?></td>
                  <td class="text-center fw-bold text-success">Rp <?= number_format(($row['total_harga']), 0, ',', '.') ?></td>
                  <td class="text-center"><?= (date('d-m-Y H:i:s', strtotime($row['waktu_pemesanan']))) ?></td>
                  <td class="text-center">
                    <span class="badge bg-success">Done</span>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>

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