<?php
require '../newtampilan/function.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    if (hapus($id) > 0) {
        header("Location: data_foto.php?status=success");
    } else {
        header("Location: data_foto.php?status=fail");
    }
} else {
    header("Location: data_foto.php");
}
exit;
?>
