<?php
session_start();
require_once 'function.php'; // Gunakan require_once untuk menghindari deklarasi ulang fungsi

// Ambil data keranjang dari session
$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : [];

// Cek apakah ada data produk yang perlu dihapus
if (isset($_GET['hapus'])) {
    $id_hapus = $_GET['hapus'];
    unset($_SESSION['keranjang'][$id_hapus]);
    header("Location: keranjang.php");
    exit;
}

// Cek apakah ada data produk yang perlu diupdate
if (isset($_POST['update'])) {
    foreach ($_POST['jumlah'] as $id_produk => $jumlah) {
        $_SESSION['keranjang'][$id_produk] = (int)$jumlah;
    }
    header("Location: keranjang.php");
    exit;
}

// Cek apakah ada diskon yang diterapkan
if (isset($_POST['diskon_apply'])) {
    $diskon_id = $_POST['diskon'];
    $diskon_data = [
        '0' => 0,
        '10' => 0.10,
        '20' => 0.20,
    ];

    $diskon = isset($diskon_data[$diskon_id]) ? $diskon_data[$diskon_id] : 0;
    $_SESSION['diskon'] = $diskon;
} else {
    $diskon = isset($_SESSION['diskon']) ? $_SESSION['diskon'] : 0;
}

// Ambil detail produk dari database berdasarkan ID di keranjang
$produk_dikeranjang = [];
$total_harga = 0;
foreach ($keranjang as $id_produk => $jumlah) {
    $produk = query("SELECT * FROM blog WHERE id = $id_produk")[0];
    $produk['jumlah'] = $jumlah;
    $produk['total'] = $jumlah * $produk['kategori'];
    $total_harga += $produk['total'];
    $produk_dikeranjang[] = $produk;
}

// Terapkan diskon ke total harga
$total_harga_diskon = $total_harga * (1 - $diskon);

// Hitung pajak (misalnya 8%)
$pajak = $total_harga_diskon * 0.08;
$total_harga_final = $total_harga_diskon + $pajak;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keranjang Belanja</title>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>

<main class="main">
  <section id="keranjang" class="section">
    
    <div class="container">
      <a href="index.php" class="btn btn-secondary btn-back mb-2">Back</a>
      <h2>Keranjang Belanja</h2>
      <?php if (empty($produk_dikeranjang)) : ?>
        <p>Keranjang Anda kosong.</p>
      <?php else : ?>
        <!-- Form diskon -->
        <div class="mb-3">
          <form action="keranjang.php" method="post">
            <div class="input-group">
              <select name="diskon" class="form-control">
                <option value="0" <?= $diskon == 0 ? 'selected' : '' ?>>Tidak ada diskon</option>
                <option value="10" <?= $diskon == 0.10 ? 'selected' : '' ?>>Diskon 10%</option>
                <option value="20" <?= $diskon == 0.20 ? 'selected' : '' ?>>Diskon 20%</option>
              </select>
              <button type="submit" name="diskon_apply" class="btn btn-info">Terapkan Diskon</button>
            </div>
          </form>
        </div>
        <!-- Form update keranjang -->
        <form action="keranjang.php" method="post">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($produk_dikeranjang as $item) : ?>
                <tr>
                  <td><img src="../admin/img/<?= $item['foto'] ?>" width="100" alt="<?= $item['judul'] ?>"></td>
                  <td><?= $item['judul'] ?></td>
                  <td>
                    <input type="number" name="jumlah[<?= $item['id'] ?>]" value="<?= $item['jumlah'] ?>" min="1" class="form-control" style="width: 80px;">
                  </td>
                  <td>Rp <?= number_format($item['kategori'], 0, ',', '.') ?></td>
                  <td>Rp <?= number_format($item['total'], 0, ',', '.') ?></td>
                  <td><a href="keranjang.php?hapus=<?= $item['id'] ?>" class="btn btn-danger btn-sm">Hapus</a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <button type="submit" name="update" class="btn btn-primary">Update Keranjang</button>
        </form>
        <div class="mt-3">
          <h4>Total Harga: Rp <?= number_format($total_harga, 0, ',', '.') ?></h4>
          <h4>Diskon: Rp <?= number_format($total_harga * $diskon, 0, ',', '.') ?> (<?= $diskon * 100 ?>%)</h4>
          <h4>Pajak (8%): Rp <?= number_format($pajak, 0, ',', '.') ?></h4>
          <h4>Total Akhir: Rp <?= number_format($total_harga_final, 0, ',', '.') ?></h4>
          <a href="checkout.php" class="btn btn-success">Checkout</a>
        </div>
      <?php endif; ?>
    </div>
  </section>
</main>

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
