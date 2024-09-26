<?php
require '../database/post.php';

// Query untuk mengambil data dari tabel pembayaran dan detail_pesanan
$data = query("SELECT p.*, 
           GROUP_CONCAT(dp.nama_makanan SEPARATOR ', ') AS nama_makanan, 
           GROUP_CONCAT(dp.jumlah_makanan SEPARATOR ', ') AS jumlah_makanan, 
           SUM(dp.jumlah_makanan) AS total_jumlah_makanan
    FROM pembayaran p
    JOIN detail_pesanan dp ON p.id_pembayaran = dp.id_pembayaran
    GROUP BY p.id_pembayaran
    ORDER BY p.id_pembayaran DESC
");


session_start();

// Cek apakah admin sudah login, jika belum redirect ke login page
if (!isset($_SESSION['username'])) { // Ubah nama variabel sesi
    header("Location: login.php");
    exit;
}

// Dapatkan username admin dari sesi
$username_admin = $_SESSION['username'];

error_reporting(0);
?>

<?php include 'navbar.php'; ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item">Data User</li>
                <li class="breadcrumb-item active">Data Makanan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <hr>
    <div class="container mb-5 mt-4">
        <div class="row justify-content-start">
            <div class="col-md-4">
                <form method="post" class="form-inline">
                </form>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data user</h5>
                            <!-- Table with stripped rows -->
                            <div class="table-responsive">
                                <table class="table datatable table-responsive">
                                <thead>
    <tr>
        <th>Tanggal dan Waktu Pembayaran</th>
        <th>Alamat</th>
        <th>No Handphone</th>
        <th>Nama Pelanggan</th>
        <th>Nama Makanan</th> <!-- Gabungan kolom nama makanan dan jumlah makanan -->
        <th>Jumlah Makanan</th> <!-- Kolom baru untuk jumlah total makanan -->
        <th>Harga</th>
        <th>Aksi</th> <!-- Tambahkan kolom Aksi -->
    </tr>
</thead>
<tbody>
    <?php foreach ($data as $row): ?>
        <tr>
            <td><?= date('d-m-Y H:i:s', strtotime($row['tanggal_pembayaran'])) ?></td>
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
            <td>
                <!-- Tombol download -->
                <div class="" style="display:flex;">
                <a href="download.php?id_pembayaran=<?= $row['id_pembayaran'] ?>" class="btn btn-primary btn-sm m-1">
                    <i class="bi bi-download"></i> <!-- Ikon download Bootstrap -->
                </a>
                <!-- Tombol hapus -->
                 
                    
                     <a href="hapus.php?id_pembayaran=<?= $row['id_pembayaran'] ?>" class="btn btn-danger btn-sm m-1 " onclick="return confirm('Yakin ingin menghapus data ini?');">
                         <i class="bi bi-trash"></i> <!-- Ikon hapus Bootstrap -->
                        </a>
                    </div>
            </td>
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
            </div>
        </section>
    </div>
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
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/js/main.js"></script>
<script>
    setTimeout(function(){
        location.reload();
    }, 5000); // 5000 milidetik = 5 detik
    
</script>

