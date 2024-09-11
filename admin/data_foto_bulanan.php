<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['admin_id'])) {
    header("location:login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $searchMonth = $_POST['search_month'];
    $sqlFoto = "SELECT foto.*, user.userid AS user_userid, user.namalengkap AS user_namalengkap, album.albumid AS album_albumid, album.namaalbum AS album_namaalbum FROM foto JOIN user ON foto.userid = user.userid JOIN album ON foto.albumid = album.albumid WHERE MONTH(foto.tanggalunggah) = '$searchMonth'";
} else {
    $sqlFoto = "SELECT foto.*, user.userid AS user_userid, user.namalengkap AS user_namalengkap, album.albumid AS album_albumid, album.namaalbum AS album_namaalbum FROM foto JOIN user ON foto.userid = user.userid JOIN album ON foto.albumid = album.albumid";
}

$resultFoto = $conn->query($sqlFoto);

$fotos = [];
while ($rowFoto = $resultFoto->fetch_assoc()) {
    $fotos[] = $rowFoto;
}

$adminNamalengkap = isset($_SESSION['admin_namalengkap']) ? $_SESSION['admin_namalengkap'] : '';

$conn->close();
?>
<?php include 'navbar.php'; ?>

<main id="main" class="main">
<div class="pagetitle">
          <h1>Dashboard</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item ">Data Foto</li>
              <li class="breadcrumb-item active">Bulanan</li>
              
            </ol>
          </nav>
        </div>
        <hr>
        <div class="container mb-5 mt-4">
        <div class="row justify-content-start">
            <div class="col-md-4">
                <form method="post" class="form-inline">
                    <div class="form-group d-flex mb-3">
                        <label for="search_month" class="mr-2 w-100">Cari berdasarkan Bulan:</label>
                        <input type="month" name="search_month" id="search_month" class="form-control">
                        <button type="submit" class="btn btn-primary ml-2">Cari</button>
                    </div>
                </form>
            </div>
        </div>
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
                                        <th>ID Foto</th>
                                        <th>Foto</th>
                                        <th>Judul Foto</th>
                                        <th>Deskripsi Foto</th>
                                        <th>Tanggal Unggah</th>
                                        <!-- <th>Lokasi File</th> -->
                                        <th>ID Pengguna</th>
                                        <th>Nama Pengguna</th>
                                        <th>ID Album</th>
                                        <th>Nama Album</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($fotos as $foto) {
                                        echo "<tr>";
                                        echo "<td>" . $i . "</td>";
                                        echo "<td><img src='". '../gambar/' . $foto['lokasifile'] . "' alt='Foto' style='width:100px;'></td>";
                                        echo "<td>" . $foto['judulfoto'] . "</td>";
                                        echo "<td>" . $foto['deskripsifoto'] . "</td>";
                                        echo "<td>" . $foto['tanggalunggah'] . "</td>";
                                        // echo "<td>" . $foto['lokasifile'] . "</td>";
                                        echo "<td>" . $foto['userid'] . "</td>";
                                        echo "<td>" . $foto['user_namalengkap'] . "</td>";
                                        echo "<td>" . $foto['albumid'] . "</td>";
                                        echo "<td>" . $foto['album_namaalbum'] . "</td>";

                                        echo "</tr>";
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
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
