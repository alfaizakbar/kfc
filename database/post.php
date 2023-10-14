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
    
    $judul = $data['judul'];
    // $artikel = addslashes($data['artikel']); 
    $kategori = $data['kategori'];
    $tanggal = date('y/m/d');   
    $gambar = upload();
    if ( !$gambar) {
        return false;
    }
    
    // $artikel = trim($data['artikel'], '[]', );
    $mysql = "INSERT INTO blog VALUES ('', '$judul', '$kategori', '$gambar', '$tanggal')";
    mysqli_query($conn, $mysql);
    return mysqli_affected_rows($conn);
    // print_r($mysql);
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
    $judul = $data['judul'];
    $kategori = $data['kategori'];
    // $artikel = addslashes($data['artikel']);
    $tanggal = date('y/m/d');
    // $image = upload();
    $mysql = "UPDATE blog SET judul='$judul', kategori='$kategori', tanggal='$tanggal' WHERE id=$id";
    // print_r( $mysql);
    mysqli_query($conn, $mysql);
    return mysqli_affected_rows($conn);
};
function apa($data){
    global $conn;

    $id = $data['id'];
    $username = $data['username'];
    $email = $data['email'];
    $password = $data['password'];
    $query = "UPDATE user SET username='$username', email='$email', password='$password' WHERE id=$id";
    $_SESSION['username']=$username;
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
;

function hapuss($id){
    global $conn;
     mysqli_query($conn, "DELETE FROM pembayaran WHERE id_pembayaran = $id");
     return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM pembayaran WHERE tanggal_pembayaran LIKE '%$keyword%'";
    return query($query);
}
?>