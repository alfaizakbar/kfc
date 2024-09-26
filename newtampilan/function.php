<?php 
// Koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'company_profile');

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Fungsi untuk menjalankan query dan mengembalikan hasilnya sebagai array
function queryy($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    
    // Cek apakah query berhasil
    if (!$result) {
        die("Query gagal: " . mysqli_error($conn));
    }

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row; 
    }
    return $rows;
}

// Fungsi untuk mencari berdasarkan keyword di tabel blog
function cari($keyword) {
    global $conn;

    // Menggunakan mysqli_real_escape_string untuk mencegah SQL injection
    $keyword = mysqli_real_escape_string($conn, $keyword);

    $query = "SELECT * FROM blog WHERE judul LIKE '%$keyword%'";
    return query($query);
}

// Fungsi untuk menghapus entri berdasarkan id
function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM blog WHERE id = $id");
    
    // Cek apakah query berhasil
    if (mysqli_affected_rows($conn) > 0) {
        return true;
    } else {
        return false;
    }
}
function hapuss($id_pembayaran) {
    global $conn;
    mysqli_query($conn, "DELETE FROM detail_pesanan WHERE id_pembayaran = $id_pembayaran");
    
    // Cek apakah query berhasil
    if (mysqli_affected_rows($conn) > 0) {
        return true;
    } else {
        return false;
    }
}

// Fungsi untuk menambah produk ke keranjang
function tambahKeKeranjang($id_produk) {
    if (!isset($_SESSION['keranjang'])) {
        $_SESSION['keranjang'] = [];
    }

    if (isset($_SESSION['keranjang'][$id_produk])) {
        $_SESSION['keranjang'][$id_produk]++;
    } else {
        $_SESSION['keranjang'][$id_produk] = 1;
    }
}


// Fungsi untuk menambah data pembayaran ke database
function bayarr($data) {
    global $conn;

    $id_pelanggan = mysqli_real_escape_string($conn, $data['id_pelanggan']);
    $nama_makanan = mysqli_real_escape_string($conn, $data['nama_makanan']);
    $kategori = mysqli_real_escape_string($conn, $data['kategori']);
    $jumlah_makanan = mysqli_real_escape_string($conn, $data['jumlah_makanan']);
    $nama_pelanggan = mysqli_real_escape_string($conn, $data['nama_pelanggan']);
    $total_harga = mysqli_real_escape_string($conn, $data['total_harga']);
    $alamat = mysqli_real_escape_string($conn, $data['alamat']);
    $no_hp = mysqli_real_escape_string($conn, $data['no_hp']);
    
    date_default_timezone_set("Asia/Jakarta");
    $tanggal_pembayaran = date('Y-m-d H:i:s');

    $query = "INSERT INTO pembayaran (id_pelanggan, nama_makanan, kategori, jumlah_makanan, nama_pelanggan, total_harga, tanggal_pembayaran, alamat, no_hp) 
              VALUES ('$id_pelanggan', '$nama_makanan', '$kategori', '$jumlah_makanan', '$nama_pelanggan','$total_harga', '$tanggal_pembayaran', '$alamat', '$no_hp')";

    mysqli_query($conn, $query);

    // Cek apakah query berhasil
    if (mysqli_affected_rows($conn) > 0) {
        return true;
    } else {
        return false;
    }
}
?>
