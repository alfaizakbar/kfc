<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['admin_id'])) {
    header("location:login.php");
    exit();
}

// Mengambil data saran dari tabel 'saran'
$sqlsaran = "SELECT saran.*, user.userid, user.namalengkap FROM saran JOIN user ON saran.userid = user.userid";
$resultsaran = $conn->query($sqlsaran);

// Menyimpan data saran dalam bentuk array
$sarans = [];
while ($rowsaran = $resultsaran->fetch_assoc()) {
    $sarans[] = $rowsaran;
}

$adminNamalengkap = isset($_SESSION['admin_namalengkap']) ? $_SESSION['admin_namalengkap'] : '';

// Menutup koneksi database
$conn->close();
?>

<?php include 'navbar.php'; ?>
<main id="main" class="main">
    <div class="pagetitle">
          <h1>Dashboard</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Data saran</li>
              
            </ol>
          </nav>
        </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data saran</h5>
                        <div class="table-responsive">
                            <table class="table datatable table-responsive">
                                <thead>
                                    <tr>
                                        <th>ID saran</th>
                                        <!-- <th>Nama saran</th> -->
                                        <th>Pesan saran</th>
                                        <th>Tanggal saran</th>
                                        <th>ID Pengguna</th>
                                        <th>Nama Pengguna</th>
                                        <!-- <th>Email</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($sarans as $saran) {
                                        echo "<tr>";
                                        echo "<td>" . $i . "</td>";
                                        // echo "<td>" . $saran['namasaran'] . "</td>";
                                        echo "<td>" . $saran['isisaran'] . "</td>";
                                        echo "<td>" . $saran['tanggalsaran'] . "</td>";
                                        echo "<td>" . $saran['userid'] . "</td>";
                                        echo "<td>" . $saran['namalengkap'] . "</td>";
                                        // echo "<td>" . $saran['email'] . "</td>";
                                        echo "<td>
                                        <a class='btn btn-danger' href='hapus_saran.php?saranid=" . $saran['saranid'] . "'>Hapus</a>
                                    </td>";
                                        echo "</tr>";
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>AMIRULLAH</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX saran form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
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
