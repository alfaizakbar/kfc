<?php
require '../database/post.php';

$id = $_GET['id_pembayaran'];
if(hapuss($id) > 0){
    echo "
    <script>
    alert('data anda berhasil untuk di hapus');
    document.location.href = 'detail_pesanan.php';
    </script>
    ";
    } else {
        echo"
    <script>
    alert('data anda gagal untuk dihapus');
    document.location.href = 'detail_pesanan.php';
    </script>
    ";
    }
?>