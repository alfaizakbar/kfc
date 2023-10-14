<?php
require '../database/post.php';
// require '../database/update.php';

$id = $_GET["id"];
$blog=query("SELECT * FROM blog WHERE id=$id")[0];
// $blog=query("SELECT * FROM blog ORDER BY id DESC");

if(isset($_POST['edit'])){
    if(edit($_POST) > 0){
        echo "<script>alert('data berhasil ditambahakan');
            document.location.href = 'listpost.php'</script>";
    } else {
        echo "<script>alert('data gagal ditambahakan')</script>";
    }
    ;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Update</title>
    <link rel="stylesheet" href="css/update.css">
    <style>
       
    </style>
</head>
<body>
<?php include 'header_navbar.php'; ?>
        <div class="aowkwo">
        <h1>Add Post</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <h1>Halaman Update</h1>
        <input type="hidden" name="id" value="<?= $blog['id']?>">
        <div class="title">
        <label for="">Title :</label>
        <input name="judul" type="text" class="title" value="<?= $blog['judul']?>">
    </div>  
        <div class="kc">
            <div class="k">
                <label for="">Kategori :</label>
                <input name="kategori" type="text" class="kategori" value="<?= $blog['kategori']?>">
            </div>
            <div class="c">
                <label for="" class="ci">Create Image :</label>
                <input name="image" type="file" class="img1">
            </div>
        </div>

        <button type="submit" name="edit">Save</button>
    </form>
            
        </div>
        

</body>
</html>