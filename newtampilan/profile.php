

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Page</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <!-- Bootstrap CSS -->
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

  <!-- Custom CSS for additional styling -->
  <style>
    body {
      background-color: #f8f9fa;
    }

    .profile-header {
      background-color: #fff;
      border-radius: 15px;
      padding: 2rem;
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    }

    .profile-card {
      background-color: #fff;
      border-radius: 15px;
      padding: 2rem;
      text-align: center;
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    }

    .profile-card img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      margin-bottom: 1rem;
    }

    .social-links a {
      margin: 0 10px;
      font-size: 1.5rem;
      color: #495057;
    }

    .social-links a:hover {
      color: #007bff;
    }

    .modal-content {
      border-radius: 15px;
    }
  </style>
</head>

<body>


<?php
session_start();
require '../database/konn.php';

$nama_pelanggan = $_SESSION["nama_pelanggan"];

// Ambil data pelanggan berdasarkan session
$pelanggan_query = queryy("SELECT * FROM pelanggan WHERE nama_pelanggan='$nama_pelanggan'");

if (isset($pelanggan_query[0])) {
    $pelanggan = $pelanggan_query[0];
} else {
    echo "<script>
        alert('Data pelanggan tidak ditemukan.');
        window.location.href = 'index.php';
    </script>";
    exit;
}

// Proses ubah data
if (isset($_POST['ubah'])) {
    $nama_baru = $_POST['nama_pelanggan'];
    $email_baru = $_POST['email'];
    $password_baru = $_POST['password'];

    // Cek apakah password diisi, jika tidak gunakan password lama
    if (empty($password_baru)) {
        $password_baru = $pelanggan['password']; // gunakan password lama
    } else {
        $password_baru = mysqli_real_escape_string($conn, $password_baru); // sanitasi input
    }

    // Lakukan update data menggunakan prepared statement untuk keamanan
    $stmt = mysqli_prepare($conn, "UPDATE pelanggan SET nama_pelanggan=?, email=?, password=? WHERE nama_pelanggan=?");
    mysqli_stmt_bind_param($stmt, 'ssss', $nama_baru, $email_baru, $password_baru, $nama_pelanggan);
    
    if (mysqli_stmt_execute($stmt)) {
        // Update session dengan nama_pelanggan baru
        $_SESSION["nama_pelanggan"] = $nama_baru;

        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: 'Data berhasil diubah',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'profile.php';
                }
            });
        </script>";
    } else {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                title: 'Gagal!',
                text: 'Data gagal diubah',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>";
    }
    mysqli_stmt_close($stmt);
}

error_reporting(0);
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
          <li><a href="menu.php" >Menu</a></li>
          <li><a href="pesanan.php" class="active">Pesanan</a></li>
          <li><a href="keranjang.php" >Keranjang</a></li>
          
          <li><a href="gallery.php" >Gallery</a></li>
          <li><a href="contact.php">Contact</a></li>
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

  <main class="main mb-5">
    

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
      <img src="assets/img/hero-bg-2.jpg" alt="" class="hero-bg">

      <div class="container">
        <div class="row gy-4 justify-content-between">
          <div class="col-lg-4 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
            <!-- <img src="assets/img/hero-img.png" class="img-fluid animated" alt=""> -->
          </div>

          <div class="col-lg-6  d-flex flex-column justify-content-center" data-aos="fade-in">
            <h1> <span>Profile</span></h1>
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



    <!-- Main Profile Section -->
  <div class="container mt-5">
    <div class="profile-header text-center mb-5">
      <h1 class="display-6">Profile Pelanggan</h1>
    
    </div>

    <div class="row d-flex align-items-stretch">
  <!-- Profile Info -->
  <div class="col-md-4">
    <div class="profile-card h-100 d-flex flex-column align-items-center text-center p-4">
      <img src="https://via.placeholder.com/120" alt="Profile" class="rounded-circle mb-3">
      <h2><?= $pelanggan['nama_pelanggan']?></h2>
      <h5>PELANGGAN</h5>

      <!-- <div class="social-links mt-3">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div> -->
    </div>
  </div>

  <!-- Profile Details -->
     <div class="col-md-8">
       <div class="profile-card h-100 p-4">
         <h5 class="card-title mb-4">Profile Details</h5>
               
          <div class="row mb-3">
            <div class="col-lg-4 label text-start">Nama Pelanggan</div>
            <div class="col-lg-8 text-start"><?= $pelanggan['nama_pelanggan']?></div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-4 label text-start">Email</div>
            <div class="col-lg-8 text-start"><?= $pelanggan['email']?></div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-4 label text-start">Alamat</div>
            <div class="col-lg-8 text-start"><?= $pelanggan['alamat']?></div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-4 label text-start">Nomor HP</div>
            <div class="col-lg-8 text-start"><?= $pelanggan['no_hp']?></div>
          </div>

      <!-- Right-aligned button -->
      <div class="d-flex justify-content-end mt-4">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>
      </div>
    </div>
  </div>
</div>

  </div>

  <!-- Edit Profile Modal -->
  <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <div class="mb-3">
              <label for="newUsername" class="form-label">New Username</label>
              <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan']?>">
              <input type="text" class="form-control" name="nama_pelanggan" id="newUsername" value="<?= $pelanggan['nama_pelanggan']?>" required>
            </div>

            <div class="mb-3">
              <label for="newEmail" class="form-label">New Email</label>
              <input type="email" class="form-control" name="email" id="newEmail" value="<?= $pelanggan['email']?>" required>
            </div>

            <div class="mb-3">
              <label for="newEmail" class="form-label">New Alamat</label>
              <input type="text" class="form-control" name="alamat"  value="<?= $pelanggan['alamat']?>" required>
            </div>

            <div class="mb-3">
              <label for="newEmail" class="form-label">New Nomor HP</label>
              <input type="text" class="form-control" name="no_hp"  value="<?= $pelanggan['no_hp']?>" required>
            </div>

            <div class="mb-3">
              <label for="newPassword" class="form-label">New Password</label>
              <input type="password" class="form-control" name="password" id="newPassword" placeholder="Leave blank to keep current password">
              <div class="tp">
                    <input type="checkbox" onclick="myFunction()"><p>Tampilkan Password</p>
                </div>
            </div>

            <div class="text-end">
              <button type="submit" class="btn btn-primary" name="ubah">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


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



  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
        function myFunction() {
            var x = document.getElementById("newPassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>
