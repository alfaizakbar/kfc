<?php
require '../database/post.php'; // Memuat koneksi database atau file fungsi Anda

// Mendapatkan ID pembayaran dari query string
$id_pembayaran = $_GET['id_pembayaran'];

// Query untuk mengambil detail pembayaran berdasarkan ID
$data = query("SELECT p.*, 
           GROUP_CONCAT(dp.nama_makanan SEPARATOR ', ') AS nama_makanan, 
           GROUP_CONCAT(dp.jumlah_makanan SEPARATOR ', ') AS jumlah_makanan, 
           SUM(dp.jumlah_makanan) AS total_jumlah_makanan 
           FROM pembayaran p
           JOIN detail_pesanan dp ON p.id_pembayaran = dp.id_pembayaran
           WHERE p.id_pembayaran = $id_pembayaran
           GROUP BY p.id_pembayaran");
// Periksa apakah data ditemukan
if ($data) {
    $detail = $data[0]; // Mengambil hasil pertama
} else {
    echo "<script>alert('Data tidak ditemukan!'); window.location.href = 'data_foto.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pembayaran</title>
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <style>
        /* Aturan untuk tampilan cetak */
        @media print {
            body {
                font-size: 12pt; /* Ukuran font saat dicetak */
                margin: 0; /* Menghilangkan margin */
                padding: 0; /* Menghilangkan padding */
            }
            .container {
                width: 100%; /* Memastikan kontainer penuh saat dicetak */
                padding: 10px; /* Menambahkan padding untuk tampilan */
            }
            h1 {
                font-size: 20pt; /* Ukuran font untuk judul saat dicetak */
            }
            table {
                width: 100%; /* Memastikan tabel penuh saat dicetak */
                border-collapse: collapse; /* Menghilangkan jarak antar border */
            }
            th, td {
                padding: 8px; /* Menambahkan padding pada sel */
                border: 1px solid #000; /* Menambahkan border untuk tabel */
            }
            th {
                background-color: #f2f2f2; /* Warna latar untuk header tabel */
            }
            /* Sembunyikan tombol yang tidak perlu saat dicetak */
            .no-print {
                display: none; /* Menghilangkan elemen dengan kelas no-print saat dicetak */
            }
        }

        /* Gaya umum */
        body {
            background-color: #f8f9fa; /* Warna latar belakang */
            color: #333; /* Warna teks */
            font-family: Arial, sans-serif; /* Jenis font */
        }
        .container {
            max-width: 400px; /* Lebar maksimum kontainer seperti struk */
            margin: 20px auto; /* Pusatkan kontainer */
            padding: 15px; /* Tambahkan padding di dalam kontainer */
            background-color: #ffffff; /* Warna latar belakang putih untuk kontainer */
            border: 1px solid #000; /* Border untuk memberikan kesan struk */
            border-radius: 5px; /* Membuat sudut bulat */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Menambahkan bayangan */
            font-size: 12pt; /* Ukuran font standar */
        }
        h1 {
            text-align: center; /* Pusatkan teks */
            color: #333; /* Warna judul */
            margin-bottom: 15px; /* Margin bawah */
            font-size: 18pt; /* Ukuran font judul */
            font-weight: bold; /* Mengatur berat font judul */
        }
        table {
            margin-top: 10px; /* Tambahkan margin atas pada tabel */
        }
        th {
            background-color: #007bff; /* Warna latar header tabel */
            color: white; /* Warna teks header tabel */
            text-align: left; /* Rata kiri teks header */
        }
        td {
            background-color: #f9f9f9; /* Warna latar untuk sel */
            padding: 5px; /* Padding dalam sel */
        }
        tr:nth-child(even) td {
            background-color: #f2f2f2; /* Warna latar untuk baris genap */
        }
        .btn-secondary {
            background-color: #6c757d; /* Warna tombol kembali */
            border: none; /* Menghilangkan border tombol */
        }
        .btn-secondary:hover {
            background-color: #5a6268; /* Warna saat hover pada tombol */
        }
        .btn-print {
            background-color: #007bff; /* Warna tombol print */
            color: white; /* Warna teks tombol print */
            margin-top: 10px; /* Margin atas untuk tombol print */
        }
        .btn-print:hover {
            background-color: #0056b3; /* Warna saat hover pada tombol print */
        }
        .footer {
            margin-top: 15px; /* Margin atas untuk footer */
            text-align: center; /* Pusatkan teks footer */
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1>Struk Pembayaran</h1>
    <hr>
    <div class="">

        <p style="text-align: left;">Nama Toko: <strong>AAFood</strong></p>
        <p style="text-align: left;">Alamat: Jl. Contoh No. 123, Kota Anda</p>
        <p style="text-align: left;">Telp: (021) 12345678</p>
    </div>
    <hr>
    <table class="table table-bordered">
        <tr>
            <th>Tanggal dan Waktu</th>
            <td><?= date('d-m-Y H:i:s', strtotime($detail['tanggal_pembayaran'])) ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td><?= $detail['alamat'] ?></td>
        </tr>
        <tr>
            <th>No Handphone</th>
            <td><?= $detail['no_hp'] ?></td>
        </tr>
        <tr>
            <th>Nama Pelanggan</th>
            <td><?= $detail['nama_pelanggan'] ?></td>
        </tr>
        <tr>
            <th>Nama Makanan</th>
            <td>
                <?php
                // Pisahkan nama makanan dan jumlah makanan
                $nama_makanan = explode(", ", $detail['nama_makanan']);
                $jumlah_makanan = explode(", ", $detail['jumlah_makanan']);
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
        </tr>
        <tr>
            <th>Total Makanan</th>
            <td><?= $detail['total_jumlah_makanan'] ?></td>
        </tr>
        <tr>
            <th>Total Harga</th>
            <td><?= number_format($detail['total_harga'], 0, ',', '.') ?></td>
        </tr>
    </table>
    <p style="text-align: center;">Terima kasih telah berbelanja di <strong>AAFood</strong>!</p>
    <div class="footer">
        <a href="data_foto.php" class="btn btn-secondary no-print">Kembali</a> <!-- Tombol Kembali -->
        <button class="btn btn-print no-print mb-2" onclick="window.print()">Print</button> <!-- Tombol Print -->
    </div>
</div>

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
