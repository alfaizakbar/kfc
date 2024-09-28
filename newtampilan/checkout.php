<?php
session_start();
require_once 'function.php';

// Cek apakah keranjang kosong
if (empty($_SESSION['keranjang'])) {
    header("Location: keranjang.php");
    exit;
}

// Ambil data keranjang dari session
$keranjang = $_SESSION['keranjang'];

// Ambil data pelanggan dari session
$nama_pelanggan = $_SESSION["nama_pelanggan"];
$pelanggan = queryy("SELECT * FROM pelanggan WHERE nama_pelanggan='$nama_pelanggan'")[0];
$id_pelanggan = $pelanggan['id_pelanggan'];

// Ambil detail produk dari database berdasarkan ID di keranjang
$produk_dikeranjang = [];
$total_harga = 0;
$total_makanan = 0; // Inisialisasi total makanan

foreach ($keranjang as $id_produk => $jumlah) {
    if ($jumlah > 0) { // Hanya ambil produk yang jumlahnya lebih dari 0
        $produk = queryy("SELECT * FROM blog WHERE id = $id_produk")[0];
        $produk['jumlah_makanan'] = $jumlah;
        $produk['total_harga'] = $jumlah * $produk['kategori']; // Asumsi harga ada di kolom 'kategori'
        $total_harga += $produk['total_harga'];
        $total_makanan += $jumlah; // Tambahkan jumlah ke total makanan
        $produk_dikeranjang[] = $produk;
    }
}

// Ambil diskon dari sesi
$diskon = isset($_SESSION['diskon']) ? $_SESSION['diskon'] : 0;

// Terapkan diskon ke total harga
$total_harga_diskon = $total_harga * (1 - $diskon);

// Hitung pajak (misalnya 8%)
$pajak = $total_harga_diskon * 0.08;
$total_harga_final = $total_harga_diskon + $pajak;

// Simpan data checkout jika form disubmit
if (isset($_POST['checkout'])) {
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    // Validasi data
    if (empty($alamat) || empty($no_hp)) {
        echo "<script>alert('Alamat dan nomor telepon harus diisi.');</script>";
        exit;
    }

    // Menggabungkan nama makanan dengan jumlahnya dalam format nama(jumlah)
    $nama_makanan = [];
    foreach ($produk_dikeranjang as $produk) {
        if ($produk['jumlah_makanan'] > 0) { // Hanya masukkan makanan yang jumlahnya lebih dari 0
            $nama_makanan[] = $produk['nama_makanan'] . '(' . $produk['jumlah_makanan'] . ')';
        }
    }
    $nama_makanan_str = implode(", ", $nama_makanan); // Contoh: bakso(1), nasi ayam geprek(1), rabokki(2)

    // Simpan data pembayaran ke database
    $query = "INSERT INTO pembayaran (id_pelanggan, nama_pelanggan, nama_makanan, alamat, no_hp, total_harga, diskon, pajak, total_akhir, jumlah_makanan) 
              VALUES ('$id_pelanggan', '$nama_pelanggan', '$nama_makanan_str', '$alamat', '$no_hp', '$total_harga', '$diskon', '$pajak', '$total_harga_final', '$total_makanan')";

    if (mysqli_query($conn, $query)) {
        $id_pembayaran = mysqli_insert_id($conn); // Mendapatkan id_pembayaran yang baru saja dimasukkan

        // Simpan detail pesanan ke tabel detail_pesanan dengan semua makanan dalam satu baris
        $query_detail = "INSERT INTO detail_pesanan (id_pembayaran, nama_pelanggan, nama_makanan, jumlah_makanan, total_harga) 
                         VALUES ('$id_pembayaran', '$nama_pelanggan', '$nama_makanan_str', '$total_makanan', '$total_harga_final')";

        if (!mysqli_query($conn, $query_detail)) {
            echo "Error: " . mysqli_error($conn);
        }

        // Kosongkan keranjang setelah checkout
        unset($_SESSION['keranjang']);
        unset($_SESSION['diskon']);

    }
}
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
<style>
  .swal2-confirm {
      background-color: #914F1E !important; /* Ganti dengan warna yang diinginkan */
      color: white !important; /* Mengubah warna teks */
      border: 2px solid #914F1E!important; 
  }
</style>
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
          <li><a href="list-pesanan.php"class="">List Pesanan</a></li>
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
            <h1> <span>Contact</span></h1>
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
    <section id="checkout" class="section">
    <div class="container">
      <h2>Checkout</h2>
      <div class="row">
        <div class="col-md-8">
          <form action="checkout.php" method="post">
            <div class="form-group">
              <label for="nama_pelanggan">Nama:</label>
              <input type="text" id="nama_pelanggan" name="nama_pelanggan" value="<?= htmlspecialchars($pelanggan['nama_pelanggan']) ?>" class="form-control" required readonly>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat:</label>
              <textarea id="alamat" name="alamat" class="form-control" required><?= htmlspecialchars($pelanggan['alamat']) ?></textarea>
            </div>
            <div class="form-group">
              <label for="no_hp">No Telepon:</label>
              <input type="text" id="no_hp" name="no_hp" value="<?= htmlspecialchars($pelanggan['no_hp']) ?>" class="form-control" required>
            </div>
            <div class="mt-3">
              <h4>Total Makanan: <?= $total_makanan ?> item</h4> <!-- Menampilkan total makanan -->
              <h4>Total Harga: Rp <?= number_format($total_harga, 0, ',', '.') ?></h4>
              <h4>Diskon: Rp <?= number_format($total_harga * $diskon, 0, ',', '.') ?> (<?= $diskon * 100 ?>%)</h4>
              <h4>Pajak (8%): Rp <?= number_format($pajak, 0, ',', '.') ?></h4>
              <h4>Total Akhir: Rp <?= number_format($total_harga_final, 0, ',', '.') ?></h4>
              <button type="submit" name="checkout" class="btn btn-success">Selesaikan Pesanan</button>
            </div>
          </form>
          
          <?php
          if (isset($_POST['checkout'])) {
  echo "
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
  <script>
      Swal.fire({
          title: 'Berhasil!',
          text: 'Pesanan Berhasil di pesan, Silahkan Tunggu Pesanan Anda!',
          icon: 'success',
          confirmButtonText: 'OK'
      }).then((result) => {
          if (result.isConfirmed) {
              window.location.href = 'list-pesanan.php';
          }
      });
  </script>";
} 
?>
        </div>
        <div class="col-md-4">
          <h4>Rincian Pesanan</h4>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($produk_dikeranjang as $item) : ?>
                <tr>
                  <td><img src="../admin/img/<?= htmlspecialchars($item['foto']) ?>" width="80" alt="<?= htmlspecialchars($item['nama_makanan']) ?>"></td>
                  <td><?= htmlspecialchars($item['nama_makanan']) ?></td>
                  <td><?= $item['jumlah_makanan'] ?></td>
                  <td>Rp <?= number_format($item['kategori'], 0, ',', '.') ?></td>
                  <td>Rp <?= number_format($item['total_harga'], 0, ',', '.') ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
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