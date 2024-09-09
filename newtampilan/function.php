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

// function ubah($data){
//     global $conn;
// $id = $data ['id'];
// $nama = htmlspecialchars ($data ['judul']);
// $nis = htmlspecialchars ($data ['artikel']);
// $email = htmlspecialchars ($data ['email']);
// $jurusan = htmlspecialchars ($data ['jurusan']);
// $gambarlama = htmlspecialchars ($data ['gambarlama']);


// }
?>

