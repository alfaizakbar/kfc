<?php
session_start();
include 'koneksi.php';
if(!isset($_SESSION['admin_id'])) {
    header("location:login.php");
    
}
// Mengambil data pengguna dari tabel yang ditambahkan pada hari ini
$today = date('Y-m-d'); // Mendapatkan tanggal hari ini
$sql = "SELECT userid, username, email, namalengkap, alamat FROM user WHERE DATE(tanggal_tambah) = '$today'";
$result = $conn->query($sql);

// Ambil informasi admin_namalengkap dari sesi
$adminNamalengkap = isset($_SESSION['admin_namalengkap']) ? $_SESSION['admin_namalengkap'] : '';
?>
<?php
include 'navbar.php';
?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
          <li class="breadcrumb-item active">Home</li>
          
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="c">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <!-- <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a> -->
                  
                </div>

                <div class="card-body">
                  <h5 class="card-title">Foto </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-images"></i>
                    </div>
                    <div class="ps-3">
                    <?php
            // Mengambil jumlah data pada tabel foto
            $sqlFoto = "SELECT COUNT(*) AS jumlahFoto FROM foto";
            $resultFoto = $conn->query($sqlFoto);
            
            if ($resultFoto->num_rows > 0) {
                $rowFoto = $resultFoto->fetch_assoc();
                $jumlahFoto = $rowFoto["jumlahFoto"];

                echo "<h6>" . $jumlahFoto . "</h6>";
                echo "<span class='text-muted small pt-2 ps-1'> <a href='data_foto.php'>Details</a></span>";
            } else {
                echo "Error: " . $conn->error;
            }
            ?>
                      <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->
                      <!-- <span class="text-muted small pt-2 ps-1">Cek Detail</span> -->
                      
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
               
                </div>

                <div class="card-body">
                  <h5 class="card-title">Album</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-card-checklist"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                    $sqlalbum = "SELECT COUNT(*) AS jumlahalbum FROM album";
            $resultalbum = $conn->query($sqlalbum);
            
            if ($resultalbum->num_rows > 0) {
                $rowalbum = $resultalbum->fetch_assoc();
                $jumlahalbum = $rowalbum["jumlahalbum"];

                echo "<h6>" . $jumlahalbum . "</h6>";
                echo "<span class='text-muted small pt-2 ps-1'> <a href='data_album.php'>Details</a></span>";
            } else {
                echo "Error: " . $conn->error;
            }
            ?>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <!-- <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul> -->
                </div>

                <div class="card-body">
                  <h5 class="card-title">User</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                       $sqluser = "SELECT COUNT(*) AS jumlahuser FROM user";
                       $resultuser = $conn->query($sqluser);
                       
                       if ($resultuser->num_rows > 0) {
                           $rowuser = $resultuser->fetch_assoc();
                           $jumlahuser = $rowuser["jumlahuser"];
           
                           echo "<h6>" . $jumlahuser . "</h6>";
                           echo "<span class='text-muted small pt-2 ps-1'> <a href='data_user.php'>Details</a></span>";
                       } else {
                           echo "Error: " . $conn->error;
                       }
                       ?>
                    

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
     
            
          </div>
        </section>
    

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data user yang registasi hari ini</h5>
              
              <!-- Table with stripped rows -->
              
              <div class="table-responsive">
              <table class="table datatable table-responsive" >
                <thead>
                <tr>
                                        <th>UserID</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Nama Lengkap</th>
                                        <th>Alamat</th>
                                        <!-- <th>Tanggal Registrasi</th> -->
                                    </tr>
                  </thead>
                  <tbody>
                  <?php
                                    // Menampilkan data pengguna ke dalam tabel
                                    $i = 1;
                                    if ($result->num_rows > 0) {
                                      while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $i . "</td>";
                                        echo "<td>" . $row["username"] . "</td>";
                                        echo "<td>" . $row["email"] . "</td>";
                                        echo "<td>" . $row["namalengkap"] . "</td>";
                                        echo "<td>" . $row["alamat"] . "</td>";
                                        // echo "<td>" . $row["tanggal_tambah"] . "</td>";
                                        echo "</tr>";
                                        $i++;
                                      }
                                    } else {
                                      echo "<tr><td colspan='5'>Tidak ada user baru hari ini</td></tr>";
                                    }
                                    ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
              
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  
  
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>AMIRULLAH</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
    </div>
  </footer><!-- End Footer -->
  
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
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
