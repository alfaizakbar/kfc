<?php
session_start();
require_once 'function.php';

// Cek apakah pelanggan sudah login, jika belum redirect ke login page
if (!isset($_SESSION['nama_pelanggan'])) {
    header("Location: login.php");
    exit;
}

$nama_pelanggan = $_SESSION['nama_pelanggan'];

// Escape string untuk mencegah SQL Injection
$nama_pelanggan = mysqli_real_escape_string($conn, $nama_pelanggan);

// Query untuk mendapatkan data pesanan dari pelanggan
$query = "SELECT id_pembayaran, nama_pelanggan, nama_makanan, jumlah_makanan, total_harga, waktu_pemesanan , status
          FROM detail_pesanan 
          WHERE nama_pelanggan = '$nama_pelanggan'";

$detail_pesanan = queryy($query);

// Fungsi untuk membatalkan pesanan


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>AAFood | Gallery</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <h1 class="sitename">AAFood</h1>
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="menu.php">Menu</a></li>
          <li><a href="pesanan.php">Pesanan</a></li>
          <li><a href="keranjang.php">Keranjang</a></li>
          <li><a href="gallery.php" class="active">Gallery</a></li>
          <li><a href="contact.php">Contact</a></li>
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
          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-in">
            <h1><span>List Pesanan</span></h1>
            <p>Daftar pesanan yang telah Anda lakukan.</p>
          </div>
        </div>
      </div>
    </section>
    <!-- /Hero Section -->

    <!-- Gallery Section -->
    <section id="contact" class="contact section">
      <div class="container">
        <h1>List Pesanan</h1>
        <div class="table-responsive shadow-lg p-4 mb-5 bg-white rounded-4">
         <!-- Tabel Pesanan -->
<table class="table table-hover table-bordered align-middle mb-0 bg-light">
    <thead class="bg-gradient-primary text-white" style="background: linear-gradient(135deg, #007bff 0%, #6610f2 100%);">
        <tr class="text-center align-middle">
            <th class="p-3">Nama Pelanggan</th>
            <th class="p-3">Nama Makanan</th>
            <th class="p-3">Jumlah Makanan</th>
            <th class="p-3">Harga</th>
            <th class="p-3">Tanggal & Waktu Pemesanan</th> <!-- Kolom baru -->
            <th class="p-3">Status</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($detail_pesanan as $row): ?>
            <tr class="bg-white align-middle">
                <td class="text-center fw-bold p-3"><?= htmlspecialchars($row['nama_pelanggan']) ?></td>
                <td class="text-center p-3"><?= htmlspecialchars($row['nama_makanan']) ?></td>
                <td class="text-center p-3"><?= htmlspecialchars($row['jumlah_makanan']) ?></td>
                <td class="text-center fw-bold text-success p-3">Rp <?= number_format(htmlspecialchars($row['total_harga']), 0, ',', '.') ?></td>
                <td class="text-center p-3"><?= htmlspecialchars(date('d-m-Y H:i:s', strtotime($row['waktu_pemesanan']))) ?></td> <!-- Tanggal & Waktu Pemesanan -->
                
                <td class="text-center p-3">
                                <span class="badge bg-success" style="font-size: 14px; padding: 10px 20px; border-radius: 20px;">Done</span>
                            </td>
                
               
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Modal untuk menampilkan detail pesanan -->


    <!-- /Gallery Section -->

  </main>

  <?php include 'footer.php'; ?>

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
