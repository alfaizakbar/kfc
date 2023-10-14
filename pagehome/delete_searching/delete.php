<?php
require 'function.php';
$id = $_GET['id'];
if(hapus($id) > 0){
    echo "
    <script>
    alert('data anda berhasil untuk di hapus');
    document.location.href = 'index.php';
    </script>
    ";
    } else {
        echo"
    <script>
    alert('data anda gagal untuk dihapus');
    document.location.href = 'index.php';
    </script>
    ";
    }
?>
    