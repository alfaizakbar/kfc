<?php
session_start();
require 'function.php';
$nama_pelanggan = $_SESSION["nama_pelanggan"];
$pelanggan=queryy("SELECT * FROM pelanggan WHERE nama_pelanggan='$nama_pelanggan'")[0];


$id = $_GET["id"];
$data = queryy("SELECT * FROM blog WHERE id = $id");
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
            <h1> <span>Detail Pesanan</span></h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Soluta, ipsa?</p>
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
    <!-- /Hero Section -->


    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Pesanan</h2>
        <div><span>Detail</span> <span class="description-title">Pesanan</span></div>
      </div><!-- End Section Title -->

      <!-- detail -->
<!-- Detail Section -->
<!-- Detail Produk -->
<div class="container" data-aos="fade" data-aos-delay="100">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-6">
            <?php foreach($data as $row){ ?>
            <img src="../admin/img/<?= $row['foto']?>" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-6">
            <div class="card-body d-flex flex-column justify-content-between">
              <div>
                <h1 class="card-title"><?= $row['nama_makanan']?></h1>
                <p class="card-text">Harga: <?= number_format($row['kategori'], 0, ',', '.')?></p>
                <p class="card-text"><small class="text-muted"><?= $row['tanggal']?></small></p>
                <?php } ?>
              </div>
              <div class="text-end mt-5">
                <!-- Form Tambah ke Keranjang -->
                <form action="" method="post">
                  <input type="hidden" name="id_produk" value="<?= $id ?>">
                  <input type="submit" name="tambah_keranjang" class="btn btn-primary" value="Tambahkan ke Keranjang">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
// Memproses form ketika tombol "Tambah ke Keranjang" diklik
if (isset($_POST['tambah_keranjang'])) {
  $id_produk = $_POST['id_produk'];
  tambahKeKeranjang($id_produk);

  echo "
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
  <script>
      Swal.fire({
          title: 'Berhasil!',
          text: 'Produk berhasil ditambahkan ke keranjang!',
          icon: 'success',
          confirmButtonText: 'OK'
      }).then((result) => {
          if (result.isConfirmed) {
              window.location.href = 'pesanan.php';
          }
      });
  </script>";
}

?>

<!-- Gallery -->
<!-- detail -->

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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>