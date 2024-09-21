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
        </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Makanan</h5>
                        <div class="d-flex justify-content-end mb-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMakananModal">
        Add Makanan
    </button>
</div>

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
                <!-- Tombol Detail dengan Ikon -->
                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" 
                        data-bs-target="#viewMakananModal<?= $row['id'] ?>" title="Detail">
                    <i class="bi bi-eye"></i>
                </button>
                <!-- Tombol Edit dengan Ikon -->
                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" 
                        data-bs-target="#editMakananModal<?= $row['id'] ?>" title="Edit">
                    <i class="bi bi-pencil"></i>
                </button>
                <!-- Tombol Hapus dengan Ikon -->
                <a href="delete_makanan.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" 
                   onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');" title="Hapus">
                    <i class="bi bi-trash"></i>
                </a>
            </td>
        </tr>
        <?php $i++ ?>
        <?php } ?>
                                </tbody>
                            </table>
                            <!-- Modal for Adding Makanan -->
<div class="modal fade" id="addMakananModal" tabindex="-1" aria-labelledby="addMakananModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addMakananModalLabel">Add Makanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addMakananForm" action="add_makanan.php" method="POST">
          <div class="mb-3">
            <label for="namaMakanan" class="form-label">Nama Makanan</label>
            <input type="text" class="form-control" id="namaMakanan" name="nama_makanan" required>
          </div>
          <div class="mb-3">
            <label for="kategori" class="form-label">Harga</label>
            <input type="text" class="form-control" id="kategori" name="kategori" required>
          </div>
          <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Unggah</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php foreach ($data as $row) { ?>
<!-- Modal View Makanan -->
<div class="modal fade" id="viewMakananModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="viewMakananModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewMakananModalLabel">Detail Makanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>Nama Makanan:</strong> <?= $row['nama_makanan'] ?></p>
        <p><strong>Harga:</strong> <?= $row['kategori'] ?></p>
        <p><strong>Tanggal Unggah:</strong> <?= $row['tanggal'] ?></p>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<?php foreach ($data as $row) { ?>
<!-- Modal Edit Makanan -->
<div class="modal fade" id="editMakananModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="editMakananModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editMakananModalLabel">Edit Makanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editMakananForm<?= $row['id'] ?>" action="edit_makanan.php" method="POST">
          <input type="hidden" name="id" value="<?= $row['id'] ?>">
          <div class="mb-3">
            <label for="namaMakanan" class="form-label">Nama Makanan</label>
            <input type="text" class="form-control" id="namaMakanan" name="nama_makanan" value="<?= $row['nama_makanan'] ?>" required>
          </div>
          <div class="mb-3">
            <label for="kategori" class="form-label">Harga</label>
            <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $row['kategori'] ?>" required>
          </div>
          <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Unggah</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $row['tanggal'] ?>" required>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>


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
