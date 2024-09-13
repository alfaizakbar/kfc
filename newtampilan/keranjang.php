<<<<<<< HEAD


=======
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
>>>>>>> 69260041712c1a4c5cbf9c4c22e35466d1539158

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
<<<<<<< HEAD
          </div>

        </div>
      </div>

      <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
          <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
        </defs>
        <g class="wave1">
          <use xlink:href="#wave-path" x="50" y="3"></use>
        </g>
        <g class="wave2">
          <use xlink:href="#wave-path" x="50" y="0"></use>
        </g>
        <g class="wave3">
          <use xlink:href="#wave-path" x="50" y="9"></use>
        </g>
      </svg>

    </section>
    <!-- /Hero Section -->


  <!-- Gallery Section -->
  <section class="bg-light my-5">
  <div class="container">
    <div class="row">
      <!-- cart -->
      <div class="col-lg-9">
        <div class="card border shadow-0">
          <div class="m-4">

            <h4 class="card-title mb-4">Menu Yang Anda Pilih.</h4>
            <div class="row gy-3 mb-4">
              <div class="col-lg-5">
                <div class="me-lg-5">
                  <div class="d-flex">
                  <?php foreach($item as $row){?>

                    <img src="https://mdbootstrap.com/img/bootstrap-ecommerce/items/11.webp" class="border rounded me-3" style="width: 96px; height: 96px;" />
                    <div class="">
                      <a href="#" class="nav-link"><? $row['judul'] ?></a>
                      <p class="text-muted">Yellow, Jeans</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                <div class="">
                  <select style="width: 100px;" class="form-select me-4">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                  </select>
                </div>
                <div class="">
                  <text class="h6">$1156.00</text> <br />
                  <small class="text-muted text-nowrap"> $460.00 / per item </small>
                </div>
              </div>
              <div class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                <div class="float-md-end">
                  <!-- <a href="#!" class="btn btn-light border px-2 icon-hover-primary"><i class="fas fa-heart fa-lg px-1 text-secondary"></i></a> -->
                  <a href="#" class="btn btn-light border text-danger icon-hover-danger"> Remove</a>
                  <?php }?>
                </div>
              </div>
            </div>

            <div class="row gy-3 mb-4">
              <div class="col-lg-5">
                <div class="me-lg-5">
                  <div class="d-flex">
                    <img src="https://mdbootstrap.com/img/bootstrap-ecommerce/items/12.webp" class="border rounded me-3" style="width: 96px; height: 96px;" />
                    <div class="">
                      <a href="#" class="nav-link">Mens T-shirt Cotton Base</a>
                      <p class="text-muted">Blue, Medium</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                <div class="">
                  <select style="width: 100px;" class="form-select me-4">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                  </select>
                </div>
                <div class="">
                  <text class="h6">$44.80</text> <br />
                  <small class="text-muted text-nowrap"> $12.20 / per item </small>
                </div>
              </div>
              <div class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                <div class="float-md-end">
                  <!-- <a href="#!" class="btn btn-light border px-2 icon-hover-primary"><i class="fas fa-heart fa-lg px-1 text-secondary"></i></a> -->
                  <a href="#" class="btn btn-light border text-danger icon-hover-danger"> Remove</a>
                </div>
              </div>
            </div>

            <div class="row gy-3">
              <div class="col-lg-5">
                <div class="me-lg-5">
                  <div class="d-flex">
                  <?php foreach($data as $row){?>

<?php }?>
                    <img src="https://mdbootstrap.com/img/bootstrap-ecommerce/items/13.webp" class="border rounded me-3" style="width: 96px; height: 96px;" />
                    <div class="">
                      <a href="#" class="nav-link">Blazer Suit Dress Jacket for Men</a>
                      <p class="text-muted">XL size, Jeans, Blue</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                <div class="">
                  <select style="width: 100px;" class="form-select me-4">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                  </select>
                </div>
                <div class="">
                  <text class="h6">$1156.00</text> <br />
                  <small class="text-muted text-nowrap"> $460.00 / per item </small>
                </div>
              </div>
              <div class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                <div class="float-md-end">
                  <!-- <a href="#!" class="btn btn-light border px-2 icon-hover-primary"><i class="fas fa-heart fa-lg px-1 text-secondary"></i></a> -->
                  <a href="#" class="btn btn-light border text-danger icon-hover-danger"> Remove</a>
                </div>
              </div>
            </div>
          </div>

         
        </div>
      </div>
      <!-- cart -->
      <!-- summary -->
      <div class="col-lg-3">
        <div class="card mb-3 border shadow-0">
          <!-- <div class="card-body"> -->
            <!-- <form>
              <div class="form-group">
                <label class="form-label">Have coupon?</label>
                <div class="input-group">
                  <input type="text" class="form-control border" name="" placeholder="Coupon code" />
                  <button class="btn btn-light border">Apply</button>
                </div>
              </div>
            </form> -->
          <!-- </div> -->
        </div>
        <div class="card shadow-0 border">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <p class="mb-2">Total price:</p>
              <p class="mb-2">$329.00</p>
            </div>
            <div class="d-flex justify-content-between">
              <p class="mb-2">Discount:</p>
              <p class="mb-2 text-success">-$60.00</p>
            </div>
            <div class="d-flex justify-content-between">
              <p class="mb-2">TAX:</p>
              <p class="mb-2">$14.00</p>
            </div>
            <hr />
            <div class="d-flex justify-content-between">
              <p class="mb-2">Total price:</p>
              <p class="mb-2 fw-bold">$283.00</p>
            </div>

            <div class="mt-3">
              <a href="#" class="btn btn-success w-100 shadow-0 mb-2"> Make Purchase </a>
              <a href="#" class="btn btn-light w-100 border mt-2"> Back to shop </a>
            </div>
          </div>
        </div>
      </div>
      <!-- summary -->
    </div>
  </div>
</section>
<!-- cart + summary -->


  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Bootslander</span>
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Our Newsletter</h4>
          <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
=======
>>>>>>> 69260041712c1a4c5cbf9c4c22e35466d1539158
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
