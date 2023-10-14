<?php
$conn = mysqli_connect('localhost', 'root', '', 'company_profile');

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows =[];
    while($user = mysqli_fetch_assoc($result)){
        $rows[] = $user;
    }
    return $rows;
};







function tambah1($data1)
{
    global $conn;
    
    $judul = $data1['judul'];
    $artikel = addslashes($data1['artikel']); 
    $kategori = $data1['kategori'];
    $tanggal = date('y/m/d');   
    $gambar = upload();

    // $artikel = trim($data['artikel'], '[]', );
    $query = "INSERT INTO blog VALUES ('', '$judul', '$artikel', '$kategori', '$gambar', '$tanggal')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
    // print_r($mysql);
}

function registrasi($data){
    global $conn;

    $username = mysqli_real_escape_string($conn, $data['username']);
    $email = strtolower(stripslashes($data['email']));
    $password =  mysqli_real_escape_string($conn, $data['password']);
	
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$email', '$password')");
    return mysqli_affected_rows($conn);
};


?>