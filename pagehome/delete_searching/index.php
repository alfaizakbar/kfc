<?php
require 'function.php';
$data = query ("SELECT * FROM blog");
//cari
if(isset($_POST["cari"])){
    $data = cari ($_POST["keyword"]);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="keyword" autofocus >
        <button type="submit" name="cari">Cari</button>
    </form>


    <table border="1" >
        <tr>
            <th>id</th>
            <th>Judul</th> 
            <th>Fungsi</th>
        </tr>
        <?php $i=1; ?>
        <?php foreach ($data as $row) { ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $row['judul'] ?></td>
            <td>

                <a href="delete.php?id=<?= $row['id'] ?>"onclick = "return confirm('yakin untuk menghapus?')">DELETE  </a> |
                
            </td>
            </tr>
        <?php $i++ ?>
        <?php } ?>
    </table>
</body>
</html>