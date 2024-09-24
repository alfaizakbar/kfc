<?php
require '../database/post.php';
$data = query("SELECT p.*, 
           GROUP_CONCAT(dp.nama_makanan SEPARATOR ', ') AS nama_makanan, 
           GROUP_CONCAT(dp.jumlah_makanan SEPARATOR ', ') AS jumlah_makanan, 
           SUM(dp.jumlah_makanan) AS total_jumlah_makanan
    FROM pembayaran p
    JOIN detail_pesanan dp ON p.id_pembayaran = dp.id_pembayaran
    GROUP BY p.id_pembayaran
    ORDER BY p.id_pembayaran DESC
");
if(isset($_POST["cari"])){
    $data = cari($_POST["keyword"]);
}



// $data = query("SELECT * FROM pembayaran ORDER BY id_pembayaran DESC");
error_reporting(0);
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
error_reporting(0);
?>

<?php include 'navbar.php'; ?>
<main id="main" class="main">
    <div class="pagetitle">
          <h1>Dashboard</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item ">Data User</li>
              <li class="breadcrumb-item active">Bulanan</li>
              
            </ol>
          </nav>
        </div><!-- End Page Title -->
        <hr>
        <div class="container mb-5 mt-4">
        <div class="row justify-content-start">
            <div class="col-md-4">
                <form method="post" class="form-inline">
                    <div class="form-group d-flex mb-4">
                        <label for="search_month" class="mr- w-100">Search by Month:</label>
                        <input type="month" name="search_month" id="search_month" class="form-control">
                        <button type="submit" class="btn btn-primary ml-2">Search</button>
                    </div>
                </form>
            </div>
        </div>
    <section class="section">
   
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data user </h5>
                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                        <table class="table datatable table-responsive">
                                <thead>
                                    <tr>
                                        <th>Tanggal dan Waktu Pembayaran</th>
                                        <th>Alamat</th>
                                        <th>No Handphone</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Nama Makanan</th>
                                        <th>Harga</th>
                                        <th>Jumlah Makanan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php foreach ($data as $row): ?>
                                            <tr>
                                                <td><?= date('d-m-Y H:i:s',
                                                 strtotime($row['tanggal_pembayaran'])) ?></td>
                                                <td><?= $row['alamat'] ?></td>
                                                <td><?= $row['no_hp'] ?></td>
                                                <td><?= $row['nama_pelanggan'] ?></td>
                                                <td>
                                                    <?php
                                                        // Pisahkan nama makanan dan jumlah makanan
                                                        $nama_makanan = explode(", ", $row['nama_makanan']);
                                                        $jumlah_makanan = explode(", ", $row['jumlah_makanan']);
                                                        $nama_dan_jumlah = [];

                                                        // Gabungkan nama makanan dengan jumlah
                                                        foreach ($nama_makanan as $key => $nama) {
                                                            $jumlah = isset($jumlah_makanan[$key]) ? $jumlah_makanan[$key] : 0;
                                                            $nama_dan_jumlah[] = $nama . " (" . $jumlah . ")";
                                                        }

                                                        // Tampilkan nama makanan dengan jumlah dalam satu kolom
                                                        echo implode(", ", $nama_dan_jumlah);
                                                    ?>
                                                </td>
                                                <td><?= $row['total_jumlah_makanan'] ?></td> <!-- Menampilkan jumlah total makanan -->
                                                <td><?= number_format($row['total_harga'], 0, ',', '.') ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
            <div class="col-md-12 text-right">
                <button class="btn btn-success" onclick="printData()">Cetak Data</button>
            </div>
            <script>
        function printData() {
            window.print();
        }
    </script>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<footer id="footer" class="footer">
    <div class="copyright">
    &copy; Copyright <strong><span>AA Food</span></strong>. All Rights Reserved
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
