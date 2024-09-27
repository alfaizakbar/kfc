<?php 
$conn = mysqli_connect('localhost', 'root', '', 'company_profile');
/**
 * Summary of query
 * @param mixed $query
 * @return array
 */
function query($query){
    
    global $conn;
    
    $result = mysqli_query($conn, $query);
    $rows = [];
    
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
};

function kuery($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row= mysqli_fetch_assoc($result)){
        $rows[] = $row ; 
    }
    return $rows;
}
function tambah($data)
{
    global $conn;
    
    $nama_makanan = $data['nama_makanan'];
    $kategori = $data['kategori'];
    
    $tanggal = date('y/m/d');   
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // Menyimpan nilai yang diformat ke database
    $mysql = "INSERT INTO blog VALUES ('', '$nama_makanan', '$kategori', '$gambar', '$tanggal')";
    mysqli_query($conn, $mysql);
    
    return mysqli_affected_rows($conn);
}



function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];
    
    if ( $error === 4 ) {
        echo "<script>
        alert('pilih gambar terlebih dahulu!');</script>";
        return false;
    }
    
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png','webp', 'jfif' ];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('Upload gambar terlebih dahulu!');</script>";
        return false;
    }
    
    if ($ukuranFile > 1000000 ) {
        echo "<script>
        alert('Ukuran gambar terlalu besar!');</script>";
        return false;
    }
    
    move_uploaded_file($tmpName, 'img/' . $namaFile);
    
    return $namaFile;
}
;
function edit($data){
    global $conn;
    
    $id = $data['id'];
    $nama_makanan = $data['nama_makanan'];
    $kategori = $data['kategori'];
    // $artikel = addslashes($data['artikel']);
    $tanggal = date('y/m/d');
    // $image = upload();
    $mysql = "UPDATE blog SET nama_makanan='$nama_makanan', kategori='$kategori', tanggal='$tanggal' WHERE id=$id";
    // print_r( $mysql);
    mysqli_query($conn, $mysql);
    return mysqli_affected_rows($conn);
};
function apa($data) {
    global $conn;

    $id = $data['id'];
    $username = mysqli_real_escape_string($conn, $data['username']);
    $email = mysqli_real_escape_string($conn, $data['email']);
    
    // Ambil password lama dari database
    $result = mysqli_query($conn, "SELECT password FROM user WHERE id='$id'");
    $row = mysqli_fetch_assoc($result);
    $old_password = $row['password'];

    // Jika password baru tidak diisi, gunakan password lama
    $password = !empty($data['password']) ? mysqli_real_escape_string($conn, $data['password']) : $old_password;

    // Siapkan query untuk update
    $query = "UPDATE user SET username='$username', email='$email', password='$password' WHERE id='$id'";
    
    // Eksekusi query
    if (mysqli_query($conn, $query)) {
        $_SESSION['username'] = $username; // Update session hanya jika query berhasil
        return mysqli_affected_rows($conn);
    } else {
        return 0; // Mengembalikan 0 jika query gagal
    }
}


function hapuss($id_pembayaran) {
    global $conn;
    
    // Escape string untuk mencegah SQL injection
    $id_pembayaran = mysqli_real_escape_string($conn, $id_pembayaran);

    // Hapus data dari tabel detail_pesanan terlebih dahulu
    $query = "DELETE FROM detail_pesanan WHERE id_pembayaran = '$id_pembayaran'";
    mysqli_query($conn, $query);

    // Cek apakah penghapusan dari detail_pesanan berhasil
    if (mysqli_affected_rows($conn) > 0) {
        // Hapus data dari tabel pembayaran setelah berhasil menghapus dari detail_pesanan
        $query = "DELETE FROM pembayaran WHERE id_pembayaran = '$id_pembayaran'";
        mysqli_query($conn, $query);

        if (mysqli_affected_rows($conn) > 0) {
            return true; // Hapus berhasil
        } else {
            return false; // Gagal menghapus dari tabel pembayaran
        }
    } else {
        return false; // Gagal menghapus dari tabel detail_pesanan
    }
}


function cari($keyword){
    $query = "SELECT * FROM pembayaran WHERE tanggal_pembayaran LIKE '%$keyword%'";
    return query($query);
}

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
?>