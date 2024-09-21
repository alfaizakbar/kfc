<?php
session_start();

require '../database/post.php';



$data = query("SELECT * FROM blog ORDER BY id DESC");
error_reporting(0);

session_start();

if (!isset($_SESSION['username'])) {
  header("location:login.php");
}
error_reporting(0);


;


?>

<?php include 'navbar.php'; ?>

<main id="main" class="main">
<div class="pagetitle">
          <h1>Dashboard</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard Makanan</a></li>
              <li class="breadcrumb-item active">Data Makanan</li>
              
            </ol>
          </nav>
        </div><!-
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Foto</h5>
                        <div class="table-responsive">
                            <table class="table datatable table-responsive">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Makanan</th>
                                        <th>Harga</th>
                                        <th>Tanggal Unggah</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i =1; ?>
    <?php foreach($data as $row){ ?>
        <tr>
            
            <td><?= $i ?></td>
            <td><?= $row['nama_makanan'] ?></td>
            <td><?= $row['kategori'] ?></td>
            <td><?= $row['tanggal'] ?></td>
            <td class="yakin">
            <a href="halamandetail1.php?id=<?= $row['id'] ?>" class="hd">Detail</a>
            </td>
        </tr>
        <?php $i++ ?>
        <?php } ?>
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
    <!-- Tambahkan footer dan skrip lainnya di sini -->
</footer>

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
