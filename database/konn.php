<?php
$conn = mysqli_connect('localhost', 'root', '', 'company_profile');



function queryy($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows =[];
    while($pelanggan = mysqli_fetch_assoc($result)){
        $rows[] = $pelanggan;
    }
    return $rows;
};

function query($query){
    
    global $conn;
    
    $result = mysqli_query($conn, $query);
    $rows = [];
    
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
};

function kuery($sql) {
    global $conn;
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
    return $result;
}
function registrasii($data){
    global $conn;
    
    $usernamee = mysqli_real_escape_string($conn, $data['usernamee']);
    $email = strtolower(stripslashes($data['email']));
    $password =  mysqli_real_escape_string($conn, $data['password']);
    $alamat =  mysqli_real_escape_string($conn, $data['alamat']);
    $no_hp =  mysqli_real_escape_string($conn, $data['no_hp']);
    $gambar = uploadd();
    if ( !$gambar) {
        return false;
    }
    mysqli_query($conn, "INSERT INTO pelanggan VALUES('', '$usernamee', '$email', '$password','$alamat','$no_hp','$gambar')");
    return mysqli_affected_rows($conn);
};

function uploadd() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];
    
    // Periksa apakah ada file yang diunggah
    if ( $error === 4 ) {
        // Tidak ada file yang diunggah, Anda bisa menambahkan data tanpa gambar
        // Tambahkan kode penyimpanan data ke database di sini
        return true;
    }
    
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'webp', 'jfif'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    
    // Periksa ekstensi gambar
    if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('Upload gambar terlebih dahulu!');</script>";
        return false;
    }
    
    // Periksa ukuran gambar
    if ($ukuranFile > 1000000 ) {
        echo "<script>
        alert('Ukuran gambar terlalu besar!');</script>";
        return false;
    }
    
    // Pindahkan gambar ke direktori yang ditentukan
    move_uploaded_file($tmpName, 'img/' . $namaFile);
    
    // Tambahkan kode penyimpanan data ke database di sini
    // Jika Anda ingin menambahkan data lain selain gambar
    
    return $namaFile;
}
;
function nama_file_gambar_lama_dari_database($id_pelanggan) {
    // Membuka koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "company_profile");

    // Periksa conn
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Lakukan query untuk mengambil nama file gambar lama berdasarkan ID data
    $query = "SELECT foto FROM pelanggan WHERE id = $id_pelanggan";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $namaFileLama = $row['foto'];
    } else {
        echo "Gagal mengambil data dari database: " . mysqli_error($conn);
        $namaFileLama = ""; // Atau Anda bisa memberikan nilai default jika terjadi kesalahan
    }

    // Tutup conn database
    mysqli_close($conn);

    return $namaFileLama;
}


function update() {
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
// require '../pagehome/function.php';

// function tambahh($data)
// {
//     global $conn;
    
//     $judul = $data['judul'];
//     $kategori = $data['kategori'];
//     $gambar = upload();
//     if ( !$gambar) {
//         return false;
//     }
    
//     // $artikel = trim($data['artikel'], '[]', );
//     $mysql = "INSERT INTO blog VALUES ('', '$judul', '$kategori', '$gambar' )";
//     mysqli_query($conn, $mysql);
//     return mysqli_affected_rows($conn);
// }


// function id_pelanggan($data){
    //     global $conn;
    //     $id_pelanggan = $data['id_pelanggan'];
    //     $sql = "SELECT * FROM pelanggan WHERE id_pelanggan = $id_pelanggan";
    //     mysqli_query($conn, $sql);
    //     return mysqli_affected_rows($conn);    
    
    // }
    /**
     * Summary of bayarr
     * @param mixed $data
     * @return int|string
 */
function bayarr($data){
    global $conn;
    
    $id_pelanggan = $data['id_pelanggan'];
    $judul = $data['judul'];
    $kategori = $data['kategori'];
    $jumlah_makanan = $data['jumlah_makanan'];
    $nama_pelanggan = $data['nama_pelanggan'];
    date_default_timezone_set("Asia/Jakarta");
    $tanggal_pembayaran =date('y-m-d h:i:s');
    $alamat = $data['alamat'];
    $no_hp = $data['no_hp'];
    
    $mysql = "INSERT INTO pembayaran VALUES ('','$id_pelanggan','$judul','$kategori','$jumlah_makanan','$nama_pelanggan','$tanggal_pembayaran','$alamat','$no_hp')";
    mysqli_query($conn, $mysql);
    return mysqli_affected_rows($conn);
    
}

function ubah($data){
    global $conn;
    
    // session_start();
    
    $id_pelanggan = $data['id_pelanggan'];
    $usernamee = $data['usernamee'];
    $email = $data['email'];
    $alamat = $data['alamat'];
    $no_hp = $data['no_hp'];
    $password = $data['password'];
    $gambar = uploadd();
    if ( !$gambar) {
        return false;
    }
    // $gambar = update();
    // if ( !$gambar) {
    //     return false;
    // }
    $query = "UPDATE pelanggan SET usernamee=?, email=?, alamat=?, no_hp=?, foto=?,  password=? WHERE id_pelanggan=?";
    $stmt = mysqli_prepare($conn, $query);
    $_SESSION['usernamee']=$usernamee;

    // Bind parameter ke statement
    mysqli_stmt_bind_param($stmt, "ssssssi", $usernamee, $email, $alamat, $no_hp, $gambar, $password, $id_pelanggan);

    // Eksekusi statement
    mysqli_stmt_execute($stmt);

    // Dapatkan jumlah baris yang terpengaruh
    $affected_rows = mysqli_stmt_affected_rows($stmt);

    // Tutup statement
    mysqli_stmt_close($stmt);

    return $affected_rows;
    // print_r($query);
}
;


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
;


// function apa($data){
//     global $conn;

//     $id = $data['id'];
//     $username = $data['username'];
//     $email = $data['email'];
//     $password = $data['password'];
//     $query = "UPDATE user SET username='$username', email='$email', password='$password' WHERE id=$id";
//     mysqli_query($conn, $query);
//     return mysqli_affected_rows($conn);
// }
// ;
?>
<!-- if($mysql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    echo "<script>alert('data berhasil disimpan!!!')</script>";
    //header("location:?page=index"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.!!!')</script>";
  // header("location:?page=konfirmasi_pembayaran");
  } -->