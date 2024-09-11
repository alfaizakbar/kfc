<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['admin_id'])) {
    header("location:login.php");
    exit();
}

// Mengambil data contact dari tabel 'contact'
$sqlcontact = "SELECT contact.*, user.userid, user.namalengkap FROM contact JOIN user ON contact.userid = user.userid";
$resultcontact = $conn->query($sqlcontact);

// Menyimpan data contact dalam bentuk array
$contacts = [];
while ($rowcontact = $resultcontact->fetch_assoc()) {
    $contacts[] = $rowcontact;
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
              <li class="breadcrumb-item active">Data Contact</li>
              
            </ol>
          </nav>
        </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Contact</h5>
                        <div class="table-responsive">
                            <table class="table datatable table-responsive">
                                <thead>
                                    <tr>
                                        <th>ID contact</th>
                                        <!-- <th>Nama contact</th> -->
                                        <th>Pesan Contact</th>
                                        <th>Tanggal Contact</th>
                                        <th>ID Pengguna</th>
                                        <th>Nama Pengguna</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($contacts as $contact) {
                                        echo "<tr>";
                                        echo "<td>" . $i . "</td>";
                                        // echo "<td>" . $contact['namacontact'] . "</td>";
                                        echo "<td>" . $contact['isicontact'] . "</td>";
                                        echo "<td>" . $contact['tanggalcontact'] . "</td>";
                                        echo "<td>" . $contact['userid'] . "</td>";
                                        echo "<td>" . $contact['namalengkap'] . "</td>";
                                        echo "<td>" . $contact['email'] . "</td>";
                                        echo "<td>
                                        <a class='btn btn-danger' href='hapus_contact.php?contactid=" . $contact['contactid'] . "'>Hapus</a>
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
