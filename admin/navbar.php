<?php


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard Admin</title>
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
  <link rel="stylesheet" href="foto.css">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 09 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- <a href="logout.php">logout</a> -->

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <span class="d-none d-lg-block">ADMIN</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar ">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

       
       

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
            <span class="d-none d-md-block dropdown-toggle ps-2"><?=$_SESSION['admin_namalengkap'] ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?=$_SESSION['admin_namalengkap'] ?></h6>
              <span>Admin Menu</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            

            <!-- <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li> -->
            


            <li>
    <a class="dropdown-item d-flex align-items-center" href="logout.php" >
        <i class="bi bi-box-arrow-right"></i>
        <span>Logout</span>
    </a>
    
</li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <!-- <li class="nav-item mt-2">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item mt-2">
        <a class="nav-link " href="data_user.php">
          <i class="bi bi-envelope"></i>
          <span>Data User</span>
        </a>
      </li>
      <li class="nav-item mt-2">
        <a class="nav-link " href="data_album.php">
          <i class="bi bi-question-circle"></i>
          <span>Data Album</span>
        </a>
      </li>
      <li class="nav-item mt-2">
        <a class="nav-link " href="data_foto.php">
          <i class="bi bi-image"></i>
          <span>Data Foto</span>
        </a>
      </li>
      <li class="nav-item mt-2">
        <a class="nav-link " href="data_contact.php">
          <i class="bi bi-card-list"></i>
          <span>Data Foto</span>
        </a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-grid"></i><span>Dashboard</span>
        </a>
      <li class="nav-item">
        <a class="nav-link collapsed" href="data_user.php">
          <i class="bi bi-people"></i><span>Data User</span>
        </a>
      <li class="nav-item">
        <a class="nav-link collapsed" href="data_album.php">
          <i class="bi bi-menu-button-wide"></i><span>Data Album</span>
        </a>
      <li class="nav-item">
        <a class="nav-link collapsed" href="data_foto.php">
          <i class="bi bi-image"></i><span>Data Foto</span>
        </a>
      <li class="nav-item">
        <a class="nav-link collapsed" href="data_contact.php">
          <i class="bi bi-card-list"></i><span>Data Contact</span>
        </a>
      <li class="nav-item">
        <a class="nav-link collapsed" href="data_saran.php">
          <i class="bi bi-chat"></i><span>Data Saran</span>
        </a>
       
        <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Laporan User</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="data_user_perhari.php">
              <i class="bi bi-circle"></i><span>Harian</span>
            </a>
          </li>
          <li>
            <a href="data_user_perbulan.php">
              <i class="bi bi-circle"></i><span>Bulanan</span>
            </a>
          </li>
          <li>
            <a href="data_user_pertahun.php">
              <i class="bi bi-circle"></i><span>Tahunan</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Laporan Foto</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="data_foto_harian.php">
              <i class="bi bi-circle"></i><span>Harian</span>
            </a>
          </li>
          <li>
            <a href="data_foto_bulanan.php">
              <i class="bi bi-circle"></i><span>Bulanan</span>
            </a>
          </li>
          <li>
            <a href="data_foto_tahunan.php">
              <i class="bi bi-circle"></i><span>Tahunan</span>
            </a>
          </li>
         
        </ul>
      </li><!-- End Tables Nav -->
     




      

   

    </ul>

  </aside><!-- End Sidebar-->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



</body>
<script>
    //   function confirmLogout() {
    //     var confirmation = confirm("Yakin ingin logout?");
    //     if (confirmation) {
    //       window.location.href = "logout.php";
    //     } else {
    //       window.location.href = "index.php";

    //     }
    // }

</script>

</html>