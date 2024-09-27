<?php
// Koneksi ke database
$data = mysqli_connect('localhost', 'root', '', 'company_profile');

// Mengambil data dari tabel pelanggan
$result = mysqli_query($data, "SELECT * FROM pelanggan WHERE DATE(created_at) = CURDATE()");
$pelanggan = mysqli_fetch_assoc($result);

require '../database/koneksi.php';
$data = query("SELECT * FROM pelanggan ORDER BY id_pelanggan DESC LIMIT 3");
$data1 = query("SELECT * FROM blog ORDER BY id DESC LIMIT 5");

// Mengambil jumlah blog dan pelanggan
$get = mysqli_query($conn, "SELECT * FROM blog");
$count = mysqli_num_rows($get);

$get1 = mysqli_query($conn, "SELECT * FROM pelanggan");
$count1 = mysqli_num_rows($get1);

$get2 = mysqli_query($conn, "SELECT * FROM pelanggan WHERE DATE(created_at) = CURDATE()");
$count2 = mysqli_num_rows($get2);
// Query untuk menghitung jumlah pelanggan yang registrasi hari ini


// Memulai sesi
session_start();

// Memeriksa apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
error_reporting(0);

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
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Total Makanan</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-images"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$count;?></h6>
                      <span class='text-muted small pt-2 ps-1'><a href='data_foto.php'>Details</a></span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Total Pelanggan</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$count1;?></h6>
                      <span class='text-muted small pt-2 ps-1'><a href='#'>Details</a></span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Customers Card -->
            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Total Pelanggan Baru Hari Ini</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$count2;?></h6>
                      <span class='text-muted small pt-2 ps-1'><a href='#'>Details</a></span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Customers Card -->



          </div>
        </div><!-- End Left side columns -->

    </section>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Pelanggan yang Registrasi Hari Ini</h5>
              <!-- Table with stripped rows -->
              <div class="table-responsive">
                <table class="table datatable table-striped">
                  <thead>
                    <tr>
                      <th>PelangganID</th>
                      <th>Nama Pelanggan</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // Cek apakah ada pelanggan yang registrasi hari ini
                    if ($result && $result->num_rows > 0) {
                        $i = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $i . "</td>"; // Nomor urut pelanggan
                            echo "<td>" . $row["nama_pelanggan"] . "</td>"; // Menampilkan nama_pelanggan
                            echo "<td>" . $row["email"] . "</td>"; // Menampilkan email
                            echo "</tr>";
                            $i++;
                        }
                    } else {
                        // Jika tidak ada pelanggan yang registrasi hari ini
                        echo "<tr><td colspan='3'>Tidak ada pelanggan baru hari ini</td></tr>";
                    }
                    ?>
                  </tbody>
                </table>
              </div><!-- End Table with stripped rows -->
            </div>
          </div>
        </div>
      </div>
    </section>

</main><!-- End #main -->

<footer id="footer" class="footer">
  <div class="copyright">
    &copy; Copyright <strong><span>AA Food</span></strong>. All Rights Reserved
  </div>
  <div class="credits">
    <!-- Designed by BootstrapMade -->
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
