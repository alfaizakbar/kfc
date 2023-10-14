<?php
$conn = mysqli_connect('localhost','root','','company_profile');
function ubah($data){
    global $conn;
    $id = $data['id'];
    $title = $data['title'];
    $kategori = $data['kategori'];
    $artikel = $data['artikel'];
    // $image = upload();

    $query = "UPDATE blog SET
    title = '$title',
    kategori = '$kategori',
    artikel = '$artikel'
    WHERE id=$id";


    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
    };
    
    

if(isset($_POST['id'])){
    if(ubah($_POST) > 0 ){
        echo "
            <script>
            alert('data berhasil di update!');
            document.location.href ='../admin/halamandetail1.php';
            </script>
            ";
        } else {
        echo "
            <script>
            alert('data gagal di update!');
            document.location.href ='../admin/halamanupdate.php';
            </script>
            ";
        }
    }
?>