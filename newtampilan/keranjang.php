<?php
session_start();
require_once 'function.php'; // Gunakan require_once untuk menghindari deklarasi ulang fungsi

// Ambil data keranjang dari session
$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : [];

// Cek apakah ada data produk yang perlu dihapus
if (isset($_GET['hapus'])) {
    $id_hapus = $_GET['hapus'];
    unset($_SESSION['keranjang'][$id_hapus]);
    header("Location: keranjang.php");
    exit;
}

// Cek apakah ada data produk yang perlu diupdate
if (isset($_POST['update'])) {
    foreach ($_POST['jumlah'] as $id_produk => $jumlah) {
        $_SESSION['keranjang'][$id_produk] = (int)$jumlah;
    }
    header("Location: keranjang.php");
    exit;
}

// Cek apakah ada diskon yang diterapkan
if (isset($_POST['diskon_apply'])) {
    $diskon_id = $_POST['diskon'];
    $diskon_data = [
        '0' => 0,
        '10' => 0.10,
        '20' => 0.20,
    ];

    $diskon = isset($diskon_data[$diskon_id]) ? $diskon_data[$diskon_id] : 0;
    $_SESSION['diskon'] = $diskon;
} else {
    $diskon = isset($_SESSION['diskon']) ? $_SESSION['diskon'] : 0;
}

// Ambil detail produk dari database berdasarkan ID di keranjang
$produk_dikeranjang = [];
$total_harga = 0;
foreach ($keranjang as $id_produk => $jumlah) {
    $produk = queryy("SELECT * FROM blog WHERE id = $id_produk")[0];
    $produk['jumlah'] = $jumlah;
    $produk['total'] = $jumlah * $produk['kategori'];
    $total_harga += $produk['total'];
    $produk_dikeranjang[] = $produk;
}

// Terapkan diskon ke total harga
$total_harga_diskon = $total_harga * (1 - $diskon);

// Hitung pajak (misalnya 8%)
$pajak = $total_harga_diskon * 0.08;
$total_harga_final = $total_harga_diskon + $pajak;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>KFC - Lhokseumawe</title>
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

          <li><a href="gallery.php">Gallery</a></li>
          <!-- <li><a href="#team">Team</a></li> -->
          <!-- <li><a href="#pricing">Pricing</a></li> -->
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
          <div class="col-lg-4 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
            <!-- <img src="assets/img/hero-img.png" class="img-fluid animated" alt=""> -->
          </div>

          <div class="col-lg-6  d-flex flex-column justify-content-center" data-aos="fade-in">
            <h1> <span>Keranjang</span></h1>
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
    
    
    <section id="keranjang" class="section">
      
      <div class="container">
        <a href="index.php" class="btn btn-secondary btn-back mb-2">Back</a>
        <h2>Keranjang Belanja</h2>
        <?php if (empty($produk_dikeranjang)) : ?>
          <p>Keranjang Anda kosong.</p>
          <?php else : ?>
            <!-- Form diskon -->
            <div class="mb-3">
              <form action="keranjang.php" method="post">
                </form>
              </div>
              <!-- Form update keranjang -->
              
              <div class="input-group my-4">
                <select name="diskon" class="form-control">
                  <option value="0" <?= $diskon == 0 ? 'selected' : '' ?>>Tidak ada diskon</option>
                  <option value="10" <?= $diskon == 0.10 ? 'selected' : '' ?>>Diskon 10%</option>
                  <option value="20" <?= $diskon == 0.20 ? 'selected' : '' ?>>Diskon 20%</option>
                </select>
                <button type="submit" name="diskon_apply" class="btn btn-info">Terapkan Diskon</button>
              </div>
          <form action="keranjang.php" method="post">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Gambar</th>
                <th>Judul</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($produk_dikeranjang as $item) : ?>
                <tr>
                  <td><img src="../admin/img/<?= $item['foto'] ?>" width="100" alt="<?= $item['foto'] ?>"></td>
                  <td><?= $item['nama_makanan'] ?></td>
                  <td>
                    <input type="number" name="jumlah[<?= $item['id'] ?>]" value="<?= $item['jumlah'] ?>" min="1" class="form-control" style="width: 80px;">
                  </td>
                  <td>Rp <?= number_format($item['kategori'], 0, ',', '.') ?></td>
                  <td>Rp <?= number_format($item['total'], 0, ',', '.') ?></td>
                  <td><a href="keranjang.php?hapus=<?= $item['id'] ?>" class="btn btn-danger btn-sm">Hapus</a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update Keranjang</button>
      </form>
      <div class="mt-3">
        <h4>Total Harga: Rp <?= number_format($total_harga, 0, ',', '.') ?></h4>
        <h4>Diskon: Rp <?= number_format($total_harga * $diskon, 0, ',', '.') ?> (<?= $diskon * 100 ?>%)</h4>
        <h4>Pajak (8%): Rp <?= number_format($pajak, 0, ',', '.') ?></h4>
        <h4>Total Akhir: Rp <?= number_format($total_harga_final, 0, ',', '.') ?></h4>
        <a href="checkout.php" class="btn btn-success">Checkout</a>
      </div>
      <?php endif; ?>
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
