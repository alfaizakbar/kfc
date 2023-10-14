<?php
session_start();

// if (!isset($_GET['id']) || empty($_GET['id'])) {
//     header("location: keranjang.php");
//     exit;
// }

// $qty = 1;
// if (isset($_POST['qty'])) {
//     $qty = max($_POST['qty'], 1);
// }

// $host = "localhost";
// $username = "root";
// $password = "";
// $database = "company_profile";

// $koneksi = new mysqli($host, $username, $password, $database);

// if ($koneksi->connect_error) {
//     die("Koneksi ke database gagal: " . $koneksi->connect_error);
// }

// if (!isset($_SESSION['keranjang'])) {
//     $_SESSION['keranjang'] = [];
// }
require '../pelanggan/function.php';

$id = $_GET['id'];

// Menggunakan prepared statement untuk mencegah SQL Injection
$query = "SELECT id FROM blog WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    if (!isset($_SESSION['keranjang'][$id])) {
        $_SESSION['keranjang'][$id] = $qty;
    } else {
        $_SESSION['keranjang'][$id] += $qty;
    }
} else {
    echo "Produk dengan ID $id tidak ditemukan.";
}

$stmt->close();
$conn->close();

header("location: keranjang.php");
exit;


?>