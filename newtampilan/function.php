<?php 
$conn = mysqli_connect('localhost','root','','company_profile');


function query ($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row= mysqli_fetch_assoc($result)){
        $rows[] = $row ; 
    }
    return $rows;
}
function cari($keyword){
    $query = "SELECT * FROM blog WHERE 
    judul LIKE '%$keyword%'

    ";
    return query($query);

}
function hapus($id){
    global $conn;
     mysqli_query($conn, "DELETE FROM blog WHERE id = $id");
     return mysqli_affected_rows($conn);
}

function queryy($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows =[];
    while($pelanggan = mysqli_fetch_assoc($result)){
        $rows[] = $pelanggan;
    }
    return $rows;
};

function keranjang($data){
    global $conn;
    
    $judul = $data['judul'];
    $kategori = $data['kategori'];
    
    $mysql = "INSERT INTO pembayaran VALUES ('','$judul','$kategori')";
    mysqli_query($conn, $mysql);
    return mysqli_affected_rows($conn);
    
}

// }
function tambahKeKeranjang($id_produk) {
    // Jika keranjang belum ada, buat array keranjang kosong
    if (!isset($_SESSION['keranjang'])) {
        $_SESSION['keranjang'] = [];
    }

    // Tambah produk ke keranjang (gunakan ID produk sebagai kunci)
    if (isset($_SESSION['keranjang'][$id_produk])) {
        $_SESSION['keranjang'][$id_produk]++; // Jika sudah ada di keranjang, tambahkan jumlahnya
    } else {
        $_SESSION['keranjang'][$id_produk] = 1; // Jika belum ada, tambahkan produk dengan jumlah 1
    }
}
?>

