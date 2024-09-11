<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Login Admin </title>
  <!-- <link href="assets/img/favicon.png" rel="icon"> -->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- Tambahan tag meta, stylesheets, dan scripts... -->
</head>

<body>
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="card mb-3">
                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login ke Akun Anda</h5>
                    <p class="text-center small">Masukkan username & password Anda untuk login</p>
                  </div>

              
               
                  <?php
                                      if (isset($_SESSION['login_error'])) {
                                        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['login_error'] . '</div>';
                                        unset($_SESSION['login_error']);
                                    }
                                    ?>
               

                  <form action="proses_login.php" method="post" class="row g-3 needs-validation" novalidate>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <input type="text" name="admin_username" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Silakan masukkan username Anda.</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <div class="input-group">
                        <input type="password" name="admin_password" class="form-control" id="yourPassword" required>
                        <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">Tampilkan</button>
                        <div class="input-group-append">
                          </div>
                        </div>
                        <div class="invalid-feedback">Silakan masukkan password Anda!</div>
                      </div>
                      
                      <!-- <div class="col-12"> -->
                        <!-- <div class="form-check"> -->
                          <!-- <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe"> -->
                        <!-- <label class="form-check-label" for="rememberMe">Ingat saya</label> -->
                      <!-- </div> -->
                    <!-- </div> -->

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    
                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>
      </section>
    </div>
  </main>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <!-- Tambahan scripts... -->

  <script>
    function togglePassword() {
      var passwordField = document.getElementById("yourPassword");
      var passwordToggle = document.getElementById("passwordToggle");

      if (passwordField.type === "password") {
        passwordField.type = "text";
        passwordToggle.innerText = "Sembunyikan";
      } else {
        passwordField.type = "password";
        passwordToggle.innerText = "Tampilkan";
      }
    }
  </script>
</body>

</html>
