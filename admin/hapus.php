<?php
require '../database/post.php';

if (isset($_GET['id_pembayaran'])) {
    $id = $_GET['id_pembayaran'];
    
    if (hapuss($id) > 0) {
        header("Location: detail_pesanan.php?status=success");
    } else {
        header("Location: detail_pesanan.php?status=fail");
    }
} else {
    header("Location: detail_pesanan.php");
}
exit;
?>
