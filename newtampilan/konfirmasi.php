<?php
session_start();
require_once 'function.php'; // Gunakan require_once untuk menghindari deklarasi ulang fungsi

// Cek apakah ada ID pesanan di URL
if (!isset($_GET['id_pesanan'])) {
    header("Location: index.php");
    exit;
}

$id_pesanan = (int)$_GET['id_pesanan'];

// Ambil data pesanan dari database
$pesanan = query("SELECT * FROM pesanan WHERE id = $id_pesanan")[0];

// Ambil detail pesanan
$detail_pesanan = query("SELECT dp.*, b.judul, b.foto FROM detail_pesanan dp JOIN blog b ON dp.id_produk = b.id WHERE dp.id_pesanan = $id_pesanan");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Konfirmasi Pesanan</title>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>

<main class="main">
  <section id="konfirmasi" class="section">
    <div class="container">
      <h2>Konfirmasi Pesanan</h2>
      <div class="row">
        <div class="col-md-12">
          <h4>Terima Kasih!</h4>
          <p>Pemesanan Anda telah diterima dan sedang diproses. Berikut adalah rincian pesanan Anda:</p>
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
              <?php foreach ($detail_pesanan as $item) : ?>
                <tr>
                  <td><img src="../admin/img/<?= $item['foto'] ?>" width="80" alt="<?= $item['judul'] ?>"></td>
                  <td><?= $item['judul'] ?></td>
                  <td><?= $item['jumlah'] ?></td>
                  <td>Rp <?= number_format($item['total'] / $item['jumlah'], 0, ',', '.') ?></td> <!-- Harga per item -->
                  <td>Rp <?= number_format($item['total'], 0, ',', '.') ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <h4>Total Harga: Rp <?= number_format($pesanan['total_harga'], 0, ',', '.') ?></h4>
          <h4>Diskon: Rp <?= number_format($pesanan['diskon'] * $pesanan['total_harga'], 0, ',', '.') ?></h4>
          <h4>Pajak: Rp <?= number_format($pesanan['pajak'], 0, ',', '.') ?></h4>
          <h4>Total Akhir: Rp <?= number_format($pesanan['total_akhir'], 0, ',', '.') ?></h4>
        </div>
      </div>
    </div>
  </section>
</main>

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
