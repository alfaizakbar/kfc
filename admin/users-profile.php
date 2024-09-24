<?php
session_start();
require '../database/post.php';

$username = $_SESSION["username"];

$orang = query("SELECT * FROM user WHERE username='$username'");
if (!empty($orang)) {
    $orang = $orang[0];
} else {
    echo "User tidak ditemukan";
    exit;
}

if(isset($_POST['apa'])){
    if(apa($_POST) > 0){
        echo "<script>alert('data berhasil di ubah');
            document.location.href = 'index.php'</script>";
    } else {
        echo "<script>alert('data gagal di ubah')</script>";
    }
    ;
}
;

if (!isset($_SESSION['username'])) {
  header("location:login.php");
}
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Users / Profile - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
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

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 09 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<?php
include 'navbar.php';
?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
              <h2> <?= isset($orang['username']) ? $orang['username'] : '' ?></h2>
              <h3>Job : Admin</h3>
              <!-- <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div> -->
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profile</button>
                </li>

                <!-- <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li> -->

                


              </ul>
              <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">



<h5 class="card-title">Profile Details</h5>


<div class="row">
    <div class="col-lg-3 col-md-4 label">Username : </div>
    <div class="col-lg-9 col-md-8"><?= isset($orang['username']) ? $orang['username'] : '' ?></div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Email : </div>
    <div class="col-lg-9 col-md-8"><?= isset($orang['email']) ? $orang['email'] : '' ?></div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Password : </div>
    <div class="col-lg-9 col-md-8"><?= isset($orang['password']) ? $orang['password'] : '' ?></div>
</div>


<div class="row mt-3">
    <div class="col-lg-12 text-right">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Place the edit profile form here -->
                <form id="editProfileForm" method="post" action="">
                <input type="hidden" name="id" value="<?= $orang['id']?>">
                    <!-- Existing form fields -->
                    <div class="mb-3">
                        <label for="newUsername" class="form-label">Username Baru:</label>
                        <input type="text" class="form-control" id="newUsername" name="username" value="<?= $orang['username'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="newEmail" class="form-label">Email Baru:</label>
                        <input type="email" class="form-control" id="newEmail" name="email" value="<?= $orang['email'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="newPassword" class="form-label">Password Baru:</label>
                        <input type="password" class="form-control" id="newPassword" name="password">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti password.</small>
                    </div>

                    <button type="submit" name="apa" class="btn btn-primary" onclick="showConfirmation()">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function showConfirmation() {
        var confirmation = confirm("Yakin ingin mengganti data?");
        if (confirmation) {
            document.getElementById("editProfileForm").submit();
        }
    }
</script>



</div>


                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                </div>

            

             

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
  <script>
    function showConfirmation() {
        var confirmation = confirm("Yakin ingin mengganti data?");
        if (confirmation) {
            document.getElementById("editProfileForm").submit();
        }
    }
    
</script>


</body>

</html>