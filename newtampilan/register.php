<?php
require '../database/konn.php';


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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body >


<section class="mt-2">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
      <a href="index.php" class="btn btn-secondary btn-back mb-2">Back</a>

        <img src="assets/img/gallery/gallery-2.jpg"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form method="post">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3">Halaman Register</p>
            <!-- <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-facebook-f"></i>
            </button>

            <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-twitter"></i>
            </button>

            <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-linkedin-in"></i>
            </button> -->
          </div>

          <div class="divider d-flex align-items-center my-4">
            <!-- <p class="text-center fw-bold mx-3 mb-0">Or</p> -->
          </div>

          <!-- Email input -->
          <div data-mdb-input-init class="form-outline mb-4">
              <label class="form-label" for="form3Example3">Nama</label>
            <input type="text" name="nama_pelanggan" id="form3Example3" class="form-control form-control-lg"
              placeholder="Masukkan Nama" />
          </div>
          <!-- Email input -->
          <div data-mdb-input-init class="form-outline mb-4">
              <label class="form-label" for="form3Example3">Email</label>
            <input type="email" name="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Masukkan Email" />
          </div>
          <!-- Email input -->
          <div data-mdb-input-init class="form-outline mb-4">
              <label class="form-label" for="form3Example3">Nomor HP</label>
            <input type="text" name="no_hp" id="form3Example3" class="form-control form-control-lg"
              placeholder="Masukkan Nomor HP" />
          </div>
          <!-- Alamat -->
          <div data-mdb-input-init class="form-outline mb-4">
              <label class="form-label" for="form3Example3">Alamat</label>
            <input type="text" name="alamat" id="form3Example3" class="form-control form-control-lg"
              placeholder="Masukan Alamat" />
          </div>

          <!-- Password input -->
          <div data-mdb-input-init class="form-outline mb-3">
              <label class="form-label" for="form3Example4">Password</label>
            <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" />
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            

          <div class="text-center text-lg-start mt-4 pt-2">
            <button  type="submit" name="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">You have  account? <a href="login.php"
                class="link-danger">Login</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  <?php 
  if( isset($_POST["submit"])){
    if( registrasii($_POST) > 0){
        echo "<script>
        Swal.fire({
            title: 'Success!',
            text: 'Register berhasil!',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'login.php';
            }
        });
        </script>";
    } else {
        echo "<script>
        Swal.fire({
            title: 'Oops...',
            text: 'Register gagal!',
            icon: 'error',
            confirmButtonText: 'Coba Lagi'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'register.php';
            }
        });
        </script>";
    }
};

  ?>

</section>
<!-- </main> -->

   
  

 


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