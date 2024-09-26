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
  <title>AAFood | List Pesanan</title>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
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
          <li><a href="menu.php">Menu</a></li>
          <li><a href="pesanan.php">Pesanan</a></li>
          <li><a href="keranjang.php">Keranjang</a></li>
          <li><a href="gallery.php" class="active">Gallery</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main class="main">
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

    <!-- Tabel Pesanan -->
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

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
