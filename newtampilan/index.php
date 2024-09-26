<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>AAFood</title>
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
          <li><a href="index.php" class="active" >Home</a></li>
          <li><a href="about.php" class="">About</a></li>
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

<!-- Bagian Hero -->
<section id="hero" class="hero section dark-background">
  <img src="assets/img/hero-bg-2.jpg" alt="" class="hero-bg">

  <div class="container">
    <div class="row gy-4 justify-content-between">
      <div class="col-lg-4 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
        <!-- <img src="assets/img/hero-img.png" class="img-fluid animated" alt=""> -->
      </div>

      <div class="col-lg-6  d-flex flex-column justify-content-center" data-aos="fade-in">
        <h1>Kami Akan Memberikan Menu yang Terbaik Untuk <span>Anda</span></h1>
        <p>Lihat Menu Kami di Sini</p>
        <div class="d-flex">
          <a href="menu.php" class="btn-get-started">Menu</a>
        </div>
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
<!-- /Bagian Hero -->

<!-- Bagian Detail -->
<section id="details" class="details section">

  <!-- Judul Bagian -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Detail</h2>
    <div><span>Cek</span> <span class="description-title">Detail Kami</span></div>
  </div><!-- Akhir Judul Bagian -->

  <div class="container">

    <div class="row gy-4 align-items-center features-item">
      <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
        <img src="assets/img/details-1.png" class="img-fluid" alt="">
      </div>
      <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
        <h3>Memberikan Kualitas Terbaik dan Kepuasan Pelanggan</h3>
        <p class="fst-italic">
          Kami selalu berusaha untuk memberikan pelayanan terbaik dan pengalaman yang memuaskan bagi setiap pelanggan.
        </p>
        <ul>
          <li><i class="bi bi-check"></i><span> Kualitas makanan terbaik dengan bahan-bahan segar.</span></li>
          <li><i class="bi bi-check"></i> <span> Pelayanan yang cepat dan ramah.</span></li>
          <li><i class="bi bi-check"></i> <span> Menyediakan berbagai menu yang sesuai dengan selera Anda.</span></li>
        </ul>
      </div>
    </div><!-- Item Fitur -->

    <div class="row gy-4 align-items-center features-item">
      <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
        <img src="assets/img/details-2.png" class="img-fluid" alt="">
      </div>
      <div class="col-md-7 order-2 order-md-1" data-aos="fade-up" data-aos-delay="200">
        <h3>Pelayanan yang Ramah dan Profesional</h3>
        <p class="fst-italic">
          Kami mengutamakan kenyamanan dan kepuasan pelanggan, serta memberikan pengalaman bersantap yang tak terlupakan.
        </p>
        <p>
          Dari bahan makanan berkualitas hingga pelayanan yang ramah, kami berkomitmen untuk memastikan Anda mendapatkan pengalaman terbaik di setiap kunjungan.
        </p>
      </div>
    </div><!-- Item Fitur -->

  </div>

</section><!-- /Bagian Detail -->

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