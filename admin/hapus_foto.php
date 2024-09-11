<?php
include 'koneksi.php';
session_start();

if (isset($_GET['fotoid'])) {
    $fotoid = mysqli_real_escape_string($conn, $_GET['fotoid']);

    // Query to delete the user
    $deleteQuery = mysqli_query($conn, "DELETE FROM foto WHERE fotoid='$fotoid'");

    if ($deleteQuery) {
        // Show an alert for successful deletion
        echo "<script>
                alert('Data pengguna berhasil dihapus');
                window.location.href = 'data_foto.php';
              </script>";
        exit();
    } else {
        // Show an alert for deletion error
        echo "<script>
                alert('Error deleting foto: " . mysqli_error($conn) . "');
                window.location.href = 'data_foto.php';
              </script>";
    }
} else {
    // Show an alert for invalid request
    echo "<script>
            alert('Invalid request');
            window.location.href = 'data_foto.php';
          </script>";
}

$conn->close();
?>
