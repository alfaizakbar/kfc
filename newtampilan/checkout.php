<?php
session_start();
require_once 'function.php'; // Gunakan require_once untuk menghindari deklarasi ulang fungsi

// Cek apakah keranjang kosong
if (empty($_SESSION['keranjang'])) {
    header("Location: keranjang.php");
    exit;
}

// Ambil data keranjang dari session
$keranjang = $_SESSION['keranjang'];

// Ambil detail produk dari database berdasarkan ID di keranjang
$produk_dikeranjang = [];
$total_harga = 0;
foreach ($keranjang as $id_produk => $jumlah) {
    $produk = query("SELECT * FROM blog WHERE id = $id_produk")[0];
    $produk['jumlah'] = $jumlah;
    $produk['total'] = $jumlah * $produk['kategori']; // Asumsi harga ada di kolom 'kategori'
    $total_harga += $produk['total'];
    $produk_dikeranjang[] = $produk;
}

// Ambil diskon dari sesi
$diskon = isset($_SESSION['diskon']) ? $_SESSION['diskon'] : 0;

// Terapkan diskon ke total harga
$total_harga_diskon = $total_harga * (1 - $diskon);

// Hitung pajak (misalnya 8%)
$pajak = $total_harga_diskon * 0.08;
$total_harga_final = $total_harga_diskon + $pajak;

// Simpan data checkout jika form disubmit
if (isset($_POST['checkout'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];

    // Validasi data
    if (empty($nama) || empty($alamat) || empty($no_telp)) {
        echo "Nama, alamat, dan nomor telepon harus diisi.";
        exit;
    }

    // Simpan data pesanan ke database
    $query = "INSERT INTO pesanan (nama, alamat, no_telp, total_harga, diskon, pajak, total_akhir) VALUES ('$nama', '$alamat', '$no_telp', $total_harga, $diskon, $pajak, $total_harga_final)";
    mysqli_query($conn, $query);
    $id_pesanan = mysqli_insert_id($conn);

    // Simpan detail pesanan
    foreach ($keranjang as $id_produk => $jumlah) {
        $produk = query("SELECT * FROM blog WHERE id = $id_produk")[0];
        $total_produk = $jumlah * $produk['kategori'];
        $query_detail = "INSERT INTO detail_pesanan (id_pesanan, id_produk, jumlah, total) VALUES ($id_pesanan, $id_produk, $jumlah, $total_produk)";
        mysqli_query($conn, $query_detail);
    }

    // Kosongkan keranjang setelah checkout
    unset($_SESSION['keranjang']);
    unset($_SESSION['diskon']);

    // Redirect ke halaman konfirmasi
    header("Location: konfirmasi.php?id_pesanan=$id_pesanan");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout</title>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>

<main class="main">
  <section id="checkout" class="section">
    <div class="container">
      <h2>Checkout</h2>
      <div class="row">
        <div class="col-md-8">
          <form action="checkout.php" method="post">
            <div class="form-group">
              <label for="nama">Nama:</label>
              <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat:</label>
              <textarea name="alamat" id="alamat" class="form-control" required></textarea>
            </div>
            <div class="form-group">
              <label for="no_telp">No Telepon:</label>
              <input type="text" name="no_telp" id="no_telp" class="form-control" required>
            </div>
            <div class="mt-3">
              <h4>Total Harga: Rp <?= number_format($total_harga, 0, ',', '.') ?></h4>
              <h4>Diskon: Rp <?= number_format($total_harga * $diskon, 0, ',', '.') ?> (<?= $diskon * 100 ?>%)</h4>
              <h4>Pajak (8%): Rp <?= number_format($pajak, 0, ',', '.') ?></h4>
              <h4>Total Akhir: Rp <?= number_format($total_harga_final, 0, ',', '.') ?></h4>
              <button type="submit" name="checkout" class="btn btn-success">Selesaikan Pesanan</button>
            </div>
          </form>
        </div>
        <div class="col-md-4">
          <h4>Rincian Pesanan</h4>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($produk_dikeranjang as $item) : ?>
                <tr>
                  <td><img src="../admin/img/<?= $item['foto'] ?>" width="80" alt="<?= $item['judul'] ?>"></td>
                  <td><?= $item['judul'] ?></td>
                  <td><?= $item['jumlah'] ?></td>
                  <td>Rp <?= number_format($item['kategori'], 0, ',', '.') ?></td>
                  <td>Rp <?= number_format($item['total'], 0, ',', '.') ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</main>

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
